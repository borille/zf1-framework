<?php

require_once 'Urbs/Db/Table/Conscf.php';

/**
 * Classe Db table que acessa a tabela CON_SCF.TB0200_EMPRESA
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Conscf
 * @name        Urbs_Db_Table_Conscf_Empresa
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Conscf_Empresa extends Urbs_Db_Table_Conscf
{

	public function init()
	{
		parent::configDbTable( 'CON_SCF', 'TB0200_EMPRESA', 'TB0200_COD_EMPRESA' );
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
	 * @param $id
	 * @return string
	 */
	public function getRazaoSocialEmpresa( $id )
	{
		return $this->getRowValue( $id, 'TB0200_NOME_RAZAO_SOCIAL' );
	}

	/**
	 * @param $id
	 * @return string
	 */
	public function getNomeFantasiaEmpresa( $id )
	{
		return $this->getRowValue( $id, 'TB0200_NOME_FANTASIA' );
	}

	/**
	 * @param $id
	 * @return string
	 */
	public function getEmailEmpresa( $id )
	{
		return $this->getRowValue( $id, 'TB0200_DESC_EMAIL' );
	}

	/**
	 * @return array
	 */
	public function getEmpresasByCodigo()
	{
		return $this->returnFromGlobalCache( 'conscf_empresasByCodigo', 'getEmpresasByCodigoCache' );
	}

	public function getEmpresasByCodigoCache()
	{
		return $this->listAll( '*', null, 'TB0200_COD_EMPRESA' );
	}

	/**
	 * @return array
	 */
	public function getEmpresasByNomeFantasia()
	{
		return $this->returnFromGlobalCache( 'conscf_empresasByNomeFantasia', 'getEmpresasByNomeFantasiaCache' );
	}

	public function getEmpresasByNomeFantasiaCache()
	{
		return $this->listAll( '*', null, 'TB0200_NOME_FANTASIA' );
	}

	public function getEmpresasConsorcioByNomeFantasia( $id )
	{
		return $this->listAll( '*', array( 'TB0206_COD_CONSORCIO = ?' => $id ), 'TB0200_NOME_FANTASIA' );
	}

}