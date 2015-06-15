<?php
/**
 * Classe Db table que acessa a tabela SIRH.GPLM015_EXAME
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Sirh
 * @name        Urbs_Db_Table_Sirh_Gplm_Exame
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Sirh_Gplm_Exame extends Urbs_Db_Table_Sirh
{
	public function init()
	{
		parent::configDbTable( 'SIRH', 'GPLM015_EXAME', 'GPLM015_ID', 'SEQ_GPLM015_ID' );
	}
}