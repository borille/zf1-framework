<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela FORPONTO.PMTVFPTO
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Forponto
 * @name        Urbs_Model_Forponto_MotivoOcorrencias
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Model_Forponto_MotivoOcorrencias extends Urbs_Model_Abstract
{
	protected $DFMTVCODIGO;
	protected $DFMTVDESCRICAO;

	public function setCodigo( $value )
	{
		$this->DFMTVCODIGO = $value;
		return $this;
	}

	public function getCodigo()
	{
		return $this->DFMTVCODIGO;
	}

	public function setDescricao( $value )
	{
		$this->DFMTVDESCRICAO = $value;
		return $this;
	}

	public function getDescricao()
	{
		return $this->DFMTVDESCRICAO;
	}

}