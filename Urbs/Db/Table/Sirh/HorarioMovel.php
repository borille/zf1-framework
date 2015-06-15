<?php

require_once 'Urbs/Db/Table/Sirh.php';

/**
 * Classe Db table que acessa a tabela SIRH.SIRH_TB226_BANCO_HORAS_HM
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Sirh
 * @name        Urbs_Db_Table_Sirh_HorarioMovel
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Db_Table_Sirh_HorarioMovel extends Urbs_Db_Table_Sirh
{

    public function init()
    {
        parent::configDbTable( 'SIRH', 'SIRH_TB226_BANCO_HORAS_HM', array( 'SIRH_TB001_MATRICULA', 'SIRH_TB226_ANOMES' ) );
    }

}