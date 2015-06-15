<?php

require_once 'Urbs/Db/Table/Sirh.php';

/**
 * Classe Db table que acessa a tabela SIRH.SIRH_TB001_PESSOAL_URBS
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Sirh
 * @name        Urbs_Db_Table_Sirh_Pessoal
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Sirh_Pessoal extends Urbs_Db_Table_Sirh
{
	const NOME = 'SIRH_TB001_NOME';
	const VERBA = 'SIRH_TB002_VERBA';
	const EMAIL = 'SIRH_TB001_EMAIL';

	public function init()
	{
		parent::configDbTable( 'SIRH', 'SIRH_TB001_PESSOAL_URBS', 'SIRH_TB001_MATRICULA' );
	}

	/**
	 * Retorna um Zend_Db_Select com a regra simples para achar uma pessoa pela matricula + empresa
	 *
	 * @param $matricula
	 * @param $empresa
	 * @param string $cols
	 * @return Zend_Db_Select
	 */
	protected function _getSelectSemDigito( $matricula, $empresa, $cols = '*' )
	{
		$select = $this->getSelect( $cols )
			->where( 'SUBSTR(SIRH_TB001_MATRICULA,0,5) = ?', $matricula )
			->where( 'SIRH_TB005_COD_EMPR_RH = ?', $empresa );

		return $select;
	}

	/**
	 * Efetua a query de acordo com os parametros passados
	 *
	 * @param $matricula
	 * @param $campo
	 * @param null $empresa
	 * @return mixed
	 */
	public function getValorCampo( $matricula, $campo, $empresa = null )
	{
		if ( $empresa ) {
			$result = $this->returnOne( $this->_getSelectSemDigito( $matricula, $empresa, $campo ) );
			return $result[$campo];
		}
		return $this->getRowValue( $matricula, $campo );
	}

	/**
	 * @param $matricula
	 * @return array
	 */
	public function getPessoa( $matricula, $empresa = null )
	{
		if ( $empresa ) {
			return $this->returnOne( $this->_getSelectSemDigito( $matricula, $empresa ) );
		}
		return $this->getId( $matricula );
	}

	/**
	 * Retorna os campos de endereço da pessoa
	 *
	 * @param $matricula
	 * @return array
	 */
	public function getEnderecoCompleto( $matricula, $empresa = null )
	{
		$campos = array(
			'SIRH_TB001_END_RUA',
			'SIRH_TB001_END_NUMERO',
			'SIRH_TB001_END_COMPL',
			'SIRH_TB001_END_CEP',
			'SIRH_TB001_END_CIDADE',
			'SIRH_TB001_END_UF',
			'SIRH_TB001_END_BAIRRO'
		);

		if ( $empresa ) {
			return $this->returnOne( $this->_getSelectSemDigito( $matricula, $empresa, $campos ) );
		}
		return $this->getId( $matricula, $campos );
	}

	/**
	 * Retorna todos os dados da lotação da pessoa
	 *
	 * @param $matricula
	 * @return array
	 */
	public function getLotacaoCompleta( $matricula, $empresa = null )
	{
		$select = $this->getAdapter()->select();
		$select->from( array( 'PESSOAL' => $this->getName() ), null )
			->join( array( 'LOTACAO' => 'SIRH_TB002_LOTACAO_URBS' ), 'PESSOAL.SIRH_TB002_VERBA = LOTACAO.SIRH_TB002_VERBA' )
			->join( array( 'GERENCIA' => 'SIRH_TB004_GERENCIA' ), 'LOTACAO.SIRH_TB004_COD_GER = GERENCIA.SIRH_TB004_COD_GER', array( 'SIRH_TB004_DESC_GER', 'SIRH_TB004_SIGLA' ) )
			->join( array( 'DIRETORIA' => 'SIRH_TB003_DIRETORIA' ), 'LOTACAO.SIRH_TB003_COD_DIR = DIRETORIA.SIRH_TB003_COD_DIR', array( 'SIRH_TB003_DESC_DIR' ) );

		if ( $empresa ) {
			$select->where( 'SUBSTR(PESSOAL.SIRH_TB001_MATRICULA,0,5) = ?', $matricula )
				->where( 'PESSOAL.SIRH_TB005_COD_EMPR_RH = ?', $empresa );
		} else {
			$select->where( 'PESSOAL.SIRH_TB001_MATRICULA = ?', $matricula );
		}

		return $this->returnOne( $select );
	}

	/**
	 * Retorna se uma pessoa está ativa
	 *
	 * @param $matricula
	 * @return bool
	 */
	public function getPessoaAtiva( $matricula, $empresa = null )
	{
		return ( $this->getValorCampo( $matricula, 'SIRH_TB001_STATUS', $empresa ) == 'A' ) ? true : false;
	}

	/**
	 * Altera a senha da intranet utilizando a procedure SIRH.TROCA_SENHA
	 *
	 * @param $matricula
	 * @param $empresa
	 * @param $senha
	 * @return bool
	 */
	public function alterarSenha( $matricula, $empresa, $senha )
	{
		try {
			// Cria o statement para chamada da procedure
			$stmt = $this->_db->prepare( "CALL TROCA_SENHA( :senha, :matricula, :empresa )" );

			//preenche os parametros
			$stmt->bindParam( ':matricula', $matricula );
			$stmt->bindParam( ':empresa', $empresa );
			$stmt->bindParam( ':senha', $senha );

			// Executa a procedure
			$stmt->execute();

			return true;
		} catch ( Zend_Db_Exception $e ) {
			if ( Zend_Registry::isRegistered( 'logger' ) ) {
				//Salva erro no Log
				Zend_Registry::get( 'logger' )->err( $e->getMessage() );
			}
			return false;
		}
	}

}