<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da view SIRH.VW_LOGIN
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Sirh
 * @name        Urbs_Model_Sirh_Login
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Model_Sirh_Login extends Urbs_Model_Abstract
{
	protected $MATRICULA;
	protected $MATRICULA_DIGITO;
	protected $EMPRESA;
	protected $NOME;
	protected $SENHA;
	protected $CARGO;
	protected $SIGLA_UNIDADE;
	protected $UNIDADE;
	protected $SIGLA_AREA;
	protected $COD_AREA;
	protected $AREA;
	protected $MATRICULA_TOTAL;
	protected $LOTACAO;
	protected $COD_LOTACAO;
	protected $GENERO;
	protected $EMAIL;
	protected $DATA_MUD_SENHA;
	protected $DESC_EMPRESA;
	protected $COD_DIRETORIA;
	protected $DIRETORIA;

	public function setArea( $area )
	{
		$this->AREA = $area;
		return $this;
	}

	public function getArea()
	{
		return $this->AREA;
	}

	public function setCargo( $cargo )
	{
		$this->CARGO = $cargo;
		return $this;
	}

	public function getCargo()
	{
		return $this->CARGO;
	}

	public function setCodArea( $codArea )
	{
		$this->COD_AREA = $codArea;
		return $this;
	}

	public function getCodArea()
	{
		return $this->COD_AREA;
	}

	public function setCodDiretoria( $codDiretoria )
	{
		$this->COD_DIRETORIA = $codDiretoria;
		return $this;
	}

	public function getCodDiretoria()
	{
		return $this->COD_DIRETORIA;
	}

	public function setCodLotacao( $codLotacao )
	{
		$this->COD_LOTACAO = $codLotacao;
		return $this;
	}

	public function getCodLotacao()
	{
		return $this->COD_LOTACAO;
	}

	public function setDataMudaSenha( $dataMudaSenha )
	{
		$this->DATA_MUD_SENHA = $dataMudaSenha;
		return $this;
	}

	public function getDataMudaSenha()
	{
		return $this->DATA_MUD_SENHA;
	}

	public function setDescEmpresa( $descEmpresa )
	{
		$this->DESC_EMPRESA = $descEmpresa;
		return $this;
	}

	public function getDescEmpresa()
	{
		return $this->DESC_EMPRESA;
	}

	public function setDiretoria( $diretoria )
	{
		$this->DIRETORIA = $diretoria;
		return $this;
	}

	public function getDiretoria()
	{
		return $this->DIRETORIA;
	}

	public function setEmail( $email )
	{
		$this->EMAIL = $email;
		return $this;
	}

	public function getEmail()
	{
		return $this->EMAIL;
	}

	public function setEmpresa( $empresa )
	{
		$this->EMPRESA = $empresa;
		return $this;
	}

	public function getEmpresa()
	{
		return $this->EMPRESA;
	}

	public function setGenero( $genero )
	{
		$this->GENERO = $genero;
		return $this;
	}

	public function getGenero()
	{
		return $this->GENERO;
	}

	public function setLotacao( $lotacao )
	{
		$this->LOTACAO = $lotacao;
		return $this;
	}

	public function getLotacao()
	{
		return $this->LOTACAO;
	}

	public function setMatricula( $matricula )
	{
		$this->MATRICULA = $matricula;
		return $this;
	}

	public function getMatricula()
	{
		return $this->MATRICULA;
	}

	public function setMatriculaDigito( $matriculaDigito )
	{
		$this->MATRICULA_DIGITO = $matriculaDigito;
		return $this;
	}

	public function getMatriculaDigito()
	{
		return $this->MATRICULA_DIGITO;
	}

	public function setMatriculaTotal( $matriculaTotal )
	{
		$this->MATRICULA_TOTAL = $matriculaTotal;
		return $this;
	}

	public function getMatriculaTotal()
	{
		return $this->MATRICULA_TOTAL;
	}

	public function setNome( $nome )
	{
		$this->NOME = $nome;
		return $this;
	}

	public function getNome()
	{
		return $this->NOME;
	}

	public function setSenha( $senha )
	{
		$this->SENHA = $senha;
		return $this;
	}

	public function getSenha()
	{
		return $this->SENHA;
	}

	public function setSiglaArea( $siglaArea )
	{
		$this->SIGLA_AREA = $siglaArea;
		return $this;
	}

	public function getSiglaArea()
	{
		return $this->SIGLA_AREA;
	}

	public function setSiglaUnidade( $siglaUnidade )
	{
		$this->SIGLA_UNIDADE = $siglaUnidade;
		return $this;
	}

	public function getSiglaUnidade()
	{
		return $this->SIGLA_UNIDADE;
	}

	public function setUnidade( $unidade )
	{
		$this->UNIDADE = $unidade;
		return $this;
	}

	public function getUnidade()
	{
		return $this->UNIDADE;
	}

	public function getPrimeiroNome()
	{
		$arr = explode( ' ', trim( $this->NOME ) );
		return $arr[0];
	}

}