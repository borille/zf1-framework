<?php

require_once 'Urbs/Db/Table/Siru.php';

/**
 * Classe Db table que acessa a tabela SIRU.TB007_TARIFA
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Sirh
 * @name        Urbs_Db_Table_Siru_Tarifa
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Siru_Tarifa extends Urbs_Db_Table_Siru
{

	public function init()
	{
		parent::configDbTable( 'SIRU', 'TB007_TARIFA', 'TB007_SEQ_TARIFA', 'SEQ_TB007' );
	}

	public function getIdTarifaVigente()
	{
		$select = $this->getSelect( 'TB007_SEQ_TARIFA' )
			->where( 'TRUNC(SYSDATE) >= TB007_DATA_INI_VIGENCIA' )
			->where( '(TB007_DATA_FIM_VIGENCIA IS NULL OR TRUNC(SYSDATE) <= TB007_DATA_FIM_VIGENCIA)' );

		$result = $this->returnOne( $select );
		return $result['TB007_SEQ_TARIFA'];
	}

}