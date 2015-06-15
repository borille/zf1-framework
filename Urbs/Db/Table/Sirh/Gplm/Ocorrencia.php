<?php
/**
 * Classe Db table que acessa a tabela SIRH.GPLM006_OCORRENCIA
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Sirh
 * @name        Urbs_Db_Table_Sirh_Gplm_Ocorrencia
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Sirh_Gplm_Ocorrencia extends Urbs_Db_Table_Sirh
{
	public function init()
	{
		parent::configDbTable( 'SIRH', 'GPLM006_OCORRENCIA', 'GPLM006_ID' );
	}
}