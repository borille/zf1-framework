<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela CON_SCF.TB0317_ESTACAO_TUBO
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Conscf
 * @name        Urbs_Model_Conscf_EstacaoTubo
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */

//TODO: renomear os getters/setters
class Urbs_Model_Conscf_EstacaoTubo extends Urbs_Model_Abstract
{
	protected $TB0317_COD_ESTACAO_TUBO;
	protected $TB0317_NOME_ESTACAO_TUBO;
	protected $TB0507_COD_PTO;
	protected $TB0317_IND_STATUS;
	protected $TB0200_COD_EMPRESA;
	protected $TB0318_COD_MODELO_ESTACAO_TUBO;
	protected $TB0514_COD_ABRANGENCIA;
	protected $TB0317_DATA_INSTALACAO;
	protected $TB0500_COD_TIPO_REMUNERACAO;
	protected $TB0501_COD_CATEGORIA_SERVICO;
	protected $TB0317_PASSAGEIROS_DIA;
	protected $TB0317_ENDERECO_REFERENCIAL;
	protected $TB0317_DATA_INICIO_OPER;
	protected $TB0317_DATA_FIM_OPER;
	protected $TB0317_HORA_INICIO_OPER;
	protected $TB0317_HORA_FIM_OPER;
	protected $TB0317_COD_URBS;
	protected $TB0317_HORA_INI_SAB;
	protected $TB0317_HORA_FIM_SAB;
	protected $TB0317_HORA_INI_DOM;
	protected $TB0317_HORA_FIM_DOM;
	protected $TB0317_CARTAO;

	public function setTB0200CODEMPRESA( $TB0200_COD_EMPRESA )
	{
		$this->TB0200_COD_EMPRESA = $TB0200_COD_EMPRESA;
		return $this;
	}

	public function getTB0200CODEMPRESA()
	{
		return $this->TB0200_COD_EMPRESA;
	}

	public function setTB0317CARTAO( $TB0317_CARTAO )
	{
		$this->TB0317_CARTAO = $TB0317_CARTAO;
		return $this;
	}

	public function getTB0317CARTAO()
	{
		return $this->TB0317_CARTAO;
	}

	public function setTB0317CODESTACAOTUBO( $TB0317_COD_ESTACAO_TUBO )
	{
		$this->TB0317_COD_ESTACAO_TUBO = $TB0317_COD_ESTACAO_TUBO;
		return $this;
	}

	public function getTB0317CODESTACAOTUBO()
	{
		return $this->TB0317_COD_ESTACAO_TUBO;
	}

	public function setTB0317CODURBS( $TB0317_COD_URBS )
	{
		$this->TB0317_COD_URBS = $TB0317_COD_URBS;
		return $this;
	}

	public function getTB0317CODURBS()
	{
		return $this->TB0317_COD_URBS;
	}

	public function setTB0317DATAFIMOPER( $TB0317_DATA_FIM_OPER )
	{
		$this->TB0317_DATA_FIM_OPER = $TB0317_DATA_FIM_OPER;
		return $this;
	}

	public function getTB0317DATAFIMOPER()
	{
		return $this->TB0317_DATA_FIM_OPER;
	}

	public function setTB0317DATAINICIOOPER( $TB0317_DATA_INICIO_OPER )
	{
		$this->TB0317_DATA_INICIO_OPER = $TB0317_DATA_INICIO_OPER;
		return $this;
	}

	public function getTB0317DATAINICIOOPER()
	{
		return $this->TB0317_DATA_INICIO_OPER;
	}

	public function setTB0317DATAINSTALACAO( $TB0317_DATA_INSTALACAO )
	{
		$this->TB0317_DATA_INSTALACAO = $TB0317_DATA_INSTALACAO;
		return $this;
	}

	public function getTB0317DATAINSTALACAO()
	{
		return $this->TB0317_DATA_INSTALACAO;
	}

