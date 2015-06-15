<?php

require_once 'Urbs/Db/Table/Conscf.php';

/**
 * Classe Db table que acessa a tabela CON_SCF.TB0300_VEICULO_TC
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Conscf
 * @name        Urbs_Db_Table_Conscf_Veiculo
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Conscf_Veiculo extends Urbs_Db_Table_Conscf
{

	public function init()
	{
		parent::configDbTable( 'CON_SCF', 'TB0300_VEICULO_TC', 'TB0300_COD_PLACA' );
	}

	/**
	 * @param $id
	 * @return array
	 */
	public function getVeiculoPlaca( $id )
	{
		return $this->getId( $id );
	}

	/**
	 * @param $prefixo
	 * @return array
	 */
	public function getVeiculoPrefixo( $prefixo )
	{
		return $this->listOne( '*', array( 'TB0300_COD_PREFIXO = ?' => $prefixo ) );
	}

}