<?php

require_once 'Urbs/Db/Table/Sirh.php';

/**
 * Classe Db table que acessa a tabela SIRH.SIRH_TB005_EMPRESA_RH
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Sirh
 * @name        Urbs_Db_Table_Sirh_Empresa
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Sirh_Empresa extends Urbs_Db_Table_Sirh
{

	public function init()
	{
		parent::configDbTable( 'SIRH', 'SIRH_TB005_EMPRESA_RH', 'SIRH_TB005_COD_EMPR_RH' );
	}

	/**
	 * @param $id
	 * @return array
	 */
	public function getEmpresa( $id )
	{
		return $this->getId( $id );
	}

	/**
	 * @return array
	 */
	protected function _getEmpresasByCodigoCache()
	{
		return $this->listAll( '*', null, 'SIRH_TB005_COD_EMPR_RH' );
	}

	/**
	 * retorna as empresas ordenadas pelo código
	 *
	 * @return array
	 */
	public function getEmpresasByCodigo()
	{
		return $this->returnFromGlobalCache( 'empresasByCodigo', '_getEmpresasByCodigoCache' );
	}

	/**
	 * @return array
	 */
	protected function _getEmpresasByDescricaoCache()
	{
		return $this->listAll( '*', null, 'SIRH_TB005_DESC_EMPR_RH' );
	}

	/**
	 * retorna as empresas ordenadas pela descrição
	 *
	 * @return array
	 */
	public function getEmpresasByDescricao()
	{
		return $this->returnFromGlobalCache( 'empresasByDescricao', '_getEmpresasByDescricaoCache' );
	}

}