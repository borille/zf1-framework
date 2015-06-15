<?php

require_once 'Urbs/Service/Sirh.php';
require_once 'Urbs/Service/Interface.php';
require_once 'Urbs/Db/Table/Sirh/Pessoal.php';

/**
 * Classe com métodos comuns para CRUD na tabela SIRH.SIRH_TB226_BANCO_HORAS_HM
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Sirh_HorarioMovel
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Service_Sirh_HorarioMovel extends Urbs_Service_Sirh implements Urbs_Service_Interface
{

    /**
     * @var Urbs_Service_Sirh_HorarioMovel
     */
    protected static $_instance = null;

    /**
     * @var Urbs_Db_Table_Sirh_HorarioMovel
     */
    protected $_repository = null;

    /**
     * @return Urbs_Service_Sirh_HorarioMovel
     */
    public static function getInstance()
    {
        if ( self::$_instance === NULL ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * @return Urbs_Db_Table_Sirh_HorarioMovel
     */
    function getRepository()
    {
        if ( $this->_repository === null ) {
            $this->_repository = new Urbs_Db_Table_Sirh_HorarioMovel();
        }
        return $this->_repository;
    }

    /**
     * Retorna o Horario Movel do Mês
     *
     * @param $matricula
     * @param $anoMes YYYYMM
     * @param bool $toObject
     * @return array|Urbs_Model_Sirh_HorarioMovel
     */
    public function getHorarioMovelMes( $matricula, $anoMes, $toObject = true )
    {
        $result = $this->getRepository()->getId( array( $matricula, $anoMes ) );

        if ( $toObject ) {
            require_once 'Urbs/Model/Sirh/HorarioMovel.php';
            return new Urbs_Model_Sirh_HorarioMovel( $result );
        }
        return $result;
    }

}