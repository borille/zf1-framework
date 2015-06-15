<?php

require_once 'Urbs/Db/Table/Conscf.php';

/**
 * Classe Db table que acessa a tabela SCI_CON.ARQLIN
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Conscf
 * @name        Urbs_Db_Table_Scicon_Arqlin
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Scicon_Arqlin extends Urbs_Db_Table_Scicon
{

	public function init()
	{
		parent::configDbTable( 'SCI_CON', 'ARQLIN', 'LINHCODI' );
	}

	public function getCatracasValidas( $order )
	{
		return $this->listAll( '*', array(
			"TIPO <> 'LINHA'",
			"STATUS = 'VÁLIDO'"
		), $order );
	}

	public function getCatracasByCodigo()
	{
		return $this->returnFromGlobalCache( 'scicon_catracas_by_codigo', 'getCatracasByCodigoCache' );
	}

	public function getCatracasByCodigoCache()
	{
		return $this->getCatracasValidas( 'LINHCODI' );
	}

}