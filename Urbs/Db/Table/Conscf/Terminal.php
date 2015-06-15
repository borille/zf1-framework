<?php

require_once 'Urbs/Db/Table/Conscf.php';

/**
 * Classe Db table que acessa a tabela CON_SCF.TB0316_TERMINAL
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Conscf
 * @name        Urbs_Db_Table_Conscf_Terminal
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Conscf_Terminal extends Urbs_Db_Table_Conscf
{

	public function init()
	{
		parent::configDbTable( 'CON_SCF', 'TB0316_TERMINAL', 'TB0316_COD_TERMINAL' );
	}

	public function getTerminaisAtivos( $order )
	{
		return $this->listAll( '*', array(
			"TB0316_IND_STATUS = '0'",
			'TB0316_COD_URBS IS NOT NULL'
		), $order );
	}

	public function getTerminaisByNome()
	{
		return $this->returnFromCache( 'conscf_terminais_by_nome', 'getTerminaisByNomeCache' );
	}

	public function getTerminaisByNomeCache()
	{
		return $this->getTerminaisAtivos( 'TB0316_NOME_TERMINAL' );
	}

	public function getTerminaisByCodigo()
	{
		return $this->returnFromCache( 'conscf_terminais_by_codigo', 'getTerminaisByCodigoCache' );
	}

	public function getTerminaisByCodigoCache()
	{
		return $this->getTerminaisAtivos( 'TB0316_COD_TERMINAL' );
	}

	public function getTerminaisByCodUrbs()
	{
		return $this->returnFromCache( 'conscf_terminais_by_codurbs', 'getTerminaisByCodUrbsCache' );
	}

	public function getTerminaisByCodUrbsCache()
	{
		return $this->getTerminaisAtivos( 'TB0316_COD_URBS' );
	}

}