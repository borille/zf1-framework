<?php

require_once 'Urbs/Db/Table/Conscf.php';

/**
 * Classe Db table que acessa a tabela CON_SCF.TB0501_CATEGORIA_SERVICO
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Conscf
 * @name        Urbs_Db_Table_Conscf_CategoriaServico
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Conscf_CategoriaServico extends Urbs_Db_Table_Conscf
{

	public function init()
	{
		parent::configDbTable( 'CON_SCF', 'TB0501_CATEGORIA_SERVICO', 'TB0501_COD_CATEGORIA_SERVICO' );
	}

	public function getCategoriasServicoByNome()
	{
		return $this->returnFromGlobalCache( 'conscf_categorias_servico_by_nome', 'getCategoriasServicoByNomeCache' );
	}

	public function getCategoriasServicoByNomeCache()
	{
		return $this->listAll( '*', null, 'TB0501_NOME_CATEGORIA_SERVICO' );
	}

}