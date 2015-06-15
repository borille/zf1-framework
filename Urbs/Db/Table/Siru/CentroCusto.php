<?php

require_once 'Urbs/Db/Table/Siru.php';

/**
 * Classe Db table que acessa a tabela SIRU.SIRU009_CC_LOT
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Siru
 * @name        Urbs_Db_Table_Siru_CentroCusto
 * @copyright   Copyright (c) 2015 - URBS
 * @version     1.0
 */
class Urbs_Db_Table_Siru_CentroCusto extends Urbs_Db_Table_Siru
{

	public function init()
	{
		parent::configDbTable( 'SIRU', 'SIRU009_CC_LOT' );
	}

	public function getCentrosCustoVerba( $verba )
	{
		$select = $this->getSelect()
			->where( 'SIRU009_COD_LOTACAO = ?', $verba )
			->where( 'SIRU009_STATUS = ?', 'valido' );

		return $this->returnAll( $select );
	}

}