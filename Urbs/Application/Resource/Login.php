<?php

/**
 * Classe para salvar as configurações utilizadas no login do usuário do sistema
 * para uso dentro do sistema
 * 
 * @category Urbs
 * @package Urbs_Application
 * @subpackage Urbs_Application_Resource
 * @author TRB
 * @copyright Urbs@2012
 */
class Urbs_Application_Resource_Login extends Zend_Application_Resource_ResourceAbstract
{

    public function init()
    {
        //Registra para uso posterior
        Zend_Registry::set( 'login', $this->getOptions() );
    }

}