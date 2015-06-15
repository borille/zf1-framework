<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela SIRU.TB001_BOLETO_URBS
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Sirh
 * @name        Urbs_Model_Siru_Boleto
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Model_Siru_Boleto extends Urbs_Model_Abstract
{
	protected $TB001_SEQ_BOLETO;
	protected $TB006_SEQ_SACADO;
	protected $TB003_SEQ_TIPO_BOLETO;
	protected $TB001_DATA_EMISSAO;
	protected $TB001_VALOR_BOLETO;
	protected $TB001_DATA_VENCIMENTO;
	protected $TB001_VALOR_PAGO;
	protected $TB001_DATA_PAGTO;
	protected $TB001_DATA_BAIXA;
	protected $TB001_TIPO_BAIXA;
	protected $SCAD01_COD_SISTEMA;
	protected $TB001_CHAVE_IDENTIFICACAO;
	protected $TB001_VALOR;
	protected $TB007_SEQ_TARIFA;
	protected $TB001_MULTA;
	protected $TB001_NOSSO_NUMERO;
	protected $TB001_DESCRICAO_ITENS;
	protected $TB001_CENTROCUSTO;
	protected $TB001_EMP_CC;

	public function setCodigoSistema( $codigo )
	{
		$this->SCAD01_COD_SISTEMA = $codigo;
		return $this;
	}

	public function getCodigoSistema()
	{
		return $this->SCAD01_COD_SISTEMA;
	}

	public function setChaveIdentificacao( $valor )
	{
		$this->TB001_CHAVE_IDENTIFICACAO = $valor;
		return $this;
	}

	public function getChaveIdentificacao()
	{
		return $this->TB001_CHAVE_IDENTIFICACAO;
	}

	public function setDataBaixa( $valor )
	{
		$this->TB001_DATA_BAIXA = $valor;
		return $this;
	}

	public function getDataBaixa()
	{
		return $this->TB001_DATA_BAIXA;
	}

	public function setDataEmissao( $valor )
	{
		$this->TB001_DATA_EMISSAO = $valor;
		return $this;
	}

	public function getDataEmissao()
	{
		return $this->TB001_DATA_EMISSAO;
	}

	public function setDataPagamento( $valor )
	{
		$this->TB001_DATA_PAGTO = $valor;
		return $this;
	}

	public function getDataPagamento()
	{
		return $this->TB001_DATA_PAGTO;
	}

	public function setDataVencimento( $valor )
	{
		$this->TB001_DATA_VENCIMENTO = $valor;
		return $this;
	}

	public function getDataVencimento()
	{
		return $this->TB001_DATA_VENCIMENTO;
	}

	public function setDescricaoItens( $valor )
	{
		$this->TB001_DESCRICAO_ITENS = $valor;
		return $this;
	}

	public function getDescricaoItens()
	{
		return $this->TB001_DESCRICAO_ITENS;
	}

	public function setMulta( $valor )
	{
		$this->TB001_MULTA = $valor;
		return $this;
	}

	public function getMulta()
	{
		return $this->TB001_MULTA;
	}

	public function setNossoNumero( $valor )
	{
		$this->TB001_NOSSO_NUMERO = $valor;
		return $this;
	}

	public function getNossoNumero()
	{
		return $this->TB001_NOSSO_NUMERO;
	}

	public function setIdBoleto( $valor )
	{
		$this->TB001_SEQ_BOLETO = $valor;
		return $this;
	}

	public function getIdBoleto()
	{
		return $this->TB001_SEQ_BOLETO;
	}

	public function setTipoBaixa( $valor )
	{
		$this->TB001_TIPO_BAIXA = $valor;
		return $this;
	}

	public function getTipoBaixa()
	{
		return $this->TB001_TIPO_BAIXA;
	}

	public function setValor( $valor )
	{
		$this->TB001_VALOR = $valor;
		return $this;
	}

	public function getValor()
	{
		return $this->TB001_VALOR;
	}

	public function setValorBoleto( $valor )
	{
		$this->TB001_VALOR_BOLETO = $valor;
		return $this;
	}

	public function getValorBoleto()
	{
		return $this->TB001_VALOR_BOLETO;
	}

	public function setValorPago( $valor )
	{
		$this->TB001_VALOR_PAGO = $valor;
		return $this;
	}

	public function getValorPago()
	{
		return $this->TB001_VALOR_PAGO;
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

	public function setIdSacado( $valor )
	{
		$this->TB006_SEQ_SACADO = $valor;
		return $this;
	}

	public function getIdSacado()
	{
		return $this->TB006_SEQ_SACADO;
	}

	public function setIdTarifa( $valor )
	{
		$this->TB007_SEQ_TARIFA = $valor;
		return $this;
	}

	public function getIdTarifa()
	{
		return $this->TB007_SEQ_TARIFA;
	}

	public function getCentroCusto()
	{
		return $this->TB001_CENTROCUSTO;
	}

	public function setCentroCusto( $valor )
	{
		$this->TB001_CENTROCUSTO = $valor;
		return $this;
	}

	public function getEmpresaCentroCusto()
	{
		return $this->TB001_EMP_CC;
	}

	public function setEmpresaCentroCusto( $valor )
	{
		$this->TB001_EMP_CC = $valor;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isValid()
	{
		if ( strlen( $this->TB001_NOSSO_NUMERO ) != 17 ) {
			return false;
		}

		return true;
	}

}