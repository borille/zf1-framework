<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela SCAD.TB002_PROJETO
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Scad
 * @name        Urbs_Model_Scad_Projeto
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Model_Scad_Projeto extends Urbs_Model_Abstract
{
	protected $TB002_ID;
	protected $TB002_NOME;
	protected $TB002_CAMINHO;
	protected $TB002_OBS;
	protected $TB002_SIGLA;

	public function setCaminho( $caminho )
	{
		$this->TB002_CAMINHO = $caminho;
		return $this;
	}

	public function getCaminho()
	{
		return $this->TB002_CAMINHO;
	}

	public function setNome( $nome )
	{
		$this->TB002_NOME = $nome;
		return $this;
	}

	public function getNome()
	{
		return $this->TB002_NOME;
	}

	public function setObservacao( $observacao )
	{
		$this->TB002_OBS = $observacao;
		return $this;
	}

	public function getObservacao()
	{
		return $this->TB002_OBS;
	}

	public function setId( $id )
	{
		$this->TB002_ID = $id;
		return $this;
	}

	public function getId()
	{
		return $this->TB002_ID;
	}

	public function setSigla( $sigla )
	{
		$this->TB002_SIGLA = $sigla;
		return $this;
	}

	public function getSigla()
	{
		return $this->TB002_SIGLA;
	}

}