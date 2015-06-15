<?php

class Urbs_Service_Scad_Permissao extends Urbs_Service_Scad implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Scad_Permissao
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Scad_Permissao
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Scad_Permissao
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Scad_Permissao
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Scad_Permissao();
		}
		return $this->_repository;
	}

	public function getProjetosUsuario( $matricula, $empresa, $toObject = false )
	{
		$result = $this->getRepository()->getPermissoesCompletasUsuario( $matricula, $empresa );

		if ( $toObject && $result ) {
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Scad_Projeto( $row );
				$list[] = $model;
			}
			$result = $list;
		}

		return $result;
	}
}