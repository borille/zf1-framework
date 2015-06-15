<?php

require_once 'Urbs/Db/Table/Conscf.php';

/**
 * Classe Db table que acessa a tabela CON_SCF.TB0502_LINHA
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Conscf
 * @name        Urbs_Db_Table_Conscf_Linha
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Conscf_Linha extends Urbs_Db_Table_Conscf
{

	public function init()
	{
		parent::configDbTable( 'CON_SCF', 'TB0502_LINHA', 'TB0502_COD_LINHA' );
	}

	public function getLinhasAtivasByCodigo()
	{
		return $this->returnFromGlobalCache( 'conscf_linhas_ativas_by_codigo', 'getLinhasAtivasByCodigoCache' );
	}

	public function getLinhasAtivasByCodigoCache()
	{
		return $this->listAll( '*', array(
			'TB0502_IND_STATUS_LINHA = ?' => 'A',
			'TB0502_DATA_FECHAMENTO_LINHA IS NULL'
		), 'TB0502_COD_LINHA_URBS' );
	}

}