<?php

require_once 'Urbs/Service/Siru.php';
require_once 'Urbs/Service/Interface.php';
require_once 'Urbs/Model/Siru/CentroCusto.php';
require_once 'Urbs/Db/Table/Siru/CentroCusto.php';

/**
 * Classe com métodos comuns para CRUD na tabela SIRU.SIRU009_CC_LOT
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Siru_CentroCusto
 * @copyright   Copyright (c) 2015 - URBS
 * @version     1.0
 */
class Urbs_Service_Siru_CentroCusto extends Urbs_Service_Siru implements Urbs_Service_Interface
{
	/**
	 * @var Urbs_Service_Siru_CentroCusto
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Siru_CentroCusto
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Siru_CentroCusto
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Siru_CentroCusto
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Siru_CentroCusto();
		}
		return $this->_repository;
	}

	/**
	 * Retorna um objeto|array com os centros de custo da verba
	 *
	 * @param $verba
	 * @param bool $toObject
	 * @return array|Urbs_Model_Siru_TipoBoleto
	 */
	public function getCentrosCustoVerba( $verba, $toObject = true )
	{
		$result = $this->getRepository()->getCentrosCustoVerba( $verba );

		if ( $toObject ) {
			$list = array();

			foreach ( $result as $row ) {
				$model = new Urbs_Model_Siru_CentroCusto( $row );
				$list[] = $model;
			}
			$result = $list;
		}
		return $result;
	}

}