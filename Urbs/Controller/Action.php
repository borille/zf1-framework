<?php

/**
 * @see Zend_Controller_Action
 */
require_once 'Zend/Controller/Action.php';

/**
 * Classe com o CRUD básico
 *
 * @category    Urbs
 * @package     Urbs_Controller
 * @subpackage  Action
 * @name        Urbs_Controller_Action
 * @copyright   Copyright (c) 2014 - URBS
 * @author      TRB
 * @version     1.0
 */
abstract class Urbs_Controller_Action extends Zend_Controller_Action
{
	/**
	 * @var Urbs_Db_Table_Abstract
	 */
	protected $_dbTable = null;

	/**
	 * @var string
	 */
	protected $_dbTableClass = '';

	/**
	 * @var Zend_Form
	 */
	protected $_form = null;

	/**
	 * @var string
	 */
	protected $_formClass = '';

	/**
	 * @var string
	 */
	protected $_primaryKeyParams = 'id';

	/**
	 * @var string
	 */
	protected $_pageParamName = 'page';

	/**
	 * @param Urbs_Db_Table_Abstract $dbTable
	 */
	public function setDbTable( Urbs_Db_Table_Abstract $dbTable )
	{
		$this->_dbTable = $dbTable;
	}

	/**
	 * @return null|Urbs_Db_Table_Abstract
	 */
	public function getDbTable()
	{
		if ( !$this->_dbTable && $this->_dbTableClass ) {
			$this->_dbTable = new $this->_dbTableClass();
		}

		return $this->_dbTable;
	}

	/**
	 * @param string $dbTable
	 */
	public function setDbTableClass( $dbTableClass )
	{
		if ( class_exists( $dbTableClass ) ) {
			$this->_dbTableClass = $dbTableClass;
		}
	}

	/**
	 * @return string
	 */
	public function getDbTableClass()
	{
		return $this->_dbTableClass;
	}

	/**
	 * @param Zend_Form $form
	 */
	public function setForm( Zend_Form $form )
	{
		$this->_form = $form;
	}

	/**
	 * @return null|Zend_Form
	 */
	public function getForm()
	{
		if ( !$this->_form && $this->_formClass ) {
			$this->_form = new $this->_formClass();
		}

		return $this->_form;
	}

	/**
	 * @param $formClass
	 */
	public function setFormClass( $formClass )
	{
		if ( class_exists( $formClass ) ) {
			$this->_formClass = $formClass;
		}
	}

	/**
	 * @return string
	 */
	public function getFormClass()
	{
		return $this->_formClass;
	}

	/**
	 * Seta os parametros da URL que são PK
	 * @param $primaryKeyParams
	 */
	public function setPrimaryKeyParams( $primaryKeyParams )
	{
		$this->_primaryKeyParams = $primaryKeyParams;
	}

	/**
	 * Retorna os parametros da url que são PK
	 * @return array|mixed
	 */
	protected function getPkParams()
	{
		$params = null;

		if ( is_array( $this->_primaryKeyParams ) ) {
			$params = array();
			foreach ( $this->_primaryKeyParams as $param ) {
				$params[] = $this->getRequest()->getParam( $param );
			}
		} else {
			$params = $this->getRequest()->getParam( $this->_primaryKeyParams );
		}

		return $params;
	}

	/**
	 * Lista os dados da dbTable
	 * @param string $callbackFunction Nome da função que deve ser chamada
	 * @param mixed|array $parameters Parametros da Função de Callback
	 */
	public function indexAction( $callbackFunction = 'getSelect', $parameters = null )
	{
		$this->view->paginator = Urbs_Action_Helper::paginator(
			call_user_func( array( $this->getDbTable(), $callbackFunction ), $parameters ),
			$this->getRequest()->getParam( $this->_pageParamName )
		);
	}

	/**
	 * Adicionar os dados
	 */
	public function addAction()
	{
		$this->view->form = $this->getForm();
		$this->view->subtitle = 'Adicionar';

		if ( $this->getRequest()->isPost() ) {
			if ( $this->view->form->isValid( $this->getRequest()->getParams() ) ) {
				if ( $this->getDbTable()->insert( $this->view->form->getValues() ) ) {
					Urbs_Action_Helper::showMessage( 'Salvo com Sucesso!' );
				} else {
					Urbs_Action_Helper::showMessage( 'Erro ao Salvar!', 'error' );
				}
				Urbs_Action_Helper::redirect( $this->getRequest()->getControllerName() );
			}
		}
	}

	/**
	 * Editar os dados
	 */
	public function editAction()
	{
		$form = $this->getForm();
		$this->view->subtitle = 'Editar';

		if ( $this->getRequest()->isPost() ) {
			if ( $form->isValid( $this->getRequest()->getParams() ) ) {
				if ( $this->getDbTable()->update( $form->getValues() ) ) {
					Urbs_Action_Helper::showMessage( 'Salvo com Sucesso!' );
				} else {
					Urbs_Action_Helper::showMessage( 'Erro ao Salvar!', 'error' );
				}
				Urbs_Action_Helper::redirect( $this->getRequest()->getControllerName() );
			}
		} else {
			$form->populate( $this->getDbTable()->getId( $this->getPkParams() ) );
		}

		$this->view->form = $form;
	}

	/**
	 * Excluir dados
	 */
	public function deleteAction()
	{
		if ( $this->getDbTable()->delete( $this->getPkParams() ) ) {
			Urbs_Action_Helper::showMessage( 'Excluído com Sucesso!' );
		} else {
			Urbs_Action_Helper::showMessage( 'Erro ao Excluir!', 'error' );
		}
		Urbs_Action_Helper::redirect( $this->getRequest()->getControllerName() );
	}

	/**
	 * Helper para busca
	 *
	 * @param $searchName
	 * @param null $sessionName
	 * @return mixed|void
	 */
	public function searchHelper( $searchName, $sessionName = null )
	{
		$busca = new Zend_Session_Namespace( ( $sessionName ) ? $sessionName : Zend_Session::getOptions( 'name' ) );

		if ( $this->getRequest()->isPost() ) {
			if ( $this->getRequest()->getParam( 'btn-action' ) == 'clear' ) {
				$busca->unsetAll();
			} else {
				$busca->$searchName = strtoupper( $this->getRequest()->getParam( 'txt-search' ) );
			}
			return Urbs_Action_Helper::redirect( $this->view->controller, $this->view->action );
		}
		return $busca->$searchName;
	}

	/**
	 * Define o titulo da view
	 * @param $title string
	 */
	public function setViewTitle( $title )
	{
		$this->view->title = $title;
	}

}