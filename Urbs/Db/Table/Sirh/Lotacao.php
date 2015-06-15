<?php

require_once 'Urbs/Db/Table/Sirh.php';

/**
 * Classe Db table que acessa a tabela SIRH.SIRH_TB002_LOTACAO_URBS
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Sirh
 * @name        Urbs_Db_Table_Sirh_Lotacao
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Sirh_Lotacao extends Urbs_Db_Table_Sirh
{

	public function init()
	{
		parent::configDbTable( 'SIRH', 'SIRH_TB002_LOTACAO_URBS', 'SIRH_TB002_VERBA' );
	}

	/**
	 * Retorna o campo de data de extinção da verba
	 * @param $verba
	 * @return mixed
	 */
	public function getDataExtincaoVerba( $verba )
	{
		return $this->getRowValue( $verba, 'SIRH_TB002_DATA_EXTINCAO' );
	}

	/**
	 * Retorna o campo de nome da verba
	 * @param $verba
	 * @return string
	 */
	public function getNomeVerba( $verba )
	{
		return $this->getRowValue( $verba, 'SIRH_TB002_DESC_VERBA' );
	}

	/**
	 * Retorna o campo de sigla da verba
	 * @param $verba
	 * @return string
	 */
	public function getSiglaVerba( $verba )
	{
		return $this->getRowValue( $verba, 'SIRH_TB002_SIGLA' );
	}

	/**
	 * Retorna uma lista das verbas com a sua descrição
	 *
	 * @param bool $ativas
	 * @return array
	 */
	public function getVerbasComDescrição( $ativas = true )
	{
		$select = $this->getSelect( array( 'SIRH_TB002_VERBA', 'SIRH_TB002_DESC_VERBA' ) )->order( 'SIRH_TB002_DESC_VERBA' );

		if ( $ativas ) {
			$select->where( 'SIRH_TB002_DATA_EXTINCAO IS NULL' );
		}

		return $this->returnAll( $select );
	}

	/**
	 * Retorna todos os dados da lotação da verba(opcional)
	 *
	 * @param null $verba
	 * @param bool $ativas
	 * @return array
	 */
	public function getLotacaoCompleta( $verba = null, $ativas = true )
	{
		$select = $this->getAdapter()->select();
		$select->from( array( 'LOTACAO' => 'SIRH_TB002_LOTACAO_URBS' ) )
			->join( array( 'GERENCIA' => 'SIRH_TB004_GERENCIA' ), 'LOTACAO.SIRH_TB004_COD_GER = GERENCIA.SIRH_TB004_COD_GER', array( 'SIRH_TB004_DESC_GER', 'SIRH_TB004_SIGLA' ) )
			->join( array( 'DIRETORIA' => 'SIRH_TB003_DIRETORIA' ), 'LOTACAO.SIRH_TB003_COD_DIR = DIRETORIA.SIRH_TB003_COD_DIR', array( 'SIRH_TB003_DESC_DIR' ) );

		if ( $ativas ) {
			$select->where( 'LOTACAO.SIRH_TB002_DATA_EXTINCAO IS NULL' );
		}

		if ( $verba ) {
			return $this->returnOne( $select->where( 'SIRH_TB002_VERBA = ?', $verba ) );
		} else {
			return $this->returnAll( $select );
		}
	}

	/**
	 * Retorna todas as verbas da gerencia
	 *
	 * @param $gerencia
	 * @param bool $ativas
	 * @return array
	 */
	public function getVerbasDaGerencia( $gerencia, $ativas = true )
	{
		$select = $this->getSelect()->where( 'SIRH_TB004_COD_GER = ?', $gerencia );

		if ( $ativas ) {
			$select->where( 'SIRH_TB002_DATA_EXTINCAO IS NULL' );
		}
		return $this->returnAll( $select );
	}

	/**
	 * Retorna todas as gerencias da diretoria
	 *
	 * @param $diretoria
	 * @param bool $ativas
	 * @return array
	 */
	public function getGerenciasDaDiretoria( $diretoria, $ativas = true )
	{
		$select = $this->getSelect()
			->where( 'SIRH_TB003_COD_DIR = ?', $diretoria )
			->where( 'SIRH_TB004_COD_GER IS NULL' );

		if ( $ativas ) {
			$select->where( 'SIRH_TB002_DATA_EXTINCAO IS NULL' );
		}
		return $this->returnAll( $select );
	}
}