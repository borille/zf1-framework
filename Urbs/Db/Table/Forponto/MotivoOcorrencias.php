<?php

require_once 'Urbs/Db/Table/Forponto.php';

/**
 * Classe Db table que acessa a tabela FORPONTO.PMTVFPTO
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Sirh
 * @name        Urbs_Db_Table_Forponto_MotivoOcorrencias
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Forponto_MotivoOcorrencias extends Urbs_Db_Table_Forponto
{

	public function init()
	{
		parent::configDbTable( 'FORPONTO', 'PMTVFPTO', 'DFMTVCODIGO' );
	}

	public function getOcorrencias()
	{
		return $this->listAll( array( 'DFMTVCODIGO', 'DFMTVDESCRICAO' ), null, 'DFMTVCODIGO' );
	}

	public function getOcorrenciasRange( $start, $end )
	{
		return $this->listAll(
			array( 'DFMTVCODIGO', 'DFMTVDESCRICAO' ),
			array( 'DFMTVCODIGO >= ?' => $start, 'DFMTVCODIGO <= ?' => $end ),
			'DFMTVCODIGO'
		);
	}

}