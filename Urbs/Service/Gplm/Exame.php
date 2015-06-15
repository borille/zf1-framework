<?php

require_once 'Urbs/Service/Sirh.php';
require_once 'Urbs/Service/Interface.php';
require_once 'Urbs/Db/Table/Sirh/Pessoal.php';

/**
 * Classe com métodos comuns para CRUD na tabela SIRH.SIRH_TB001_PESSOAL_URBS
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Gplm
 * @name        Urbs_Service_Gplm_Exame
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Service_Gplm_Exame extends Urbs_Service_Gplm implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Gplm_Exame
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Sirh_Gplm_Exame
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Gplm_Exame
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Sirh_Gplm_Exame
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Sirh_Gplm_Exame();
		}
		return $this->_repository;
	}

	/**
	 * Agenda um exame no GPLM
	 *
	 * @param Urbs_Model_Gplm_Exame $model
	 * @return mixed
	 */
	public function agendarExame( Urbs_Model_Gplm_Exame $model )
	{
		$model->setGPLM015ID( null )
			->setGPLM015TIPOREGISTRO( 'AGENDAMENTO' )
			->setGPLM015COMPARECIMENTO( 'NÃO' )
			->setGPLM016ID( 1 )
			->setGPLM015CREATETIME( new Zend_Db_Expr( 'SYSDATE' ) );

		return $this->getRepository()->insert( $model );
	}

}