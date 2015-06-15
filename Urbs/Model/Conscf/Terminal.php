<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela CON_SCF.Empresa.php
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Conscf
 * @name        Urbs_Model_Conscf_Terminal
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

//TODO: renomear os getters/setters
class Urbs_Model_Conscf_Terminal extends Urbs_Model_Abstract
{
	protected $TB0316_COD_TERMINAL
	protected $TB0507_COD_PTO;
	protected $TB0316_NOME_TERMINAL;
	protected $TB0316_IND_STATUS;
	protected $TB0316_DATA_INAUGURACAO;
	protected $TB0200_COD_EMPRESA;
	protected $TB0514_COD_ABRANGENCIA;
	protected $TB0500_COD_TIPO_REMUNERACAO;
	protected $TB0501_COD_CATEGORIA_SERVICO;
	protected $TB0316_PASSAGEIROS_DIA;
	protected $TB0316_ENDERECO_REFERENCIAL;
	protected $TB0316_DATA_INICIO_OPER;
	protected $TB0316_DATA_FIM_OPER;
	protected $TB0316_HORA_INICIO_OPER;
	protected $TB0316_HORA_FIM_OPER;
	protected $TB0316_COD_URBS;

	public function setTB0200CODEMPRESA( $TB0200_COD_EMPRESA )
	{
		$this->TB0200_COD_EMPRESA = $TB0200_COD_EMPRESA;
		return $this;
	}

	public function getTB0200CODEMPRESA()
	{
		return $this->TB0200_COD_EMPRESA;
	}

	public function setTB0316CODTERMINAL( $TB0316_COD_TERMINAL )
	{
		$this->TB0316_COD_TERMINAL = $TB0316_COD_TERMINAL;
		return $this;
	}

	public function getTB0316CODTERMINAL()
	{
		return $this->TB0316_COD_TERMINAL;
	}
	public function setTB0316CODURBS( $TB0316_COD_URBS )
	{
		$this->TB0316_COD_URBS = $TB0316_COD_URBS;
		return $this;
	}

	public function getTB0316CODURBS()
	{
		return $this->TB0316_COD_URBS;
	}

	public function setTB0316DATAFIMOPER( $TB0316_DATA_FIM_OPER )
	{
		$this->TB0316_DATA_FIM_OPER = $TB0316_DATA_FIM_OPER;
		return $this;
	}

	public function getTB0316DATAFIMOPER()
	{
		return $this->TB0316_DATA_FIM_OPER;
	}

	public function setTB0316DATAINAUGURACAO( $TB0316_DATA_INAUGURACAO )
	{
		$this->TB0316_DATA_INAUGURACAO = $TB0316_DATA_INAUGURACAO;
		return $this;
	}

	public function getTB0316DATAINAUGURACAO()
	{
		return $this->TB0316_DATA_INAUGURACAO;
	}

	public function setTB0316DATAINICIOOPER( $TB0316_DATA_INICIO_OPER )
	{
		$this->TB0316_DATA_INICIO_OPER = $TB0316_DATA_INICIO_OPER;
		return $this;
	}

	public function getTB0316DATAINICIOOPER()
	{
		return $this->TB0316_DATA_INICIO_OPER;
	}

	public function setTB0316ENDERECOREFERENCIAL( $TB0316_ENDERECO_REFERENCIAL )
	{
		$this->TB0316_ENDERECO_REFERENCIAL = $TB0316_ENDERECO_REFERENCIAL;
		return $this;
	}

	public function getTB0316ENDERECOREFERENCIAL()
	{
		return $this->TB0316_ENDERECO_REFERENCIAL;
	}

	public function setTB0316HORAFIMOPER( $TB0316_HORA_FIM_OPER )
	{
		$this->TB0316_HORA_FIM_OPER = $TB0316_HORA_FIM_OPER;
		return $this;
	}

	public function getTB0316HORAFIMOPER()
	{
		return $this->TB0316_HORA_FIM_OPER;
	}

	public function setTB0316HORAINICIOOPER( $TB0316_HORA_INICIO_OPER )
	{
		$this->TB0316_HORA_INICIO_OPER = $TB0316_HORA_INICIO_OPER;
		return $this;
	}

	public function getTB0316HORAINICIOOPER()
	{
		return $this->TB0316_HORA_INICIO_OPER;
	}

	public function setTB0316INDSTATUS( $TB0316_IND_STATUS )
	{
		$this->TB0316_IND_STATUS = $TB0316_IND_STATUS;
		return $this;
	}

	public function getTB0316INDSTATUS()
	{
		return $this->TB0316_IND_STATUS;
	}
	public function setTB0316NOMETERMINAL( $TB0316_NOME_TERMINAL )
	{
		$this->TB0316_NOME_TERMINAL = $TB0316_NOME_TERMINAL;
		return $this;
	}

	public function getTB0316NOMETERMINAL()
	{
		return $this->TB0316_NOME_TERMINAL;
	}

	public function setTB0316PASSAGEIROSDIA( $TB0316_PASSAGEIROS_DIA )
	{
		$this->TB0316_PASSAGEIROS_DIA = $TB0316_PASSAGEIROS_DIA;
		return $this;
	}

	public function getTB0316PASSAGEIROSDIA()
	{
		return $this->TB0316_PASSAGEIROS_DIA;
	}

	public function setTB0500CODTIPOREMUNERACAO( $TB0500_COD_TIPO_REMUNERACAO )
	{
		$this->TB0500_COD_TIPO_REMUNERACAO = $TB0500_COD_TIPO_REMUNERACAO;
		return $this;
	}

	public function getTB0500CODTIPOREMUNERACAO()
	{
		return $this->TB0500_COD_TIPO_REMUNERACAO;
	}

	public function setTB0501CODCATEGORIASERVICO( $TB0501_COD_CATEGORIA_SERVICO )
	{
		$this->TB0501_COD_CATEGORIA_SERVICO = $TB0501_COD_CATEGORIA_SERVICO;
		return $this;
	}

	public function getTB0501CODCATEGORIASERVICO()
	{
		return $this->TB0501_COD_CATEGORIA_SERVICO;
	}

	public function setTB0507CODPTO( $TB0507_COD_PTO )
	{
		$this->TB0507_COD_PTO = $TB0507_COD_PTO;
		return $this;
	}

	public function getTB0507CODPTO()
	{
		return $this->TB0507_COD_PTO;
	}

	public function setTB0514CODABRANGENCIA( $TB0514_COD_ABRANGENCIA )
	{
		$this->TB0514_COD_ABRANGENCIA = $TB0514_COD_ABRANGENCIA;
		return $this;
	}

	public function getTB0514CODABRANGENCIA()
	{
		return $this->TB0514_COD_ABRANGENCIA;
	}

}