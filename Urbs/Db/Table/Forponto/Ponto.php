<?php

require_once 'Urbs/Db/Table/Forponto.php';

/**
 * Classe Db table que acessa a tabela FORPONTO.PPONFPTO
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Sirh
 * @name        Urbs_Db_Table_Forponto_Ponto
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Db_Table_Forponto_Ponto extends Urbs_Db_Table_Forponto
{

    public function init()
    {
        parent::configDbTable( 'FORPONTO', array( 'PON' => 'PPONFPTO' ) );
    }

    public function getRegistrosPonto( $matricula, $dataInicio = null )
    {
        $select = $this->getSelect( array(
            'DFPILDATA AS DATA',
            'DFPILHORA AS HORA',
            'DFPONTIPO AS TIPO',
            new Zend_Db_Expr(
                "CASE
                WHEN PON.DFPILHORA >= JOR.DFJORENTRADAVALIDO
                AND PON.DFPILHORA  <= JOR.DFJORENTRADANUCLEO
                AND PON.DFPONTIPO   = 0
                THEN
                  PON.DFPILHORA
                WHEN PON.DFPILHORA >= JOR.DFJORSAIDANUCLEO
                AND PON.DFPILHORA  <= JOR.DFJORSAIDAVALIDO
                AND PON.DFPONTIPO   = 1
                THEN
                  PON.DFPILHORA
                WHEN PON.DFPILHORA >= JOR.DFJORSAIDAREFEICAO
                AND PON.DFPILHORA  <= JOR.DFJORRETORNOREFEICAO
                AND PON.DFPONTIPO   = 1
                THEN
                  PON.DFPILHORA
                WHEN PON.DFPILHORA >= JOR.DFJORSAIDAREFEICAO
                AND PON.DFPILHORA  <= JOR.DFJORRETORNOREFEICAO
                AND PON.DFPONTIPO   = 0
                THEN
                  PON.DFPILHORA
                ELSE
                  CASE
                    WHEN PON.DFPILHORA < JOR.DFJORENTRADAVALIDO
                    AND PON.DFPONTIPO  = 0
                    THEN JOR.DFJORENTRADAVALIDO
                    WHEN (PON.DFPILHORA > JOR.DFJORENTRADANUCLEO AND PON.DFPILHORA < JOR.DFJORSAIDAREFEICAO)
                    AND PON.DFPONTIPO  = 0
                    THEN JOR.DFJORENTRADANUCLEO
                    WHEN PON.DFPILHORA < JOR.DFJORSAIDAREFEICAO
                    AND PON.DFPONTIPO  = 1
                    THEN JOR.DFJORSAIDAREFEICAO
                    WHEN PON.DFPILHORA > JOR.DFJORRETORNOREFEICAO
                    AND PON.DFPONTIPO  = 0
                    THEN JOR.DFJORRETORNOREFEICAO
                    WHEN PON.DFPILHORA < JOR.DFJORSAIDANUCLEO
                    AND PON.DFPONTIPO  = 1
                    THEN JOR.DFJORSAIDANUCLEO
                    WHEN PON.DFPILHORA > JOR.DFJORSAIDAVALIDO
                    AND PON.DFPONTIPO  = 1
                    THEN JOR.DFJORSAIDAVALIDO
                    ELSE 0
                  END
              END AS HORA_AJUSTADA" ),
            new Zend_Db_Expr(
                "CASE
                WHEN PON.DFPILHORA >= JOR.DFJORENTRADAVALIDO
                AND PON.DFPILHORA  <= JOR.DFJORENTRADANUCLEO
                AND PON.DFPONTIPO   = 0
                THEN
                  'EM'
                WHEN PON.DFPILHORA >= JOR.DFJORSAIDANUCLEO
                AND PON.DFPILHORA  <= JOR.DFJORSAIDAVALIDO
                AND PON.DFPONTIPO   = 1
                THEN
                  'ST'
                WHEN PON.DFPILHORA >= JOR.DFJORSAIDAREFEICAO
                AND PON.DFPILHORA  <= JOR.DFJORRETORNOREFEICAO
                AND PON.DFPONTIPO   = 1
                THEN
                  'SM'
                WHEN PON.DFPILHORA >= JOR.DFJORSAIDAREFEICAO
                AND PON.DFPILHORA  <= JOR.DFJORRETORNOREFEICAO
                AND PON.DFPONTIPO   = 0
                THEN
                  'ET'
                ELSE
                  CASE
                    WHEN PON.DFPILHORA < JOR.DFJORENTRADAVALIDO
                    AND PON.DFPONTIPO  = 0
                    THEN 'EM'
                    WHEN (PON.DFPILHORA > JOR.DFJORENTRADANUCLEO AND PON.DFPILHORA < JOR.DFJORSAIDAREFEICAO)
                    AND PON.DFPONTIPO  = 0
                    THEN 'EM'
                    WHEN PON.DFPILHORA < JOR.DFJORSAIDAREFEICAO
                    AND PON.DFPONTIPO  = 1
                    THEN 'SM'
                    WHEN PON.DFPILHORA > JOR.DFJORRETORNOREFEICAO
                    AND PON.DFPONTIPO  = 0
                    THEN 'ET'
                    WHEN PON.DFPILHORA < JOR.DFJORSAIDANUCLEO
                    AND PON.DFPONTIPO  = 1
                    THEN 'ST'
                    WHEN PON.DFPILHORA > JOR.DFJORSAIDAVALIDO
                    AND PON.DFPONTIPO  = 1
                    THEN 'ST'
                    ELSE 'FALHA'
                  END
              END AS MOTIVO" )
        ) )
            ->join( array( 'FUJ' => 'PFUJFPTO' ), 'PON.DFFUNCRACHA = FUJ.DFFUNCRACHA AND PON.DFPILDATA = FUJ.DFFUJDATA', '' )
            ->join( array( 'JOR' => 'PJORFPTO' ), 'FUJ.DFJORCODIGO = JOR.DFJORCODIGO', array( 'JOR.DFJORCARGAHORARIA AS CARGA' ) )
            ->where( 'PON.DFFUNCRACHA = ?', $matricula )
            ->order( array( 'DATA DESC', 'HORA' ) );

        if ( $dataInicio ) {
            $select->where( "PON.DFPILDATA >= TO_DATE(?, 'DD/MM/YYYY')", $dataInicio );
        }

        return $this->returnAll( $select );
    }

}