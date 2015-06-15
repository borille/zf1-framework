<?php
/**
 * Classe com métodos comuns para CRUD na tabela CON_SCF.TB0317_ESTACAO_TUBO
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Conscf_EstacaoTubo
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Service_Conscf_EstacaoTubo extends Urbs_Service_Conscf implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Conscf_EstacaoTubo
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Conscf_EstacaoTubo
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Conscf_EstacaoTubo
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Conscf_EstacaoTubo
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Conscf_EstacaoTubo();
		}
		return $this->_repository;
	}

	/**
	 * Retorna todas as estações tubo ordenadas pelo nome
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_EstacaoTubo
	 */
	public function getTubosByNome( $toObject = true )
	{
		$result = $this->getRepository()->getTubosByNome();

		if ( $toObject ) {
			require_once 'Urbs/Model/Conscf/EstacaoTubo.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Conscf_EstacaoTubo( $row );
				$list[] = $model;
			}
			$result = $list;
		}

		return $result;
	}

	/**
	 * Retorna todas as estações tubo ordenadas pelo codigo
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_EstacaoTubo
	 */
	public function getTubosByCodigo( $toObject = true )
	{
		$result = $this->getRepository()->getTubosByCodigo();

		if ( $toObject ) {
			require_once 'Urbs/Model/Conscf/EstacaoTubo.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Conscf_EstacaoTubo( $row );
				$list[] = $model;
			}
			$result = $list;
		}

		return $result;
	}

	/**
	 * Retorna todas as estações tubo ordenadas pelo cod urbs
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_EstacaoTubo
	 */
	public function getTubosByCodUrbs( $toObject = true )
	{
		$result = $this->getRepository()->getTubosByCodUrbs();

		if ( $toObject ) {
			require_once 'Urbs/Model/Conscf/EstacaoTubo.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Conscf_EstacaoTubo( $row );
				$list[] = $model;
			}
			$result = $list;
		}

		return $result;
	}

}