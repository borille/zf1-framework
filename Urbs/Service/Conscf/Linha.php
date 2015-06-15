<?php
/**
 * Classe com métodos comuns para CRUD na tabela CON_SCF.TB0502_LINHA
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Conscf_Linha
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Service_Conscf_Linha extends Urbs_Service_Conscf implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Conscf_Linha
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Conscf_Linha
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Conscf_Linha
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Conscf_Linha
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Conscf_Linha();
		}
		return $this->_repository;
	}

	/**
	 * Retorna todas as linhas ativas
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_Linha
	 */
	public function getLinhasAtivasByCodigo( $toObject = true )
	{
		$result = $this->getRepository()->getLinhasAtivasByCodigo();

		if ( $toObject ) {
			require_once 'Urbs/Model/Conscf/Linha.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Conscf_Linha( $row );
				$list[] = $model;
			}
			$result = $list;
		}

		return $result;
	}

}