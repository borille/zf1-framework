<?php

require_once 'Urbs/Db/Table/Sftc.php';

/**
 * Classe Db table que acessa a tabela SFTC.TB003_FISCAL
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Sftc
 * @name        Urbs_Db_Table_Sftc_Fiscal
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Db_Table_Sftc_Fiscal extends Urbs_Db_Table_Sftc
{

	public function init()
	{
		parent::configDbTable( 'SFTC', 'TB003_FISCAL', array( 'TB003_MATRICULA', 'TB003_EMPRESA' ) );
	}

	public function getFiscalDirige( $matricula, $empresa )
	{
		return $this->getRowValue( array( $matricula, $empresa ), 'TB003_DIRIGE' );
	}

}