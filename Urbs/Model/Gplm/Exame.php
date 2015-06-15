<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da view SIRH.GPLM015_EXAME
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Gplm
 * @name        Urbs_Model_Gplm_Exame
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Model_Gplm_Exame extends Urbs_Model_Abstract
{
	protected $GPLM015_ID;
	protected $GPLM015_DTHR;
	protected $SIRH_TB001_MATRICULA_NUMERO;
	protected $SIRH_TB005_COD_EMPR_RH;
	protected $GPLM015_TIPO_REGISTRO;
	protected $GPLM016_ID;
	protected $GPLM015_OBS;
	protected $GPLM015_COMPARECIMENTO;
	protected $GPLM015_CREATE_TIME;
	protected $GPLM015_CREATE_OWNER;
	protected $GPLM015_CREATE_OWNER_EMP;

	public function setGPLM015ID( $GPLM015_ID )
	{
		$this->GPLM015_ID = $GPLM015_ID;
		return $this;
	}

	public function getGPLM015ID()
	{
		return $this->GPLM015_ID;
	}

	public function setGPLM015COMPARECIMENTO( $GPLM015_COMPARECIMENTO )
	{
		$this->GPLM015_COMPARECIMENTO = $GPLM015_COMPARECIMENTO;
		return $this;
	}

	public function getGPLM015COMPARECIMENTO()
	{
		return $this->GPLM015_COMPARECIMENTO;
	}

	public function setGPLM015CREATEOWNER( $GPLM015_CREATE_OWNER )
	{
		$this->GPLM015_CREATE_OWNER = $GPLM015_CREATE_OWNER;
		return $this;
	}

	public function getGPLM015CREATEOWNER()
	{
		return $this->GPLM015_CREATE_OWNER;
	}

	public function setGPLM015CREATEOWNEREMP( $GPLM015_CREATE_OWNER_EMP )
	{
		$this->GPLM015_CREATE_OWNER_EMP = $GPLM015_CREATE_OWNER_EMP;
		return $this;
	}

	public function getGPLM015CREATEOWNEREMP()
	{
		return $this->GPLM015_CREATE_OWNER_EMP;
	}

	public function setGPLM015CREATETIME( $GPLM015_CREATE_TIME )
	{
		$this->GPLM015_CREATE_TIME = $GPLM015_CREATE_TIME;
		return $this;
	}

	public function getGPLM015CREATETIME()
	{
		return $this->GPLM015_CREATE_TIME;
	}

	public function setGPLM015DTHR( $GPLM015_DTHR )
	{
		$this->GPLM015_DTHR = $GPLM015_DTHR;
		return $this;
	}

	public function getGPLM015DTHR()
	{
		return $this->GPLM015_DTHR;
	}

	public function setGPLM015OBS( $GPLM015_OBS )
	{
		$this->GPLM015_OBS = $GPLM015_OBS;
		return $this;
	}

	public function getGPLM015OBS()
	{
		return $this->GPLM015_OBS;
	}

	public function setGPLM015TIPOREGISTRO( $GPLM015_TIPO_REGISTRO )
	{
		$this->GPLM015_TIPO_REGISTRO = $GPLM015_TIPO_REGISTRO;
		return $this;
	}

	public function getGPLM015TIPOREGISTRO()
	{
		return $this->GPLM015_TIPO_REGISTRO;
	}

	public function setGPLM016ID( $GPLM016_ID )
	{
		$this->GPLM016_ID = $GPLM016_ID;
		return $this;
	}

	public function getGPLM016ID()
	{
		return $this->GPLM016_ID;
	}

	public function setSIRHTB001MATRICULANUMERO( $SIRH_TB001_MATRICULA_NUMERO )
	{
		$this->SIRH_TB001_MATRICULA_NUMERO = $SIRH_TB001_MATRICULA_NUMERO;
		return $this;
	}

	public function getSIRHTB001MATRICULANUMERO()
	{
		return $this->SIRH_TB001_MATRICULA_NUMERO;
	}

	public function setSIRHTB005CODEMPRRH( $SIRH_TB005_COD_EMPR_RH )
	{
		$this->SIRH_TB005_COD_EMPR_RH = $SIRH_TB005_COD_EMPR_RH;
		return $this;
	}

	public function getSIRHTB005CODEMPRRH()
	{
		return $this->SIRH_TB005_COD_EMPR_RH;
	}

}