<?php
/**
 * Classe com métodos comuns para CRUD na tabela CON_SCF.TB0200_EMPRESA
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Conscf_Empresa
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Service_Conscf_Empresa extends Urbs_Service_Conscf implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Conscf_Empresa
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Conscf_Empresa
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Conscf_Empresa
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Conscf_Empresa
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Conscf_Empresa();
		}
		return $this->_repository;
	}

	/**
	 * @param $id
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_Empresa
	 */
	public function getEmpresa( $id, $toObject = true )
	{
		$result = $this->getRepository()->getEmpresa( $id );

		if ( $toObject ) {
			$result = new Urbs_Model_Conscf_Empresa( $result );
		}
		return $result;
	}

	/**
	 * @param $id
	 * @return string
	 */
	public function getRazaoSocialEmpresa( $id )
	{
		return $this->getRepository()->getRazaoSocialEmpresa( $id );
	}

	/**
	 * @param $id
	 * @return string
	 */
	public function getNomeFantasiaEmpresa( $id )
	{
		return $this->getRepository()->getNomeFantasiaEmpresa( $id );
	}

	/**
	 * @param $id
	 * @return string
	 */
	public function getEmailEmpresa( $id )
	{
		return $this->getRepository()->getEmailEmpresa( $id );
	}

	/**
	 * Retorna todas as empresas
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_Empresa
	 */
	public function getEmpresasByCodigo( $toObject = true )
	{
		$result = $this->getRepository()->getEmpresasByCodigo();

		if ( $toObject ) {
			require_once 'Urbs/Model/Conscf/Empresa.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Conscf_Empresa( $row );
				$list[] = $model;
			}
			$result = $list;
		}
		return $result;
	}


	/**
	 * Retorna todas as empresas do consórcio
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_Empresa
	 */
	public function getEmpresasConsorcioByNomeFantasia( $idConsorcio = null, $toObject = true )
	{
		$result = $this->getRepository()->getEmpresasConsorcioByNomeFantasia( $idConsorcio );

		if ( $toObject ) {
			require_once 'Urbs/Model/Conscf/Empresa.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Conscf_Empresa( $row );
				$list[] = $model;
			}
			$result = $list;
		}
		return $result;
	}

	/**
	 * Retorna todas as empresas
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_Empresa
	 */
	public function getEmpresasByNomeFantasia( $toObject = true )
	{
		$result = $this->getRepository()->getEmpresasByNomeFantasia();

		if ( $toObject ) {
			require_once 'Urbs/Model/Conscf/Empresa.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Conscf_Empresa( $row );
				$list[] = $model;
			}
			$result = $list;
		}
		return $result;
	}

}