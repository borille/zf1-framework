<?php

class Urbs_Controller_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{

    /**
     * @var Zend_Auth
     */
    protected $_auth = null;

    /**
     * @var Zend_Acl
     */
    protected $_acl = null;

    /**
     * @var array
     */
    protected $_notLoggedRoute = array(
        'controller' => 'user',
        'action' => 'login',
        'module' => 'default'
    );

    /**
     * @var array
     */
    protected $_forbiddenRoute = array(
        'controller' => 'error',
        'action' => 'forbidden',
        'module' => 'default'
    );

    public function __construct()
    {
        $this->_auth = Zend_Auth::getInstance();
        $this->_acl = Zend_Registry::get( 'acl' );
    }

    public function preDispatch( Zend_Controller_Request_Abstract $request )
    {
        $controller = $request->getControllerName();
        $action = $request->getActionName();
        $module = $request->getModuleName();

        //verificações de segurança e redirecionamento
        if ( !$this->_auth->hasIdentity() )
        {
            //verifica se url solicitada é diferente de user
            if ( $request->getControllerName() != 'user' )
            {
                //salva a url requisitada na session para redirecionar para ela apos o login
                $session = new Zend_Session_Namespace();
                $session->redirect_url = $request->getPathInfo();
            }

            //usuario ainda nao fez o login
            $controller = $this->_notLoggedRoute['controller'];
            $action = $this->_notLoggedRoute['action'];
            $module = $this->_notLoggedRoute['module'];
        }
        else if ( !$this->_isAuthorized( $controller, $action ) )
        {
            //usuario fez o login mas nao tem acesso ao controller em questao
            $controller = $this->_forbiddenRoute['controller'];
            $action = $this->_forbiddenRoute['action'];
            $module = $this->_forbiddenRoute['module'];
        }

        //redireciona para o controller/action correto
        $request->setControllerName( $controller );
        $request->setActionName( $action );
        $request->setModuleName( $module );
    }

    protected function _isAuthorized( $controller, $action )
    {
        $user = $this->_auth->getIdentity();

        //verifica se o sistema possui o controller e se usuario tem acesso ao mesmo (controller/action)
        if ( !$this->_acl->has( $controller ) || !$this->_acl->isAllowed( $user, $controller, $action ) )
        {
            return false;
        }

        return true;
    }

}