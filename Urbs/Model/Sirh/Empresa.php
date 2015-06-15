<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da view SIRH.SIRH_TB005_EMPRESA_RH
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Sirh
 * @name        Urbs_Model_Sirh_Empresa
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Model_Sirh_Empresa extends Urbs_Model_Abstract
{
	protected $SIRH_TB005_COD_EMPR_RH;
	protected $SIRH_TB005_DESC_EMPR_RH;

	public function setCodigoEmpresa( $codigoEmpresa )
	{
		$this->SIRH_TB005_COD_EMPR_RH = $codigoEmpresa;
		return $this;
	}

	public function getCodigoEmpresa()
	{
		return $this->SIRH_TB005_COD_EMPR_RH;
	}

	public function setDescricaoEmpresa( $descricaoEmpresa )
	{
		$this->SIRH_TB005_DESC_EMPR_RH = $descricaoEmpresa;
		return $this;
	}

	public function getDescricaoEmpresa()
	{
		return $this->SIRH_TB005_DESC_EMPR_RH;
	}
}