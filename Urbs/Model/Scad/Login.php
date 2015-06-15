<?php

require_once 'Urbs/Model/Sirh/Login.php';
require_once 'Urbs/Acl/Role/Interface.php';

/**
 * Objeto que representa uma linha da tabela SCAD.TB002_PROJETO
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Scad
 * @name        Urbs_Model_Scad_Login
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Model_Scad_Login extends Urbs_Model_Sirh_Login implements Urbs_Acl_Role_Interface
{

	protected $_login;
	protected $_roleId;
	protected $_app;

	/**
	 * Seta o login do usuário
	 *
	 * @param $login
	 * @return $this
	 */
	public function setLogin( $login )
	{
		$this->_login = $login;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLogin()
	{
		if ( $this->_login ) {
			return $this->_login;
		} else {
			return $this->getPrimeiroNome();
		}
	}

	/**
	 * Seta o perfil do usuário
	 *
	 * @param $roleId
	 * @return $this
	 */
	public function setRoleId( $roleId )
	{
		$this->_roleId = $roleId;
		return $this;
	}

	/**
	 * Returns the string identifier of the Role
	 *
	 * @return string
	 */
	public function getRoleId()
	{
		return $this->_roleId;
	}

	public function setApp( $app )
	{
		$this->_app = $app;
		return $this;
	}

	public function getApp()
	{
		return $this->_app;
	}

}