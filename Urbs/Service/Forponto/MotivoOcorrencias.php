<?php

require_once 'Urbs/Service/Forponto.php';
require_once 'Urbs/Service/Interface.php';

/**
 * Classe com métodos comuns para CRUD na tabela FORPONTO.PMTVFPTO
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Forponto_MotivoOcorrencias
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Service_Forponto_MotivoOcorrencias extends Urbs_Service_Forponto implements Urbs_Service_Interface
{
	/**
	 * @var Urbs_Service_Forponto_MotivoOcorrencias
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Forponto_MotivoOcorrencias
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Forponto_MotivoOcorrencias
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Forponto_MotivoOcorrencias
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Forponto_MotivoOcorrencias();
		}
		return $this->_repository;
	}

	/**
	 * Retorna os motivos de ocorrencias do Forponto
	 *
	 * @param bool $toObject
	 * @return array
	 */
	public function getMotivoOcorrencias( $toObject = true )
	{
		$result = $this->getRepository()->getOcorrencias();

		if ( $toObject ) {
			require_once 'Urbs/Model/Forponto/MotivoOcorrencias.php';
			$list = array();

			foreach ( $result as $row ) {
				$model = new Urbs_Model_Forponto_MotivoOcorrencias( $row );
				$list[] = $model;
			}
			$result = $list;
		}
		return $result;
	}

	/**
	 * Retorna os motivos de ocorrencias do Forponto dentro do Range
	 *
	 * @param bool $toObject
	 * @return array
	 */
	public function getMotivoOcorrenciasRange( $start, $end, $toObject = true )
	{
		$result = $this->getRepository()->getOcorrenciasRange( $start, $end );

		if ( $toObject ) {
			require_once 'Urbs/Model/Forponto/MotivoOcorrencias.php';
			$list = array();

			foreach ( $result as $row ) {
				$model = new Urbs_Model_Forponto_MotivoOcorrencias( $row );
				$list[] = $model;
			}
			$result = $list;
		}
		return $result;
	}

}