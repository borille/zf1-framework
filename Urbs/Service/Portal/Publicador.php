<?php

require_once ( 'Urbs/Service/Portal.php' );
require_once ( 'Urbs/Service/Interface.php' );
require_once ( 'Urbs/Db/Table/Portal/Publicador.php' );

class Urbs_Service_Portal_Publicador extends Urbs_Service_Portal implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Portal_Publicador
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Portal_Publicador
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Portal_Publicador
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Portal_Publicador
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Portal_Publicador();
		}
		return $this->_repository;
	}

	/**
	 * Retorna a permissão que a matricula tem no módulo
	 *
	 * @param $matricula
	 * @param $modulo
	 * @return string
	 */
	public function getPermissaoNoModulo( $matricula, $modulo )
	{
		return $this->getRepository()->getPermissaoNoModulo( $matricula, $modulo );
	}

}