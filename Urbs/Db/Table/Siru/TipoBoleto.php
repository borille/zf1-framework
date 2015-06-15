<?php

require_once 'Urbs/Db/Table/Siru.php';

/**
 * Classe Db table que acessa a tabela SIRU.TB003_TIPO_BOLETO
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Sirh
 * @name        Urbs_Db_Table_Siru_TipoBoleto
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Siru_TipoBoleto extends Urbs_Db_Table_Siru
{

	public function init()
	{
		parent::configDbTable( 'SIRU', 'TB003_TIPO_BOLETO', 'TB003_SEQ_TIPO_BOLETO' );
	}

	public function getNumeroConvenio( $idTipo )
	{
		$select = $this->getAdapter()->select();
		$select->from( array( 'T' => $this->getTableName() ), '' )
			->join( array( 'C' => 'TB004_CEDENTE' ), 'T.TB004_SEQ_CEDENTE = C.TB004_SEQ_CEDENTE', 'TB004_NUM_CONVENIO AS CONVENIO' )
			->where( 'T.TB003_SEQ_TIPO_BOLETO = ?', $idTipo );

		$result = $this->returnOne( $select );
		return $result['CONVENIO'];
	}

	public function getCobrarTarifa( $id )
	{
		return $this->getRowValue( $id, 'TB003_COBRAR_TARIFA' );
	}

	public function getTiposBoletoUnidade( $verba )
	{
		return $this->listAll( '*', array( "TB003_ATIVO = 'S'", 'UNIDADE_SIRH_TB002_VERBA = ?' => $verba ), 'TB003_NOME_TIPO_BOLETO' );
	}

	public function getTiposBoletoArea( $unidade )
	{
		return $this->listAll( '*', array( "TB003_ATIVO = 'S'", 'AREA_SIRH_TB002_VERBA = ?' => $verba ), 'TB003_NOME_TIPO_BOLETO' );
	}

}