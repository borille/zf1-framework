<?php

require_once 'Urbs/Service/Sirh.php';
require_once 'Urbs/Service/Interface.php';
require_once 'Urbs/Db/Table/Sirh/Login.php';

class Urbs_Service_Sirh_Login extends Urbs_Service_Sirh implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Sirh_Login
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Sirh_Login
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Sirh_Login
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Sirh_Login
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Sirh_Login();
		}
		return $this->_repository;
	}

	/**
	 * @param $matricula
	 * @param $senha
	 * @param int $empresa
	 * @param bool $toObject
	 * @return array|Urbs_Model_Sirh_Login
	 */
	public function validarLogin( $matricula, $senha, $empresa = 1, $toObject = false )
	{
		$servicePessoal = new Urbs_Service_Sirh_Pessoal();
		$matricula = $servicePessoal->validarMatricula( $matricula );

		if ( is_numeric( $matricula ) ) {
			$result = $this->getRepository()->validaLoginSemDigito( $matricula, $senha, $empresa );
		} else {
			$result = $this->getRepository()->validaLoginComDigito( $matricula, $senha );
		}

		if ( $toObject && $result ) {
			require_once 'Urbs/Model/Sirh/Login.php';
			$result = new Urbs_Model_Sirh_Login( $result );
		}
		return $result;
	}
}