<?php
/**
 * Objeto que representa permissoes de sistema
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Sirh
 * @name        Urbs_Model_Sirh_LoginPerm_Permissao
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Model_Sirh_LoginPerm_Permissao extends Urbs_Model_Abstract
{
    protected $ATIVO;
    protected $CADASTRO;
    protected $LIDER;
    protected $ADMIN;
    protected $RELATORIO;
    protected $OCORRENCIAS;
    protected $TREINAMENTO;
    protected $AUSENCIAS;
    protected $REQUISICOES;
    protected $MATERIAL;
    protected $RH;

    /** Funcao que monta o objeto de permissao
     * @param array $str
     */
    public function __construct($str)
    {
        $i = -1;

        $minhasVar = $this->toArray();
        foreach($minhasVar as $chave => $valor){
            $i++;
            $this->$chave = substr($str,$i,1);
            if(!$this->$chave)
            {
                $this->$chave = 0;
            }
        }

    }

    /** Funcao que devolve as permissoes todas em um stringao
     * @return string
     */
    public function toString()
    {
       return implode($this->toArray());
    }

    //* GETTERS E SETTERS NAO ORGANIZADOS *//

    /**
     * @param mixed $RH
     */
    public function setRH($RH)
    {
        $this->RH = $RH;
    }


    /**
     * @return mixed
     */
    public function getRH()
    {
        return $this->RH;
    }

    /**
     * @param mixed $ADMIN
     */
    public function setADMIN($ADMIN)
    {
        $this->ADMIN = $ADMIN;
    }

    /**
     * @return mixed
     */
    public function getADMIN()
    {
        return $this->ADMIN;
    }

    /**
     * @param mixed $ATIVO
     */
    public function setATIVO($ATIVO)
    {
        $this->ATIVO = $ATIVO;
    }

    /**
     * @return mixed
     */
    public function getATIVO()
    {
        return $this->ATIVO;
    }

    /**
     * @param mixed $AUSENCIAS
     */
    public function setAUSENCIAS($AUSENCIAS)
    {
        $this->AUSENCIAS = $AUSENCIAS;
    }

    /**
     * @return mixed
     */
    public function getAUSENCIAS()
    {
        return $this->AUSENCIAS;
    }

    /**
     * @param mixed $CADASTRO
     */
    public function setCADASTRO($CADASTRO)
    {
        $this->CADASTRO = $CADASTRO;
    }

    /**
     * @return mixed
     */
    public function getCADASTRO()
    {
        return $this->CADASTRO;
    }

    /**
     * @param mixed $LIDER
     */
    public function setLIDER($LIDER)
    {
        $this->LIDER = $LIDER;
    }

    /**
     * @return mixed
     */
    public function getLIDER()
    {
        return $this->LIDER;
    }

    /**
     * @param mixed $MATERIAL
     */
    public function setMATERIAL($MATERIAL)
    {
        $this->MATERIAL = $MATERIAL;
    }

    /**
     * @return mixed
     */
    public function getMATERIAL()
    {
        return $this->MATERIAL;
    }

    /**
     * @param mixed $OCORRENCIAS
     */
    public function setOCORRENCIAS($OCORRENCIAS)
    {
        $this->OCORRENCIAS = $OCORRENCIAS;
    }

    /**
     * @return mixed
     */
    public function getOCORRENCIAS()
    {
        return $this->OCORRENCIAS;
    }

    /**
     * @param mixed $RELATORIO
     */
    public function setRELATORIO($RELATORIO)
    {
        $this->RELATORIO = $RELATORIO;
    }

    /**
     * @return mixed
     */
    public function getRELATORIO()
    {
        return $this->RELATORIO;
    }

    /**
     * @param mixed $REQUISICOES
     */
    public function setREQUISICOES($REQUISICOES)
    {
        $this->REQUISICOES = $REQUISICOES;
    }

    /**
     * @return mixed
     */
    public function getREQUISICOES()
    {
        return $this->REQUISICOES;
    }

    /**
     * @param mixed $TREINAMENTO
     */
    public function setTREINAMENTO($TREINAMENTO)
    {
        $this->TREINAMENTO = $TREINAMENTO;
    }

    /**
     * @return mixed
     */
    public function getTREINAMENTO()
    {
        return $this->TREINAMENTO;
    }




}