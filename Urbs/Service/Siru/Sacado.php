<?php

require_once 'Urbs/Service/Siru.php';
require_once 'Urbs/Service/Interface.php';
require_once 'Urbs/Model/Siru/Sacado.php';
require_once 'Urbs/Db/Table/Siru/Sacado.php';

/**
 * Classe com métodos comuns para CRUD na tabela SIRU.TB006_SACADO
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Siru_Sacado
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Service_Siru_Sacado extends Urbs_Service_Siru implements Urbs_Service_Interface
{
	/**
	 * @var Urbs_Service_Siru_Sacado
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Siru_Sacado
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Siru_Sacado
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Siru_Sacado
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Siru_Sacado();
		}
		return $this->_repository;
	}

	/**
	 * Retorna um objeto|array com os dados do boleto
	 *
	 * @param $id
	 * @param bool $toObject
	 * @return array|Urbs_Model_Siru_Sacado
	 */
	public function getSacado( $id, $toObject = true )
	{
		$result = $this->getRepository()->getId( $id );

		if ( $toObject ) {
			require_once 'Urbs/Model/Siru/Sacado.php';
			return new Urbs_Model_Siru_Sacado( $result );
		}
		return $result;
	}

	/**
	 * Retorna um objeto|array com os dados do boleto
	 * buscando pelo documento
	 *
	 * @param $documento
	 * @param bool $toObject
	 * @return array|Urbs_Model_Siru_Sacado
	 */
	public function getSacadoDocumento( $documento, $toObject = true )
	{
		$result = $this->getRepository()->getSacadoDocumento( $documento );

		if ( $toObject ) {
			return new Urbs_Model_Siru_Sacado( $result );
		}
		return $result;
	}

	/**
	 * insere sacado
	 *
	 * @param Urbs_Model_Siru_Sacado $model
	 * @return mixed
	 */
	public function insereSacado( Urbs_Model_Siru_Sacado $model )
	{
		return $this->getRepository()->insert( $model );
	}
}