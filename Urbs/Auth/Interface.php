<?php

/**
 * Interface que deve ser implementada pelas classes Model de Autenticação do Usuario no sistema
 */
interface Urbs_Auth_Interface
{
    /**
     * Deve retornar o login do usuário logado no sistema 
     */
    public function getLogin();

    /**
     * Deve retornar o perfil de acesso do usuário logadno no sistema 
     */
    public function getPerfil();
}