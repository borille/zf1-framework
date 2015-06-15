<?php
/**
 * Classe com métodos comuns para CRUD na tabela CON_SCF.TB0316_TERMINAL
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Conscf_Terminal
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Service_Conscf_Terminal extends Urbs_Service_Conscf implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Conscf_Terminal
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Conscf_Terminal
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Conscf_Terminal
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Conscf_Terminal
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Conscf_Terminal();
		}
		return $this->_repository;
	}

	/**
	 * Retorna todas os terminais ordenados pelo nome
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_Terminal
	 */
	public function getTerminaisByNome( $toObject = true )
	{
		$result = $this->getRepository()->getTerminaisByNome();

		if ( $toObject ) {
			require_once 'Urbs/Model/Conscf/Terminal.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Conscf_Terminal( $row );
				$list[] = $model;
			}
			$result = $list;
		}

		return $result;
	}

	/**
	 * Retorna todas os terminais ordenados pelo código
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_Terminal
	 */
	public function getTerminaisByCodigo( $toObject = true )
	{
		$result = $this->getRepository()->getTerminaisByCodigo();

		if ( $toObject ) {
			require_once 'Urbs/Model/Conscf/Terminal.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Conscf_Terminal( $row );
				$list[] = $model;
			}
			$result = $list;
		}

		return $result;
	}

	/**
	 * Retorna todas os terminais ordenados pelo código urbs
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_Terminal
	 */
	public function getTerminaisByCodUrbs( $toObject = true )
	{
		$result = $this->getRepository()->getTerminaisByCodUrbs();

		if ( $toObject ) {
			require_once 'Urbs/Model/Conscf/Terminal.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Conscf_Terminal( $row );
				$list[] = $model;
			}
			$result = $list;
		}

		return $result;
	}

}