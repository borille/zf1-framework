<?php

require_once 'Urbs/Db/Table/Conscf.php';

/**
 * Classe Db table que acessa a tabela CON_SCF.TB0317_ESTACAO_TUBO
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Conscf
 * @name        Urbs_Db_Table_Conscf_EstacaoTubo
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Conscf_EstacaoTubo extends Urbs_Db_Table_Conscf
{

	public function init()
	{
		parent::configDbTable( 'CON_SCF', 'TB0317_ESTACAO_TUBO', 'TB0317_COD_ESTACAO_TUBO' );
	}

	public function getTubosAtivos( $order )
	{
		return $this->listAll( '*', array(
			"TB0317_IND_STATUS = '0'",
			'TB0317_COD_URBS IS NOT NULL'
		), $order );
	}

	public function getTubosByNome()
	{
		return $this->returnFromCache( 'conscf_tubos_by_nome', 'getTubosByNomeCache' );
	}

	public function getTubosByNomeCache()
	{
		return $this->getTubosAtivos( 'TB0317_NOME_ESTACAO_TUBO' );
	}

	public function getTubosByCodigo()
	{
		return $this->returnFromCache( 'conscf_tubos_by_codigo', 'getTubosByCodigoCache' );
	}

	public function getTubosByCodigoCache()
	{
		return $this->getTubosAtivos( 'TB0317_COD_ESTACAO_TUBO' );
	}


	public function getTubosByCodUrbs()
	{
		return $this->returnFromCache( 'conscf_tubos_by_codurbs', 'getTubosByCodUrbsCache' );
	}

	public function getTubosByCodUrbsCache()
	{
		return $this->getTubosAtivos( 'TB0317_COD_URBS' );
	}

}