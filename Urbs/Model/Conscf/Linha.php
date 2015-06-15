<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela CON_SCF.TB0502_LINHA
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Conscf
 * @name        Urbs_Model_Conscf_Linha
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

//TODO: renomear os getters/setters
class Urbs_Model_Conscf_Linha extends Urbs_Model_Abstract
{
	protected $TB0502_COD_LINHA;
	protected $TB0502_NOME_LINHA;
	protected $TB0502_COD_LINHA_URBS;
	protected $TB0513_COD_TIPO_LINHA;
	protected $TB0501_COD_CATEGORIA_SERVICO;
	protected $TB0514_COD_ABRANGENCIA;
	protected $TB0502_DATA_IMPLANTACAO_LINHA;
	protected $TB0502_IND_STATUS_LINHA;
	protected $TB0502_VLR_TARIFA;
	protected $TB0502_MDD_VELOCIDADE_MEDIA;
	protected $TB0502_IND_LINHA_ESPECIAL;
	protected $TB0502_DATA_FECHAMENTO_LINHA;
	protected $TB0502_GRUPO_LINHA;
	protected $TB0502_OBS_LINHA;
	protected $TB0502_IND_SOMENTE_CARTAO;

	public function setTB0501CODCATEGORIASERVICO( $TB0501_COD_CATEGORIA_SERVICO )
	{
		$this->TB0501_COD_CATEGORIA_SERVICO = $TB0501_COD_CATEGORIA_SERVICO;

	}

	public function getTB0501CODCATEGORIASERVICO()
	{
		return $this->TB0501_COD_CATEGORIA_SERVICO;
	}

	public function setTB0502CODLINHA( $TB0502_COD_LINHA )
	{
		$this->TB0502_COD_LINHA = $TB0502_COD_LINHA;
		return $this;
	}

	public function getTB0502CODLINHA()
	{
		return $this->TB0502_COD_LINHA;
	}

	public function setTB0502CODLINHAURBS( $TB0502_COD_LINHA_URBS )
	{
		$this->TB0502_COD_LINHA_URBS = $TB0502_COD_LINHA_URBS;
		return $this;
	}

	public function getTB0502CODLINHAURBS()
	{
		return $this->TB0502_COD_LINHA_URBS;
	}

	public function setTB0502DATAFECHAMENTOLINHA( $TB0502_DATA_FECHAMENTO_LINHA )
	{
		$this->TB0502_DATA_FECHAMENTO_LINHA = $TB0502_DATA_FECHAMENTO_LINHA;
		return $this;
	}

	public function getTB0502DATAFECHAMENTOLINHA()
	{
		return $this->TB0502_DATA_FECHAMENTO_LINHA;
	}

	public function setTB0502DATAIMPLANTACAOLINHA( $TB0502_DATA_IMPLANTACAO_LINHA )
	{
		$this->TB0502_DATA_IMPLANTACAO_LINHA = $TB0502_DATA_IMPLANTACAO_LINHA;
		return $this;
	}

	public function getTB0502DATAIMPLANTACAOLINHA()
	{
		return $this->TB0502_DATA_IMPLANTACAO_LINHA;
	}

	public function setTB0502GRUPOLINHA( $TB0502_GRUPO_LINHA )
	{
		$this->TB0502_GRUPO_LINHA = $TB0502_GRUPO_LINHA;
		return $this;
	}

	public function getTB0502GRUPOLINHA()
	{
		return $this->TB0502_GRUPO_LINHA;
	}

	public function setTB0502INDLINHAESPECIAL( $TB0502_IND_LINHA_ESPECIAL )
	{
		$this->TB0502_IND_LINHA_ESPECIAL = $TB0502_IND_LINHA_ESPECIAL;
		return $this;
	}

	public function getTB0502INDLINHAESPECIAL()
	{
		return $this->TB0502_IND_LINHA_ESPECIAL;
	}

	public function setTB0502INDSOMENTECARTAO( $TB0502_IND_SOMENTE_CARTAO )
	{
		$this->TB0502_IND_SOMENTE_CARTAO = $TB0502_IND_SOMENTE_CARTAO;
		return $this;
	}

	public function getTB0502INDSOMENTECARTAO()
	{
		return $this->TB0502_IND_SOMENTE_CARTAO;
	}

	public function setTB0502INDSTATUSLINHA( $TB0502_IND_STATUS_LINHA )
	{
		$this->TB0502_IND_STATUS_LINHA = $TB0502_IND_STATUS_LINHA;
		return $this;
	}

	public function getTB0502INDSTATUSLINHA()
	{
		return $this->TB0502_IND_STATUS_LINHA;
	}

	public function setTB0502MDDVELOCIDADEMEDIA( $TB0502_MDD_VELOCIDADE_MEDIA )
	{
		$this->TB0502_MDD_VELOCIDADE_MEDIA = $TB0502_MDD_VELOCIDADE_MEDIA;
		return $this;
	}

	public function getTB0502MDDVELOCIDADEMEDIA()
	{
		return $this->TB0502_MDD_VELOCIDADE_MEDIA;
	}

	public function setTB0502NOMELINHA( $TB0502_NOME_LINHA )
	{
		$this->TB0502_NOME_LINHA = $TB0502_NOME_LINHA;
		return $this;
	}

	public function getTB0502NOMELINHA()
	{
		return $this->TB0502_NOME_LINHA;
	}

	public function setTB0502OBSLINHA( $TB0502_OBS_LINHA )
	{
		$this->TB0502_OBS_LINHA = $TB0502_OBS_LINHA;
		return $this;
	}

	public function getTB0502OBSLINHA()
	{
		return $this->TB0502_OBS_LINHA;
	}

	public function setTB0502VLRTARIFA( $TB0502_VLR_TARIFA )
	{
		$this->TB0502_VLR_TARIFA = $TB0502_VLR_TARIFA;
		return $this;
	}

	public function getTB0502VLRTARIFA()
	{
		return $this->TB0502_VLR_TARIFA;
	}

	public function setTB0513CODTIPOLINHA( $TB0513_COD_TIPO_LINHA )
	{
		$this->TB0513_COD_TIPO_LINHA = $TB0513_COD_TIPO_LINHA;
		return $this;
	}

	public function getTB0513CODTIPOLINHA()
	{
		return $this->TB0513_COD_TIPO_LINHA;
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