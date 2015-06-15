<?php
/**
 * Classe Db table que acessa a tabela SCAD.TB001_PERMISSAO
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Scad
 * @name        Urbs_Db_Table_Scad_Permissao
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Scad_Permissao extends Urbs_Db_Table_Scad
{

	public function init()
	{
		parent::configDbTable( 'SCAD', 'TB001_PERMISSAO', array( 'TB001_MATRICULA', 'TB001_EMPRESA', 'TB002_ID' ) );
	}

	/**
	 * @param $matricula
	 * @param $empresa
	 * @param $idProjeto
	 * @return mixed
	 */
	public function getPermissaoNoProjeto( $matricula, $empresa, $idProjeto )
	{
		$result = $this->getId( array( $matricula, $empresa, $idProjeto ), 'TB001_ACESSO' );
		return $result['TB001_ACESSO'];
	}

	/**
	 * @param $matricula
	 * @param $empresa
	 * @return mixed
	 */
	public function getPermissoesUsuario( $matricula, $empresa )
	{
		$select = $this->getSelect( array( 'TB002_ID', 'TB001_ACESSO' ) );
		$select->where( 'TB001_MATRICULA = ?', $matricula )
			->where( 'TB001_EMPRESA = ?', $empresa );

		return $this->returnAll( $select );
	}

	/**
	 * @param $matricula
	 * @param $empresa
	 * @return mixed
	 */
	public function getPermissoesCompletasUsuario( $matricula, $empresa )
	{
		$select = $this->getAdapter()->select();
		$select->from( $this->getTableName(), '' )
			->join( 'TB002_PROJETO', 'TB001_PERMISSAO.TB002_ID = TB002_PROJETO.TB002_ID' )
			->where( 'TB001_MATRICULA = ?', $matricula )
			->where( 'TB001_EMPRESA = ?', $empresa );

		return $this->returnAll( $select );
	}

}