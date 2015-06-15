<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela CON_SCF.TB0200_EMPRESA
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Conscf
 * @name        Urbs_Model_Conscf_Empresa
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

//TODO: renomear os getters/setters
class Urbs_Model_Conscf_Empresa extends Urbs_Model_Abstract
{
	protected $TB0200_COD_EMPRESA;
	protected $TB0200_NOME_RAZAO_SOCIAL;
	protected $TB0200_NOME_FANTASIA;
	protected $TB0200_NUM_INSCRICAO_ESTADUAL;
	protected $TB0200_NUM_INSCRICAO_MUNICIPAL;
	protected $TB0200_NUM_TELEFONE;
	protected $TB0200_DESC_EMAIL;
	protected $TB0200_CNPJ;
	protected $TB0907_COD_TIPO_SISTEMA;
	protected $TB0204_COD_TIPO_ABRANGENCIA;
	protected $TB0205_COD_TIPO_INTEGRACAO;
	protected $TB0206_COD_CONSORCIO;
	protected $TB0200_SENHA;
	protected $TB0200_EMAIL;

	public function setTB0200CNPJ( $TB0200_CNPJ )
	{
		$this->TB0200_CNPJ = $TB0200_CNPJ;
		return $this;
	}

	public function getTB0200CNPJ()
	{
		return $this->TB0200_CNPJ;
	}

	public function setTB0200DESCEMAIL( $TB0200_DESC_EMAIL )
	{
		$this->TB0200_DESC_EMAIL = $TB0200_DESC_EMAIL;
		return $this;
	}

	public function getTB0200DESCEMAIL()
	{
		return $this->TB0200_DESC_EMAIL;
	}

	public function setTB0200EMAIL( $TB0200_EMAIL )
	{
		$this->TB0200_EMAIL = $TB0200_EMAIL;
		return $this;
	}

	public function getTB0200EMAIL()
	{
		return $this->TB0200_EMAIL;
	}

	public function setTB0200CODEMPRESA( $TB0200_COD_EMPRESA )
	{
		$this->TB0200_COD_EMPRESA = $TB0200_COD_EMPRESA;
		return $this;
	}

	public function getTB0200CODEMPRESA()
	{
		return $this->TB0200_COD_EMPRESA;
	}

	public function setTB0200NOMEFANTASIA( $TB0200_NOME_FANTASIA )
	{
		$this->TB0200_NOME_FANTASIA = $TB0200_NOME_FANTASIA;
		return $this;
	}

	public function getTB0200NOMEFANTASIA()
	{
		return $this->TB0200_NOME_FANTASIA;
	}

	public function setTB0200NOMERAZAOSOCIAL( $TB0200_NOME_RAZAO_SOCIAL )
	{
		$this->TB0200_NOME_RAZAO_SOCIAL = $TB0200_NOME_RAZAO_SOCIAL;
		return $this;
	}

	public function getTB0200NOMERAZAOSOCIAL()
	{
		return $this->TB0200_NOME_RAZAO_SOCIAL;
	}

	public function setTB0200NUMINSCRICAOESTADUAL( $TB0200_NUM_INSCRICAO_ESTADUAL )
	{
		$this->TB0200_NUM_INSCRICAO_ESTADUAL = $TB0200_NUM_INSCRICAO_ESTADUAL;
		return $this;
	}

	public function getTB0200NUMINSCRICAOESTADUAL()
	{
		return $this->TB0200_NUM_INSCRICAO_ESTADUAL;
	}

	public function setTB0200NUMINSCRICAOMUNICIPAL( $TB0200_NUM_INSCRICAO_MUNICIPAL )
	{
		$this->TB0200_NUM_INSCRICAO_MUNICIPAL = $TB0200_NUM_INSCRICAO_MUNICIPAL;
		return $this;
	}

	public function getTB0200NUMINSCRICAOMUNICIPAL()
	{
		return $this->TB0200_NUM_INSCRICAO_MUNICIPAL;
	}

	public function setTB0200NUMTELEFONE( $TB0200_NUM_TELEFONE )
	{
		$this->TB0200_NUM_TELEFONE = $TB0200_NUM_TELEFONE;
		return $this;
	}

	public function getTB0200NUMTELEFONE()
	{
		return $this->TB0200_NUM_TELEFONE;
	}

	public function setTB0200SENHA( $TB0200_SENHA )
	{
		$this->TB0200_SENHA = $TB0200_SENHA;
		return $this;
	}

	public function getTB0200SENHA()
	{
		return $this->TB0200_SENHA;
	}

	public function setTB0204CODTIPOABRANGENCIA( $TB0204_COD_TIPO_ABRANGENCIA )
	{
		$this->TB0204_COD_TIPO_ABRANGENCIA = $TB0204_COD_TIPO_ABRANGENCIA;
		return $this;
	}

	public function getTB0204CODTIPOABRANGENCIA()
	{
		return $this->TB0204_COD_TIPO_ABRANGENCIA;
	}

	public function setTB0205CODTIPOINTEGRACAO( $TB0205_COD_TIPO_INTEGRACAO )
	{
		$this->TB0205_COD_TIPO_INTEGRACAO = $TB0205_COD_TIPO_INTEGRACAO;
		return $this;
	}

	public function getTB0205CODTIPOINTEGRACAO()
	{
		return $this->TB0205_COD_TIPO_INTEGRACAO;
	}

	public function setTB0206CODCONSORCIO( $TB0206_COD_CONSORCIO )
	{
		$this->TB0206_COD_CONSORCIO = $TB0206_COD_CONSORCIO;
		return $this;
	}

	public function getTB0206CODCONSORCIO()
	{
		return $this->TB0206_COD_CONSORCIO;
	}

	public function setTB0907CODTIPOSISTEMA( $TB0907_COD_TIPO_SISTEMA )
	{
		$this->TB0907_COD_TIPO_SISTEMA = $TB0907_COD_TIPO_SISTEMA;
		return $this;
	}

	public function getTB0907CODTIPOSISTEMA()
	{
		return $this->TB0907_COD_TIPO_SISTEMA;
	}

	public function getCodEmpresa()
	{
		return $this->getTB0200CODEMPRESA();
	}

	public function getNomeEmpresa()
	{
		return $this->getTB0200NOMEFANTASIA();
	}
}