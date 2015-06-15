<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela SCAD.TB001_PERMISSAO
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Scad
 * @name        Urbs_Model_Scad_Permissao
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Model_Scad_Projeto extends Urbs_Model_Abstract
{
	protected $TB001_MATRICULA;
	protected $TB001_EMPRESA;
	protected $TB002_ID;
	protected $TB001_ACESSO;

	public function setId( $id )
	{
		$this->TB002_ID = $id;
		return $this;
	}

	public function getId()
	{
		return $this->TB002_ID;
	}

	public function setAcesso( $acesso )
	{
		$this->TB001_ACESSO = $acesso;
		return $this;
	}

	public function getAcesso()
	{
		return $this->TB001_ACESSO;
	}

	public function setEmpresa( $empresa )
	{
		$this->TB001_EMPRESA = $empresa;
		return $this;
	}

	public function getEmpresa()
	{
		return $this->TB001_EMPRESA;
	}

	public function setMatricula( $matricula )
	{
		$this->TB001_MATRICULA = $matricula;
		return $this;
	}

	public function getMatricula()
	{
		return $this->TB001_MATRICULA;
	}

}