<?php

require_once 'Urbs/Service/Sftc.php';
require_once 'Urbs/Service/Interface.php';
require_once 'Urbs/Db/Table/Sftc/Fiscal.php';

/**
 * Classe com métodos comuns para CRUD na tabela SFTC.TB003_FISCAL
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sftc
 * @name        Urbs_Service_Sftc_Fiscal
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Service_Sftc_Fiscal extends Urbs_Service_Sftc implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Sftc_Fiscal
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Sftc_Fiscal
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Sftc_Fiscal
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Sftc_Fiscal
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			require_once 'Urbs/Db/Table/Sftc/Fiscal.php';
			$this->_repository = new Urbs_Db_Table_Sftc_Fiscal();
		}
		return $this->_repository;
	}

	/**
	 * Retorna se fiscal pode dirigir
	 * @param $matricula
	 * @param $empresa
	 * @return bool
	 */
	public function getPermissaoDirigir( $matricula, $empresa )
	{
		return (bool)$this->getRepository()->getFiscalDirige( $matricula, $empresa );
	}

}