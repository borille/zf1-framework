<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela SIRU.SIRU009_CC_LOT
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Siru
 * @name        Urbs_Model_Siru_CentroCusto
 * @copyright   Copyright (c) 2015 - URBS
 * @version     1.0
 */
class Urbs_Model_Siru_CentroCusto extends Urbs_Model_Abstract
{
	protected $SIRU009_ID;
	protected $SIRU009_EMPRESA_CC;
	protected $SIRU009_CENTRO_CUSTO;
	protected $SIRU009_COD_LOTACAO;
	protected $SIRU009_COD_AREA;
	protected $SIRU009_STATUS;

	/**
	 * @return mixed
	 */
	public function getCentroCusto()
	{
		return $this->SIRU009_CENTRO_CUSTO;
	}

	/**
	 * @param mixed $SIRU009_CENTRO_CUSTO
	 * @return $this
	 */
	public function setCentroCusto( $valor )
	{
		$this->SIRU009_CENTRO_CUSTO = $valor;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCodArea()
	{
		return $this->SIRU009_COD_AREA;
	}

	/**
	 * @param mixed $SIRU009_COD_AREA
	 * @return $this
	 */
	public function setCodArea( $valor )
	{
		$this->SIRU009_COD_AREA = $valor;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCodLotacao()
	{
		return $this->SIRU009_COD_LOTACAO;
	}

	/**
	 * @param mixed $SIRU009_COD_LOTACAO
	 * @return $this
	 */
	public function setCodLotacao( $valor )
	{
		$this->SIRU009_COD_LOTACAO = $valor;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEmpresaCentroCusto()
	{
		return $this->SIRU009_EMPRESA_CC;
	}

	/**
	 * @param mixed $SIRU009_EMPRESA_CC
	 * @return $this
	 */
	public function setEmpresaCentroCusto( $valor )
	{
		$this->SIRU009_EMPRESA_CC = $valor;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->SIRU009_ID;
	}

	/**
	 * @param mixed $SIRU009_ID
	 * @return $this
	 */
	public function setId( $valor )
	{
		$this->SIRU009_ID = $valor;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getStatus()
	{
		return $this->SIRU009_STATUS;
	}

	/**
	 * @param mixed $SIRU009_STATUS
	 * @return $this
	 */
	public function setStatus( $valor )
	{
		$this->SIRU009_STATUS = $valor;
		return $this;
	}


}