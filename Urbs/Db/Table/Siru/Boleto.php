<?php

require_once 'Urbs/Db/Table/Siru.php';

/**
 * Classe Db table que acessa a tabela SIRU.TB001_BOLETO_URBS
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Sirh
 * @name        Urbs_Db_Table_Siru_Boleto
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Siru_Boleto extends Urbs_Db_Table_Siru
{

	public function init()
	{
		parent::configDbTable( 'SIRU', 'TB001_BOLETO_URBS', 'TB001_SEQ_BOLETO', 'SEQ_TB001' );
	}

	public function getNextSequence()
	{
		return $this->getAdapter()->nextSequenceId( $this->getSequence() );
	}

}