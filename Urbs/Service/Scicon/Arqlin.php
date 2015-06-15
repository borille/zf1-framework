<?php
/**
 * Classe com métodos comuns para CRUD na tabela SCI_CON.ARQLIN
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Scicon_Arqlin
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Service_Scicon_Arqlin extends Urbs_Service_Scicon implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Scicon_Arqlin
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Scicon_Arqlin
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Scicon_Arqlin
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Scicon_Arqlin
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Scicon_Arqlin();
		}
		return $this->_repository;
	}

	/**
	 * Retorna todas as catracas ordenadas pelo codigo
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_Linha
	 */
	public function getCatracasByCodigo( $toObject = true )
	{
		$result = $this->getRepository()->getCatracasByCodigo();

		if ( $toObject ) {
			require_once 'Urbs/Model/Scicon/Arqlin.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Scicon_Arqlin( $row );
				$list[] = $model;
			}
			$result = $list;
		}

		return $result;
	}

}