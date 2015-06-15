<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela SIRH.SIRH_TB002_LOTACAO_URBS
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Sirh
 * @name        Urbs_Model_Sirh_Lotacao
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Model_Sirh_Lotacao extends Urbs_Model_Abstract
{
	protected $SIRH_TB002_VERBA;
	protected $SIRH_TB002_DESC_VERBA;
	protected $SIRH_TB004_COD_GER;
	protected $SIRH_TB003_COD_DIR;
	protected $SIRH_TB002_SIGLA;
	protected $SIRH_TB002_DATA_EXTINCAO;

	/**
	 * @param $dataExtincao
	 * @return $this
	 */
	public function setDataExtincao( $dataExtincao )
	{
		$this->SIRH_TB002_DATA_EXTINCAO = $dataExtincao;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDataExtincao()
	{
		return $this->SIRH_TB002_DATA_EXTINCAO;
	}

	/**
	 * @param $descVerba
	 * @return $this
	 */
	public function setDescVerba( $descVerba )
	{
		$this->SIRH_TB002_DESC_VERBA = $descVerba;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDescVerba()
	{
		return $this->SIRH_TB002_DESC_VERBA;
	}

	public function setSigla( $sigla )
	{
		$this->SIRH_TB002_SIGLA = $sigla;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getSigla()
	{
		return $this->SIRH_TB002_SIGLA;
	}

	/**
	 * @param $codVerba
	 * @return $this
	 */
	public function setCodVerba( $codVerba )
	{
		$this->SIRH_TB002_VERBA = $codVerba;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCodVerba()
	{
		return $this->SIRH_TB002_VERBA;
	}

	/**
	 * @param $codDir
	 * @return $this
	 */
	public function setCodDir( $codDir )
	{
		$this->SIRH_TB003_COD_DIR = $codDir;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCodDir()
	{
		return $this->SIRH_TB003_COD_DIR;
	}

	/**
	 * @param $codGer
	 * @return $this
	 */
	public function setCodGer( $codGer )
	{
		$this->SIRH_TB004_COD_GER = $codGer;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCodGer()
	{
		return $this->SIRH_TB004_COD_GER;
	}

}