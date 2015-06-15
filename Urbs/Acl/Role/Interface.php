<?php

require_once 'Zend/Acl/Role/Interface.php';

interface Urbs_Acl_Role_Interface extends Zend_Acl_Role_Interface
{

    public function setLogin( $login );

    public function getLogin();

    public function setRoleId( $roleId );
}