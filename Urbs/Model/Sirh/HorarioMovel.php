<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela SIRH.SIRH_TB226_BANCO_HORAS_HM
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Sirh
 * @name        Urbs_Model_Sirh_HorarioMovel
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Model_Sirh_HorarioMovel extends Urbs_Model_Abstract
{
    protected $SIRH_TB001_MATRICULA;
    protected $SIRH_TB226_ANOMES;
    protected $SIRH_TB226_BH_POS;
    protected $SIRH_TB226_BH_NEG;
    protected $SIRH_TB226_HM_POS;
    protected $SIRH_TB226_HM_NEG;

    /**
     * @return mixed
     */
    public function getSIRHTB001MATRICULA()
    {
        return $this->SIRH_TB001_MATRICULA;
    }

    /**
     * @param mixed $SIRH_TB001_MATRICULA
     * @return $this
     */
    public function setSIRHTB001MATRICULA( $SIRH_TB001_MATRICULA )
    {
        $this->SIRH_TB001_MATRICULA = $SIRH_TB001_MATRICULA;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSIRHTB226ANOMES()
    {
        return $this->SIRH_TB226_ANOMES;
    }

    /**
     * @param mixed $SIRH_TB226_ANOMES
     * @return $this
     */
    public function setSIRHTB226ANOMES( $SIRH_TB226_ANOMES )
    {
        $this->SIRH_TB226_ANOMES = $SIRH_TB226_ANOMES;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSIRHTB226BHNEG()
    {
        return $this->SIRH_TB226_BH_NEG;
    }

    /**
     * @param mixed $SIRH_TB226_BH_NEG
     * @return $this
     */
    public function setSIRHTB226BHNEG( $SIRH_TB226_BH_NEG )
    {
        $this->SIRH_TB226_BH_NEG = $SIRH_TB226_BH_NEG;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSIRHTB226BHPOS()
    {
        return $this->SIRH_TB226_BH_POS;
    }

    /**
     * @param mixed $SIRH_TB226_BH_POS
     * @return $this
     */
    public function setSIRHTB226BHPOS( $SIRH_TB226_BH_POS )
    {
        $this->SIRH_TB226_BH_POS = $SIRH_TB226_BH_POS;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSIRHTB226HMNEG()
    {
        return $this->SIRH_TB226_HM_NEG;
    }

    /**
     * @param mixed $SIRH_TB226_HM_NEG
     * @return $this
     */
    public function setSIRHTB226HMNEG( $SIRH_TB226_HM_NEG )
    {
        $this->SIRH_TB226_HM_NEG = $SIRH_TB226_HM_NEG;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSIRHTB226HMPOS()
    {
        return $this->SIRH_TB226_HM_POS;
    }

    /**
     * @param mixed $SIRH_TB226_HM_POS
     * @return $this
     */
    public function setSIRHTB226HMPOS( $SIRH_TB226_HM_POS )
    {
        $this->SIRH_TB226_HM_POS = $SIRH_TB226_HM_POS;
        return $this;
    }

    public function getSaldoAtualHorarioMovel()
    {
        $hmPositivo = explode( ':', $this->getSIRHTB226HMPOS() );
        $positivo = ( (int)$hmPositivo[0] ) * 60;
        $positivo += (int)$hmPositivo[1];

        $hmNegativo = explode( ':', $this->getSIRHTB226HMNEG() );
        $negativo = ( (int)$hmNegativo[0] ) * 60;
        $negativo += (int)$hmNegativo[1];

        return $positivo - $negativo;
    }

}