	public function setTB0317ENDERECOREFERENCIAL( $TB0317_ENDERECO_REFERENCIAL )
	{
		$this->TB0317_ENDERECO_REFERENCIAL = $TB0317_ENDERECO_REFERENCIAL;
		return $this;
	}

	public function getTB0317ENDERECOREFERENCIAL()
	{
		return $this->TB0317_ENDERECO_REFERENCIAL;
	}

	public function setTB0317HORAFIMDOM( $TB0317_HORA_FIM_DOM )
	{
		$this->TB0317_HORA_FIM_DOM = $TB0317_HORA_FIM_DOM;
		return $this;
	}

	public function getTB0317HORAFIMDOM()
	{
		return $this->TB0317_HORA_FIM_DOM;
	}

	public function setTB0317HORAFIMOPER( $TB0317_HORA_FIM_OPER )
	{
		$this->TB0317_HORA_FIM_OPER = $TB0317_HORA_FIM_OPER;
		return $this;
	}

	public function getTB0317HORAFIMOPER()
	{
		return $this->TB0317_HORA_FIM_OPER;
	}

	public function setTB0317HORAFIMSAB( $TB0317_HORA_FIM_SAB )
	{
		$this->TB0317_HORA_FIM_SAB = $TB0317_HORA_FIM_SAB;
		return $this;
	}

	public function getTB0317HORAFIMSAB()
	{
		return $this->TB0317_HORA_FIM_SAB;
	}

	public function setTB0317HORAINICIOOPER( $TB0317_HORA_INICIO_OPER )
	{
		$this->TB0317_HORA_INICIO_OPER = $TB0317_HORA_INICIO_OPER;
		return $this;
	}

	public function getTB0317HORAINICIOOPER()
	{
		return $this->TB0317_HORA_INICIO_OPER;
	}

	public function setTB0317HORAINIDOM( $TB0317_HORA_INI_DOM )
	{
		$this->TB0317_HORA_INI_DOM = $TB0317_HORA_INI_DOM;
		return $this;
	}

	public function getTB0317HORAINIDOM()
	{
		return $this->TB0317_HORA_INI_DOM;
	}

	public function setTB0317HORAINISAB( $TB0317_HORA_INI_SAB )
	{
		$this->TB0317_HORA_INI_SAB = $TB0317_HORA_INI_SAB;
		return $this;
	}

	public function getTB0317HORAINISAB()
	{
		return $this->TB0317_HORA_INI_SAB;
	}

	public function setTB0317INDSTATUS( $TB0317_IND_STATUS )
	{
		$this->TB0317_IND_STATUS = $TB0317_IND_STATUS;
		return $this;
	}

	public function getTB0317INDSTATUS()
	{
		return $this->TB0317_IND_STATUS;
	}

	public function setTB0317NOMEESTACAOTUBO( $TB0317_NOME_ESTACAO_TUBO )
	{
		$this->TB0317_NOME_ESTACAO_TUBO = $TB0317_NOME_ESTACAO_TUBO;
		return $this;
	}

	public function getTB0317NOMEESTACAOTUBO()
	{
		return $this->TB0317_NOME_ESTACAO_TUBO;
	}

	public function setTB0317PASSAGEIROSDIA( $TB0317_PASSAGEIROS_DIA )
	{
		$this->TB0317_PASSAGEIROS_DIA = $TB0317_PASSAGEIROS_DIA;
		return $this;
	}

	public function getTB0317PASSAGEIROSDIA()
	{
		return $this->TB0317_PASSAGEIROS_DIA;
	}

	public function setTB0318CODMODELOESTACAOTUBO( $TB0318_COD_MODELO_ESTACAO_TUBO )
	{
		$this->TB0318_COD_MODELO_ESTACAO_TUBO = $TB0318_COD_MODELO_ESTACAO_TUBO;
		return $this;
	}

	public function getTB0318CODMODELOESTACAOTUBO()
	{
		return $this->TB0318_COD_MODELO_ESTACAO_TUBO;
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