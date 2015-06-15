<?php
/**
 * Classe com métodos comuns para CRUD na tabela CON_SCF.TB0300_VEICULO_TC
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Conscf_Veiculo
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Service_Conscf_Veiculo extends Urbs_Service_Conscf implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Conscf_Veiculo
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Conscf_Veiculo
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Conscf_Veiculo
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Conscf_Veiculo
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Conscf_Veiculo();
		}
		return $this->_repository;
	}

	/**
	 * @param $placa
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_Veiculo
	 */
	public function getVeiculoPlaca( $placa, $toObject = true )
	{
		$result = $this->getRepository()->getVeiculo( $placa );

		if ( $toObject ) {
			$result = new Urbs_Model_Conscf_Veiculo( $result );
		}
		return $result;
	}

	/**
	 * @param $prefixo
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_Veiculo
	 */
	public function getVeiculoPrefixo( $prefixo, $toObject = true )
	{
		$result = $this->getRepository()->getVeiculoPrefixo( $prefixo );

		if ( $toObject ) {
			$result = new Urbs_Model_Conscf_Veiculo( $result );
		}
		return $result;
	}

}