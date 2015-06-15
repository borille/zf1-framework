<?php

/**
 * Interface que deve ser implementada pelas classes Model de Autentica��o do Usuario no sistema
 */
interface Urbs_Auth_Interface
{
    /**
     * Deve retornar o login do usu�rio logado no sistema 
     */
    public function getLogin();

    /**
     * Deve retornar o perfil de acesso do usu�rio logadno no sistema 
     */
    public function getPerfil();
}