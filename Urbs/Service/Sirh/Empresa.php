<?php

require_once 'Urbs/Service/Sirh.php';
require_once 'Urbs/Service/Interface.php';
require_once 'Urbs/Db/Table/Sirh/Empresa.php';

/**
 * Classe com métodos comuns para CRUD na tabela SIRH.SIRH_TB005_EMPRESA_RH
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Sirh_Empresa
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Service_Sirh_Empresa extends Urbs_Service_Sirh implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Sirh_Empresa
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Sirh_Empresa
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Sirh_Empresa
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Sirh_Empresa
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			require_once 'Urbs/Model/Sirh/Empresa.php';
			$this->_repository = new Urbs_Db_Table_Sirh_Empresa();
		}
		return $this->_repository;
	}

	/**
	 * @param $id
	 * @param bool $toObject
	 * @return array|Urbs_Model_Sirh_Empresa
	 */
	public function getEmpresa( $id, $toObject = true )
	{
		$result = $this->getRepository()->getEmpresa( (int)$id );

		if ( $toObject ) {
			require_once 'Urbs/Model/Sirh/Empresa.php';
			$result = new Urbs_Model_Sirh_Empresa( $result );
		}
		return $result;
	}

	/**
	 * Retorna as empresas ordenadas pelo código
	 *
	 * @param bool $toObject
	 * @return array
	 */
	public function getEmpresasByCodigo( $toObject = true )
	{
		$result = $this->getRepository()->getEmpresasByCodigo();

		if ( $toObject ) {
			require_once 'Urbs/Model/Sirh/Empresa.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Sirh_Empresa( $row );
				$list[] = $model;
			}
			$result = $list;
		}
		return $result;
	}

	/**
	 * Retorna as empresas ordenadas pela descrição
	 *
	 * @param bool $toObject
	 * @return array
	 */
	public function getEmpresasByDescricao( $toObject = true )
	{
		$result = $this->getRepository()->getEmpresasByDescricao();

		if ( $toObject ) {
			require_once 'Urbs/Model/Sirh/Empresa.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Sirh_Empresa( $row );
				$list[] = $model;
			}
			$result = $list;
		}
		return $result;
	}

	/**
	 * Retorna um elemento Zend_Form_Element_Select populado com as Empresas
	 *
	 * @param string $name Nome do elemento
	 * @return Zend_Form_Element_Select
	 */
	public function getFormSelectEmpresa( $name = 'empresa' )
	{
		$element = new Zend_Form_Element_Select( $name );

		foreach ( $this->getEmpresasByCodigo() as $empresa ) {
			$element->addMultiOption( $empresa->getCodigoEmpresa(), $empresa->getDescricaoEmpresa() );
		}
		return $element;
	}

}