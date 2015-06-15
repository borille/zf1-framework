<?php

/**
 * Classe para salvar as configurações gerais do aplicativo
 * para uso dentro do sistema
 * 
 * @category Urbs
 * @package Urbs_Application
 * @subpackage Urbs_Application_Resource
 * @author TRB
 * @copyright Urbs@2012
 */
class Urbs_Application_Resource_App extends Zend_Application_Resource_ResourceAbstract
{

    public function init()
    {
        //Registra para uso posterior
        Zend_Registry::set( 'app', $this->getOptions() );
    }

}