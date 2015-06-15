<?php

require_once 'Urbs/Db/Table/Conscf.php';

/**
 * Classe Db table que acessa a tabela CON_SCF.TB0206_CONSORCIO
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Conscf
 * @name        Urbs_Db_Table_Conscf_Consorcio
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Conscf_Consorcio extends Urbs_Db_Table_Conscf
{

	public function init()
	{
		parent::configDbTable( 'CON_SCF', 'TB0206_CONSORCIO', 'TB0206_COD_CONSORCIO' );
	}

	/**
	 * @return array
	 */
	public function getConsorciosByNome()
	{
		return $this->returnFromGlobalCache( 'conscf_consorciosByNome', 'getConsorciosByNomeCache' );
	}

	public function getConsorciosByNomeCache()
	{
		return $this->listAll( '*', null, 'TB0206_NOME_CONSORCIO' );
	}

	public function getNomeConsorcio( $id )
	{
		return $this->getRowValue( $id, 'TB0206_NOME_CONSORCIO' );
	}

	/**
	 * @return array
	 */
	public function getConsorciosByCod()
	{
		return $this->returnFromGlobalCache( 'conscf_consorciosByCod', 'getConsorciosByCodCache' );
	}

	public function getConsorciosByCodCache()
	{
		return $this->listAll( '*', null, 'TB0206_COD_CONSORCIO' );
	}

}