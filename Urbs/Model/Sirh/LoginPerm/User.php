<?php

class Urbs_Model_Sirh_LoginPerm_User extends Urbs_Model_Sirh_Login implements Urbs_Acl_Role_Interface
{
    /**
     * @var Urbs_Model_Sirh_LoginPerm_Permissao
     */

    protected $_permissao;

    public function __construct($dados = array(), $permissoes = ''){
        parent::__construct($dados);

        $this->_permissao = new Urbs_Model_Sirh_LoginPerm_Permissao($permissoes);
    }


	public function setLogin( $login )
	{
		return $this;
	}

	public function getLogin()
	{
		return $this->NOME;
	}

	public function setRoleId( $roleId )
	{
		$this->_roleId = $roleId;
		return $this;
	}

	public function getRoleId()
	{
		return 'D';
	}

    public function getPermissoes(){
        return $this->_permissao;
    }



}

