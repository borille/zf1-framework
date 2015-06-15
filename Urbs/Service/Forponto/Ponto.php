<?php

require_once 'Urbs/Service/Forponto.php';
require_once 'Urbs/Service/Interface.php';

/**
 * Classe com métodos comuns para CRUD na tabela FORPONTO.PPONFPTO
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Forponto_Ponto
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Service_Forponto_Ponto extends Urbs_Service_Forponto implements Urbs_Service_Interface
{
    /**
     * @var Urbs_Service_Forponto_Ponto
     */
    protected static $_instance = null;

    /**
     * @var Urbs_Db_Table_Forponto_Ponto
     */
    protected $_repository = null;

    /**
     * @return Urbs_Service_Forponto_Ponto
     */
    public static function getInstance()
    {
        if ( self::$_instance === NULL ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * @return Urbs_Db_Table_Forponto_Ponto
     */
    function getRepository()
    {
        if ( $this->_repository === null ) {
            $this->_repository = new Urbs_Db_Table_Forponto_Ponto();
        }
        return $this->_repository;
    }

    public function getRegistrosPonto( $matricula, $dataInicio = null )
    {
        if ( strlen( $matricula ) < 15 ) {
            $matricula = str_pad( $matricula, 15, '0', STR_PAD_LEFT );
        }

        $result = $this->getRepository()->getRegistrosPonto( $matricula, $dataInicio );

        return $result;
    }

    public function getRegistrosPontoGroupByData( $matricula, $dataInicio = null )
    {
        $result = array();

        foreach ( $this->getRegistrosPonto( $matricula, $dataInicio ) as $row ) {
            $result[$row['DATA'] . '|' . $row['CARGA']][] = $row;
        }

        return $result;
    }

}