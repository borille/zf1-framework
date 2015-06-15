<?php

require_once 'Urbs/Db/Table/Siru.php';

/**
 * Classe Db table que acessa a tabela SIRU.TB006_SACADO
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Sirh
 * @name        Urbs_Db_Table_Siru_Sacado
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Siru_Sacado extends Urbs_Db_Table_Siru
{

	public function init()
	{
		parent::configDbTable( 'SIRU', 'TB006_SACADO', 'TB006_SEQ_SACADO', 'SEQ_TB006' );
	}

	public function getSacadoDocumento( $documento )
	{
		return $this->returnOne( $this->getSelect()->where( 'TB006_DOCUMENTO_SACADO = ?', $documento ) );
	}

}