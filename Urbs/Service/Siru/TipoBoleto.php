<?php

require_once 'Urbs/Service/Siru.php';
require_once 'Urbs/Service/Interface.php';
require_once 'Urbs/Model/Siru/TipoBoleto.php';
require_once 'Urbs/Db/Table/Siru/TipoBoleto.php';

/**
 * Classe com métodos comuns para CRUD na tabela SIRU.TB003_TIPO_BOLETO
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Siru_TipoBoleto
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Service_Siru_TipoBoleto extends Urbs_Service_Siru implements Urbs_Service_Interface
{
	/**
	 * @var Urbs_Service_Siru_TipoBoleto
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Siru_TipoBoleto
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Siru_TipoBoleto
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Siru_TipoBoleto
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Siru_TipoBoleto();
		}
		return $this->_repository;
	}

	/**
	 * Retorna um objeto|array com os dados do tipo do boleto
	 *
	 * @param $id
	 * @param bool $toObject
	 * @return array|Urbs_Model_Siru_TipoBoleto
	 */
	public function getTipoBoleto( $id, $toObject = true )
	{
		$result = $this->getRepository()->getId( $id );

		if ( $toObject ) {
			return new Urbs_Model_Siru_TipoBoleto( $result );
		}
		return $result;
	}

}