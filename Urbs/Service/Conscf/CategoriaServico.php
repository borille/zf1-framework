<?php
/**
 * Classe com métodos comuns para CRUD na tabela CON_SCF.TB0501_CATEGORIA_SERVICO
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Conscf_CategoriaServico
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Service_Conscf_CategoriaServico extends Urbs_Service_Conscf implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Conscf_CategoriaServico
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Conscf_CategoriaServico
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Conscf_CategoriaServico
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Conscf_CategoriaServico
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Conscf_CategoriaServico();
		}
		return $this->_repository;
	}

	/**
	 * Retorna todas as categorias de serviço
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Conscf_CategoriaServico
	 */
	public function getCategoriasServicoByNome( $toObject = true )
	{
		$result = $this->getRepository()->getCategoriasServicoByNome();

		if ( $toObject ) {
			require_once 'Urbs/Model/Conscf/CategoriaServico.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Conscf_CategoriaServico( $row );
				$list[] = $model;
			}
			$result = $list;
		}

		return $result;
	}

}