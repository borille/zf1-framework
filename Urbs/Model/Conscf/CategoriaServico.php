<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela CON_SCF.TB0501_CATEGORIA_SERVICO
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Conscf
 * @name        Urbs_Model_Conscf_CategoriaServico
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

//TODO: renomear os getters/setters
class Urbs_Model_Conscf_CategoriaServico extends Urbs_Model_Abstract
{
	protected $TB0501_COD_CATEGORIA_SERVICO;
	protected $TB0501_NOME_CATEGORIA_SERVICO;
	protected $TB0501_SIGLA_CATEGORIA;
	protected $TB0501_INDX_PASS_TOTAL;
	protected $TB0501_IND_SISTEMA_PRINCIPAL;
	protected $TB0501_IND_SISTEMA_RIT;
	protected $TB0501_ORDEM_IMP;

	public function setTB0501CODCATEGORIASERVICO( $TB0501_COD_CATEGORIA_SERVICO )
	{
		$this->TB0501_COD_CATEGORIA_SERVICO = $TB0501_COD_CATEGORIA_SERVICO;
		return $this;
	}

	public function getTB0501CODCATEGORIASERVICO()
	{
		return $this->TB0501_COD_CATEGORIA_SERVICO;
	}

	public function setTB0501INDXPASSTOTAL( $TB0501_INDX_PASS_TOTAL )
	{
		$this->TB0501_INDX_PASS_TOTAL = $TB0501_INDX_PASS_TOTAL;
		return $this;
	}

	public function getTB0501INDXPASSTOTAL()
	{
		return $this->TB0501_INDX_PASS_TOTAL;
	}

	public function setTB0501INDSISTEMAPRINCIPAL( $TB0501_IND_SISTEMA_PRINCIPAL )
	{
		$this->TB0501_IND_SISTEMA_PRINCIPAL = $TB0501_IND_SISTEMA_PRINCIPAL;
		return $this;
	}

	public function getTB0501INDSISTEMAPRINCIPAL()
	{
		return $this->TB0501_IND_SISTEMA_PRINCIPAL;
	}

	public function setTB0501INDSISTEMARIT( $TB0501_IND_SISTEMA_RIT )
	{
		$this->TB0501_IND_SISTEMA_RIT = $TB0501_IND_SISTEMA_RIT;
		return $this;
	}

	public function getTB0501INDSISTEMARIT()
	{
		return $this->TB0501_IND_SISTEMA_RIT;
	}

	public function setTB0501NOMECATEGORIASERVICO( $TB0501_NOME_CATEGORIA_SERVICO )
	{
		$this->TB0501_NOME_CATEGORIA_SERVICO = $TB0501_NOME_CATEGORIA_SERVICO;
		return $this;
	}

	public function getTB0501NOMECATEGORIASERVICO()
	{
		return $this->TB0501_NOME_CATEGORIA_SERVICO;
	}

	public function setTB0501ORDEMIMP( $TB0501_ORDEM_IMP )
	{
		$this->TB0501_ORDEM_IMP = $TB0501_ORDEM_IMP;
		return $this;
	}

	public function getTB0501ORDEMIMP()
	{
		return $this->TB0501_ORDEM_IMP;
	}

	public function setTB0501SIGLACATEGORIA( $TB0501_SIGLA_CATEGORIA )
	{
		$this->TB0501_SIGLA_CATEGORIA = $TB0501_SIGLA_CATEGORIA;
		return $this;
	}

	public function getTB0501SIGLACATEGORIA()
	{
		return $this->TB0501_SIGLA_CATEGORIA;
	}

}