<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa o endereço de uma pessoa
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Sirh_Pessoal
 * @name        Urbs_Model_Sirh_Pessoal_Endereco
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Model_Sirh_Pessoal_Endereco extends Urbs_Model_Abstract
{
	protected $SIRH_TB001_END_RUA;
	protected $SIRH_TB001_END_NUMERO;
	protected $SIRH_TB001_END_COMPL;
	protected $SIRH_TB001_END_CEP;
	protected $SIRH_TB001_END_CIDADE;
	protected $SIRH_TB001_END_UF;
	protected $SIRH_TB001_END_BAIRRO;

	public function setBairro( $bairro )
	{
		$this->SIRH_TB001_END_BAIRRO = $bairro;
		return $this;
	}

	public function getBairro()
	{
		return $this->SIRH_TB001_END_BAIRRO;
	}

	public function setCep( $cep )
	{
		$this->SIRH_TB001_END_CEP = $cep;
		return $this;
	}

	public function getCep()
	{
		return $this->SIRH_TB001_END_CEP;
	}

	public function setCidade( $cidade )
	{
		$this->SIRH_TB001_END_CIDADE = $cidade;
		return $this;
	}

	public function getCidade()
	{
		return $this->SIRH_TB001_END_CIDADE;
	}

	public function setComplemento( $complemento )
	{
		$this->SIRH_TB001_END_COMPL = $complemento;
		return $this;
	}

	public function getComplemento()
	{
		return $this->SIRH_TB001_END_COMPL;
	}

	public function setNumero( $numero )
	{
		$this->SIRH_TB001_END_NUMERO = $numero;
		return $this;
	}

	public function getNumero()
	{
		return $this->SIRH_TB001_END_NUMERO;
	}

	public function setRua( $rua )
	{
		$this->SIRH_TB001_END_RUA = $rua;
		return $this;
	}

	public function getRua()
	{
		return $this->SIRH_TB001_END_RUA;
	}

	public function setUf( $uf )
	{
		$this->SIRH_TB001_END_UF = $uf;
		return $this;
	}

	public function getUf()
	{
		return $this->SIRH_TB001_END_UF;
	}

	/**
	 * Retorna o endereço formatado
	 *
	 * @return string
	 */
	public function toString()
	{
		$string = $this->SIRH_TB001_END_RUA;
		$string .= ( $this->SIRH_TB001_END_NUMERO ) ? ', ' . $this->SIRH_TB001_END_NUMERO : '';
		$string .= ( $this->SIRH_TB001_END_COMPL ) ? ' - ' . $this->SIRH_TB001_END_COMPL : '';
		$string .= ( $this->SIRH_TB001_END_BAIRRO ) ? ' - ' . $this->SIRH_TB001_END_BAIRRO : '';
		$string .= ( $this->SIRH_TB001_END_BAIRRO ) ? ' - CEP: ' . $this->getCepMask() : '';
		$string .= ( $this->SIRH_TB001_END_CIDADE ) ? ' - ' . $this->SIRH_TB001_END_CIDADE : '';
		$string .= ( $this->SIRH_TB001_END_UF ) ? ' - ' . $this->SIRH_TB001_END_UF : '';

		return $string;
	}

	/**
	 * Retorna o CEP no formado 99999-999
	 * @return string
	 */
	public function getCepMask()
	{
		$cep = trim( $this->SIRH_TB001_END_CEP );
		return substr( $cep, 0, 5 ) . '-' . substr( $cep, 5, 3 );
	}

}