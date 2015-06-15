<?php

class Urbs_Plugin_Auth extends Zend_Controller_Plugin_Abstract
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
        'controller' => 'usuario',
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
			//usuario ainda nao fez o login
			$controller = $this->_notLoggedRoute['controller'];
			$action = $this->_notLoggedRoute['action'];
			$module = $this->_notLoggedRoute['module'];
        }
        else if ( !$this->_isAuthorized( $request->getControllerName(), $request->getActionName() ) )
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

    protected function _isAuthorized( $controller, $action, $debug = false )
    {
        $user = $this->_auth->getIdentity();

        /*
        //se estiver no modo DEBUG, salva tudo que o usuário acessou no LOG
        if ( isset( $_SESSION['debug'] ) )
        {
            Zend_Registry::get( 'logger' )->debug( 'Usuário: ' . $user->getTB008_MATRICULA() . ' - acessou: ' . $this->getRequest()->getPathInfo() );
        }
        */
        
        //verifica se o sistema possui o controller e se usuario tem acesso ao mesmo (controller/action)
        if ( !$this->_acl->has( $controller ) || !$this->_acl->isAllowed( $user, $controller, $action ) )
        {
            //Salva acesso negado no Log
            //Zend_Registry::get( 'logger' )->alert( 'Foi negado acesso à ' . $controller . '/' . $action . ' ao Usuário ' . $user->getTB008_MATRICULA() );

            return false;
        }

        return true;
    }

}