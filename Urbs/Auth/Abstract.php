<?php

/**
 * Classe para realizar a autenticação do usuário no sistema
 * 
 * @category Urbs
 * @package Urbs_Auth
 * @author TRB
 * @copyright Urbs@2012
 */
abstract class Urbs_Auth_Abstract
{

    /**
     * Efetua o login do usuário e armazena os dados do usuário logado
     * numa session com o namespave Zend_Auth
     * 
     * @param Urbs_Auth_Adapter $adapter Adaptador com os dados necessários para o login
     * @return boolean Sucesso ou Falha
     */
    public function login( $login, $senha )
    {
        //Efetua o login
        try
        {
            if ( !Zend_Registry::isRegistered( 'login' ) )
            {
                throw new Zend_Exception( 'Não foi possível ler as configurações de login do application.ini' );
            }

            //para ler as configurações feitas no aaplication.ini
            $config = Zend_Registry::get( 'login' );

            //verifica se existe criptografica na senha
            if ( isset( $config['security'] ) )
            {
                switch ( strtoupper( $config['security'] ) )
                {
                    case 'MD5': $senha = md5( $senha );
                        break;
                    case 'SHA1': $senha = sha1( $senha );
                        break;
                }
            }

            //Inicia o adaptador Zend_Auth para banco de dados
            $authAdapter = new Zend_Auth_Adapter_DbTable( Zend_Db_Table::getDefaultAdapter() );

            //Define os dados para processar o login
            $authAdapter->setTableName( $config['tableName'] )
                    ->setIdentityColumn( $config['column']['identity'] )
                    ->setCredentialColumn( $config['column']['credential'] )
                    ->setIdentity( $login )
                    ->setCredential( $senha );

            //se o sistema trabalha com módulos, expecifica qual módulo irá procurar o acesso do usuário
            if ( isset( $config['module'] ) )
            {
                $authAdapter->getDbSelect()->where( $config['column']['module'] . ' = ?', $config['module'] );
            }

            $auth = Zend_Auth::getInstance();
            $result = $auth->authenticate( $authAdapter );

            //Verifica se o login foi efetuado com sucesso
            if ( $result->isValid() )
            {
                //Recupera o objeto do usuário, sem a senha
                $userInfo = $authAdapter->getResultRowObject( array( $config['column']['identity'], $config['column']['role'] ) );

                //preenche o objeto da classe que implementa a Acl_Interface
                $user = new Urbs_Acl_Role();
                $user->setLogin( $userInfo->{$config['column']['identity']} )
                        ->setRoleId( $userInfo->{$config['column']['role']} );

                //salva o usuario na session com o namespace Zend_Auth
                $authStorage = $auth->getStorage();
                $authStorage->write( $user );

                return true;
            }
            else
            {
                //pega as mensagens de erro
                $messagem = $result->getMessages();

                //lança exceção com a primeira mensagem de erro
                throw new Zend_Exception( $messagem[0] );
            }
        }
        catch ( Zend_Exception $e )
        {
            //salva o erro no log
            Urbs_Action_Helper::logger( $e->getMessage(), Zend_Log::ERR );
        }
        return false;
    }
}