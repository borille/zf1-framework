<?php
/**
 * Classe com métodos comuns para CRUD na tabela CON_SCF.TB0206_CONSORCIO
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Conscf_Consorcio
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Service_Conscf_Consorcio extends Urbs_Service_Conscf implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Conscf_Consorcio
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Conscf_Consorcio
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Conscf_Consorcio
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Conscf_Consorcio
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Conscf_Consorcio();
		}
		return $this->_repository;
	}

	/**
	 * Retorna todas os consorcios
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_Consorcio
	 */
	public function getConsorciosByNome( $toObject = true )
	{
		$result = $this->getRepository()->getConsorciosByNome();

		if ( $toObject ) {
			require_once 'Urbs/Model/Conscf/Consorcio.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Conscf_Consorcio( $row );
				$list[] = $model;
			}
			$result = $list;
		}
		return $result;
	}

	/**
	 * Retorna todas os consorcios ordenados pelo código
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_Consorcio
	 */
	public function getConsorciosByCod( $toObject = true )
	{
		$result = $this->getRepository()->getConsorciosByCod();

		if ( $toObject ) {
			require_once 'Urbs/Model/Conscf/Consorcio.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Conscf_Consorcio( $row );
				$list[] = $model;
			}
			$result = $list;
		}
		return $result;
	}

	/**
	 * Retorna o nome do consorcio
	 * @param $id
	 * @return string
	 */
	public function getNomeConsorcio( $id )
	{
		return $this->getRepository()->getNomeConsorcio( $id );
	}

	/**
	 * Retorna o consorcio
	 * @param $id
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_Consorcio
	 */
	public function getConsorcio( $id, $toObject = true )
	{
		$result = $this->getRepository()->getId( $id );

		if ( $toObject ) {
			require_once 'Urbs/Model/Conscf/Consorcio.php';
			$result = new Urbs_Model_Conscf_Consorcio( $result );
		}
		return $result;
	}

}