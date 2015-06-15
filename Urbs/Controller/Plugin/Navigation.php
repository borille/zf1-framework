<?php

/**
 * Classe que inicia as configura��es do Zend_Navigation (menus) do sistema
 * 
 * @category Urbs
 * @package Urbs_Controller
 * @subpackage Urbs_Controller_Plugin
 * @author TRB
 * @copyright Urbs@2012
 */
class Urbs_Controller_Plugin_Navigation extends Zend_Controller_Plugin_Abstract
{
    private $_view;
    private $_isLogged = false;

    public function routeShutdown( Zend_Controller_Request_Abstract $request )
    {
        $this->_isLogged = Zend_Auth::getInstance()->hasIdentity();

        //verifica se o usuario ja esta logado
        if ( $this->_isLogged )
        {
            $this->_view = Zend_Controller_Front::getInstance()->getParam( 'bootstrap' )->bootstrap( 'view' )->getResource( 'view' );
            $session = new Zend_Session_Namespace( Zend_Session::getOptions( 'name' ) );

            if ( isset( $session->navigation ) )
            {
                $result = $session->navigation;
            }
            else
            {
                $result = $this->_configNavigation();
                $session->navigation = $result;
            }

            //passa para a view
            $this->_view->navigation = $result;
        }
    }

    //--------------------------------------------------------------------------
    /**
     * Retorna o menu (html) de acordo com a configura��o do menu passado
     * @return string
     */
    private function _configNavigation()
    {
        // Carregamento de Configura��o
        $config = new Zend_Config_Xml( realpath( APPLICATION_PATH . '/configs/navigation.xml' ) );

        //resgata a configura��o do navigation da view
        $navigation = $this->_view->navigation();

        //efetua as configura��es
        $navigation->addPages( $config );

        //se esta logado, adiciona acl e role ao navigation
        if ( $this->_isLogged )
        {
            $navigation->setAcl( Zend_Registry::get( 'acl' ) )
                    ->setRole( Zend_Auth::getInstance()->getStorage()->read()->getRoleId() );
        }

        //retornar o html do menu
        return iconv( 'UTF-8', 'ISO-8859-1', $navigation->render() );
    }
}