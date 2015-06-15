<?php

/**
 * Classe que inicia as configura��es da View do sistema
 * 
 * @category Urbs
 * @package Urbs_Controller
 * @subpackage Urbs_Controller_Plugin
 * @author TRB
 * @copyright Urbs@2012
 */
class Urbs_Controller_Plugin_ViewSetup extends Zend_Controller_Plugin_Abstract
{

    public function routeShutdown( Zend_Controller_Request_Abstract $request )
    {
        $view = Zend_Controller_Front::getInstance()->getParam( 'bootstrap' )->bootstrap( 'view' )->getResource( 'view' );
        $app = Zend_Registry::get( 'app' );

        $view->doctype( 'XHTML1_STRICT' );
        $view->setEncoding( 'ISO-8859-1' );
        $view->headTitle( $app['name'] );
        $view->headMeta()->appendHttpEquiv( 'Content-Type', 'text/html;charset=ISO-8859-1' );
	    $view->headMeta()->appendName('viewport','width=device-width, initial-scale=1.0');

        //----------------------------------------------------------------------        
        //carrega os arquivos .CSS que foram especificados no application.ini
        if ( isset($app['css']['files']) )
        {
            foreach ( $app['css']['files'] as $file )
            {
                $view->headLink()->prependStylesheet( $app['css']['directory'] . '/' . $file );
            }
        }

        //carrega o arquivo public/css/controller/action.css (se existir)
        $view->cssHelper( $view->baseUrl() );

        //----------------------------------------------------------------------
        //configura��es para o jQuery-ui
        if ( isset($app['jquery']) )
        {
            $view->jQuery()->addStylesheet( $app['jquery']['ui']['css'] )
                    ->setLocalPath( $app['jquery']['js'] )
                    ->setUiLocalPath( $app['jquery']['ui']['js'] )
                    ->enable()
                    ->uiEnable();
        }

        //----------------------------------------------------------------------
        //carrega os arquivos .JS que foram especificados no application.ini
        if ( isset($app['js']['files']) )
        {
            foreach ( $app['js']['files'] as $file )
            {
                $view->headScript()->appendFile( $app['js']['directory'] . '/' . $file );
            }
        }

        //carrega o arquivo public/js/nome_controller/nome_action.js (se existir)
        $view->javascriptHelper( $view->baseUrl() );
        //----------------------------------------------------------------------
        //variaveis para a view
        $view->env = APPLICATION_ENV;
        $view->controller = $request->getControllerName();
        $view->action = $request->getActionName();
        $view->id = $request->getParam( 'id' );
    }

}
