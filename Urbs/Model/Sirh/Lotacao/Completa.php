<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa a lotacao completa
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Sirh_Lotacao
 * @name        Urbs_Model_Sirh_Lotacao_Completa
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Model_Sirh_Lotacao_Completa extends Urbs_Model_Abstract
{
	protected $SIRH_TB002_VERBA;
	protected $SIRH_TB002_DESC_VERBA;
	protected $SIRH_TB002_SIGLA;
	protected $SIRH_TB004_COD_GER;
	protected $SIRH_TB004_DESC_GER;
	protected $SIRH_TB004_SIGLA;
	protected $SIRH_TB003_COD_DIR;
	protected $SIRH_TB002_DATA_EXTINCAO;

	public function setDescricaoVerba( $descricaoVerba )
	{
		$this->SIRH_TB002_DESC_VERBA = $descricaoVerba;
		return $this;
	}

	public function getDescricaoVerba()
	{
		return $this->SIRH_TB002_DESC_VERBA;
	}

	public function setSiglaVerba( $siglaVerba )
	{
		$this->SIRH_TB002_SIGLA = $siglaVerba;
		return $this;
	}

	public function getSiglaVerba()
	{
		return $this->SIRH_TB002_SIGLA;
	}

	public function setCodigoVerba( $codigoVerba )
	{
		$this->SIRH_TB002_VERBA = $codigoVerba;
		return $this;
	}

	public function getCodigoVerba()
	{
		return $this->SIRH_TB002_VERBA;
	}

	public function setCodigoDiretoria( $codigoDiretoria )
	{
		$this->SIRH_TB003_COD_DIR = $codigoDiretoria;
		return $this;
	}

	public function getCodigoDiretoria()
	{
		return $this->SIRH_TB003_COD_DIR;
	}

	public function setCodigoGerencia( $codigoGerencia )
	{
		$this->SIRH_TB004_COD_GER = $codigoGerencia;
		return $this;
	}

	public function getCodigoGerencia()
	{
		return $this->SIRH_TB004_COD_GER;
	}

	public function setDescricaoGerencia( $descricaoGerencia )
	{
		$this->SIRH_TB004_DESC_GER = $descricaoGerencia;
		return $this;
	}

	public function getDescricaoGerencia()
	{
		return $this->SIRH_TB004_DESC_GER;
	}

	public function setSiglaGerencia( $siglaGerencia )
	{
		$this->SIRH_TB004_SIGLA = $siglaGerencia;
		return $this;
	}

	public function getSiglaGerencia()
	{
		return $this->SIRH_TB004_SIGLA;
	}

	public function setDataExtincao( $dataExtincao )
	{
		$this->SIRH_TB002_DATA_EXTINCAO = $dataExtincao;
	}

	public function getDataExtincao()
	{
		return $this->SIRH_TB002_DATA_EXTINCAO;
	}

}