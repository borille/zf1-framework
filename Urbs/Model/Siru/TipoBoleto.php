<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela SIRU.TB003_TIPO_BOLETO
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Sirh
 * @name        Urbs_Model_Siru_TipoBoleto
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Model_Siru_TipoBoleto extends Urbs_Model_Abstract
{
	protected $TB003_SEQ_TIPO_BOLETO;
	protected $TB003_NOME_TIPO_BOLETO;
	protected $TB004_SEQ_CEDENTE;
	protected $AREA_SIRH_TB002_VERBA;
	protected $UNIDADE_SIRH_TB002_VERBA;
	protected $TB003_COBRAR_TARIFA;
	protected $TB003_ATIVO;
	protected $TB003_INSTRUCOES_BANCARIAS;
	protected $TB003_INSTRUCOES_CLIENTE;
	protected $TB003_DIAS_PRAZO_VENC;
	protected $TB003_VALOR;

	public function setVerbaArea( $valor )
	{
		$this->AREA_SIRH_TB002_VERBA = $valor;
		return $this;
	}

	public function getVerbaArea()
	{
		return $this->AREA_SIRH_TB002_VERBA;
	}

	public function setAtivo( $valor )
	{
		$this->TB003_ATIVO = $valor;
		return $this;
	}

	public function getAtivo()
	{
		return $this->TB003_ATIVO;
	}

	public function setCobrarTarifa( $valor )
	{
		$this->TB003_COBRAR_TARIFA = $valor;
		return $this;
	}

	public function getCobrarTarifa()
	{
		return $this->TB003_COBRAR_TARIFA;
	}

	public function setDiasPrazoVencimento( $valor )
	{
		$this->TB003_DIAS_PRAZO_VENC = $valor;
		return $this;
	}

	public function getDiasPrazoVencimento()
	{
		return $this->TB003_DIAS_PRAZO_VENC;
	}

	public function setInstrucoesBancarias( $valor )
	{
		$this->TB003_INSTRUCOES_BANCARIAS = $valor;
		return $this;
	}

	public function getInstrucoesBancarias()
	{
		return $this->TB003_INSTRUCOES_BANCARIAS;
	}

	public function setInstrucoesCliente( $valor )
	{
		$this->TB003_INSTRUCOES_CLIENTE = $valor;
		return $this;
	}

	public function getInstrucoesCliente()
	{
		return $this->TB003_INSTRUCOES_CLIENTE;
	}

	public function setNomeTipoBoleto( $valor )
	{
		$this->TB003_NOME_TIPO_BOLETO = $valor;
		return $this;
	}

	public function getNomeTipoBoleto()
	{
		return $this->TB003_NOME_TIPO_BOLETO;
	}

	public function setIdTipoBoleto( $valor )
	{
		$this->TB003_SEQ_TIPO_BOLETO = $valor;
		return $this;
	}

	public function getIdTipoBoleto()
	{
		return $this->TB003_SEQ_TIPO_BOLETO;
	}

	public function setValor( $valor )
	{
		$this->TB003_VALOR = $valor;
		return $this;
	}

	public function getValor()
	{
		return $this->TB003_VALOR;
	}

	public function setIdCedente( $valor )
	{
		$this->TB004_SEQ_CEDENTE = $valor;
		return $this;
	}

	public function getIdCedente()
	{
		return $this->TB004_SEQ_CEDENTE;
	}

	public function setVerbaUnidade( $valor )
	{
		$this->UNIDADE_SIRH_TB002_VERBA = $valor;
		return $this;
	}

	public function getVerbaUnidade()
	{
		return $this->UNIDADE_SIRH_TB002_VERBA;
	}

}