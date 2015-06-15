<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela SIRU.TB006_SACADO
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Sirh
 * @name        Urbs_Model_Siru_Sacado
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Model_Siru_Sacado extends Urbs_Model_Abstract
{
	protected $TB006_SEQ_SACADO;
	protected $TB006_NOME_SACADO;
	protected $TB006_ENDERECO_SACADO;
	protected $TB006_DOCUMENTO_SACADO;
	protected $TB006_CIDADE_SACAD0;
	protected $TB006_ESTADO_SACADO;
	protected $TB006_CEP_SACADO;
	protected $TB006_COD_SISTEMA_ORIGEM;

	public function setCep( $valor )
	{
		$this->TB006_CEP_SACADO = $valor;
		return $this;
	}

	public function getCep()
	{
		return $this->TB006_CEP_SACADO;
	}

	public function setCidade( $valor )
	{
		$this->TB006_CIDADE_SACAD0 = $valor;
		return $this;
	}

	public function getCidade()
	{
		return $this->TB006_CIDADE_SACAD0;
	}

	public function setCodSistemaOrigem( $valor )
	{
		$this->TB006_COD_SISTEMA_ORIGEM = $valor;
		return $this;
	}

	public function getCodSistemaOrigem()
	{
		return $this->TB006_COD_SISTEMA_ORIGEM;
	}

	public function setDocumento( $valor )
	{
		$this->TB006_DOCUMENTO_SACADO = $valor;
		return $this;
	}

	public function getDocumento()
	{
		return $this->TB006_DOCUMENTO_SACADO;
	}

	public function setEndereco( $valor )
	{
		$this->TB006_ENDERECO_SACADO = $valor;
		return $this;
	}

	public function getEndereco()
	{
		return $this->TB006_ENDERECO_SACADO;
	}

	public function setEstado( $valor )
	{
		$this->TB006_ESTADO_SACADO = $valor;
		return $this;
	}

	public function getEstado()
	{
		return $this->TB006_ESTADO_SACADO;
	}

	public function setNome( $valor )
	{
		$this->TB006_NOME_SACADO = $valor;
		return $this;
	}

	public function getNome()
	{
		return $this->TB006_NOME_SACADO;
	}

	public function setId( $valor )
	{
		$this->TB006_SEQ_SACADO = $valor;
		return $this;
	}

	public function getId()
	{
		return $this->TB006_SEQ_SACADO;
	}

}