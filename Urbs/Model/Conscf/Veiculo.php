<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela CON_SCF.TB0300_VEICULO_TC
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Conscf
 * @name        Urbs_Model_Conscf_Veiculo
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Model_Conscf_Veiculo extends Urbs_Model_Abstract
{
	protected $TB0300_COD_PLACA;
	protected $TB0200_COD_EMPRESA;
	protected $TB0309_COD_MODELO_CHASSI;
	protected $TB0319_COD_MODELO_CARROCERIA;
	protected $TB0322_COD_COR_VEICULO;
	protected $TB0322_COD_COR_FORRO_LATERAL;
	protected $TB0322_COD_COR_FORRO_TETO;
	protected $TB0323_COD_TIPO_VEICULO;
	protected $TB0501_COD_CATEGORIA_SERVICO;
	protected $TB0300_COD_PREFIXO;
	protected $TB0300_NUM_ANO_FABRICACAO;
	protected $TB0300_NUM_CHASSI;
	protected $TB0300_QTDE_MES_VIDA_UTIL;
	protected $TB0300_IND_STATUS_VEICULO;
	protected $TB0300_VLR_CHASSI_VEICULO;
	protected $TB0300_VLR_CARROCERIA_VEICULO;
	protected $TB0300_MDD_POTENCIA;
	protected $TB0300_IND_FROTA;
	protected $TB0300_DATA_INCORPORACAO;
	protected $TB0300_DESC_ASSOALHO;
	protected $TB0300_DESC_FORRACAO_LATERAL;
	protected $TB0300_DESC_FORRACAO_TETO;
	protected $TB0300_NUM_RENAVAM;
	protected $TB0300_QTDE_LIXEIRA;
	protected $TB0300_QTDE_TOMADA_AR;
	protected $TB0300_QTDE_JANELA_EMERGENCIA;
	protected $TB0300_QTDE_PORTA_EMERGENCIA;
	protected $TB0514_COD_ABRANGENCIA;
	protected $TB0307_ID_SERIE_NOTA_CHASSI;
	protected $TB0307_NUM_NOTA_FISCAL_CHASSI;
	protected $TB0324_COD_FORNECEDOR_CHASSI;
	protected $TB0307_ID_SERIE_NOTA_CARROC;
	protected $TB0307_NUM_NOTA_FISCAL_CARROC;
	protected $TB0324_COD_FORNECEDOR_CARROC;
	protected $TB0300_NUM_INDICE_ERRO_ANT;
	protected $TB0300_NUM_INDICE_ERRO_ATUAL;
	protected $TB0300_AREA_SALAO;
	protected $TB0300_NUM_BANCOS;
	protected $TB0500_COD_TIPO_REMUNERACAO;
	protected $TB0300_TAM_VEICULO;
	protected $TB0300_VIDA_UTIL_PRORROGADA;
	protected $TB0300_VLR_CAPITAL;
	protected $TB0300_SALDO_VIDA_UTIL;
	protected $TB0333_COD_MARCA_PNEU;
	protected $TB0334_COD_TIPO_PNEU;
	protected $TB0335_COD_TAMANHO_PNEU;
	protected $TB0300_QTDE_PNEU;
	protected $TB0300_IND_STATUS_CAMARA;
	protected $TB0300_IND_STATUS_VALIDADOR;
	protected $TB0300_IND_ELEVADOR;
	protected $TB0300_IND_PISO_REBAIXADO;
	protected $TB0300_IND_PISO_REB_RAMPA;
	protected $TB0406_COD_GRUPO;
	protected $TB0301_COD_EMISSAO;
	protected $TB0300_VAO_LIVRE_PORTAS;
	protected $TB0300_ALTURA_DEGRAUS;
	protected $TB0300_BALANCO_DIANTEIRO;
	protected $TB0300_DIST_ENTRE_EIXO;
	protected $TB0300_BALANCO_TRASEIRO;
	protected $TB0300_COMPRIMENTO_TOTAL;
	protected $TB0300_VIGIA_TRASEIRO;
	protected $TB0300_LEITOR;
	protected $TB0300_CONSOLE;
	protected $TB0300_COMPUTADOR;

	public function setTB0200CODEMPRESA( $TB0200_COD_EMPRESA )
	{
		$this->TB0200_COD_EMPRESA = $TB0200_COD_EMPRESA;
	}

	public function getTB0200CODEMPRESA()
	{
		return $this->TB0200_COD_EMPRESA;
	}

	public function setTB0300ALTURADEGRAUS( $TB0300_ALTURA_DEGRAUS )
	{
		$this->TB0300_ALTURA_DEGRAUS = $TB0300_ALTURA_DEGRAUS;
	}

	public function getTB0300ALTURADEGRAUS()
	{
		return $this->TB0300_ALTURA_DEGRAUS;
	}

	public function setTB0300AREASALAO( $TB0300_AREA_SALAO )
	{
		$this->TB0300_AREA_SALAO = $TB0300_AREA_SALAO;
	}

	public function getTB0300AREASALAO()
	{
		return $this->TB0300_AREA_SALAO;
	}

	public function setTB0300BALANCODIANTEIRO( $TB0300_BALANCO_DIANTEIRO )
	{
		$this->TB0300_BALANCO_DIANTEIRO = $TB0300_BALANCO_DIANTEIRO;
	}

	public function getTB0300BALANCODIANTEIRO()
	{
		return $this->TB0300_BALANCO_DIANTEIRO;
	}

	public function setTB0300BALANCOTRASEIRO( $TB0300_BALANCO_TRASEIRO )
	{
		$this->TB0300_BALANCO_TRASEIRO = $TB0300_BALANCO_TRASEIRO;
	}

	public function getTB0300BALANCOTRASEIRO()
	{
		return $this->TB0300_BALANCO_TRASEIRO;
	}

	public function setTB0300CODPLACA( $TB0300_COD_PLACA )
	{
		$this->TB0300_COD_PLACA = $TB0300_COD_PLACA;
	}

	public function getTB0300CODPLACA()
	{
		return $this->TB0300_COD_PLACA;
	}

	public function setTB0300CODPREFIXO( $TB0300_COD_PREFIXO )
	{
		$this->TB0300_COD_PREFIXO = $TB0300_COD_PREFIXO;
	}

	public function getTB0300CODPREFIXO()
	{
		return $this->TB0300_COD_PREFIXO;
	}

	public function setTB0300COMPRIMENTOTOTAL( $TB0300_COMPRIMENTO_TOTAL )
	{
		$this->TB0300_COMPRIMENTO_TOTAL = $TB0300_COMPRIMENTO_TOTAL;
	}

	public function getTB0300COMPRIMENTOTOTAL()
	{
		return $this->TB0300_COMPRIMENTO_TOTAL;
	}

	public function setTB0300COMPUTADOR( $TB0300_COMPUTADOR )
	{
		$this->TB0300_COMPUTADOR = $TB0300_COMPUTADOR;
	}

	public function getTB0300COMPUTADOR()
	{
		return $this->TB0300_COMPUTADOR;
	}

	public function setTB0300CONSOLE( $TB0300_CONSOLE )
	{
		$this->TB0300_CONSOLE = $TB0300_CONSOLE;
	}

	public function getTB0300CONSOLE()
	{
		return $this->TB0300_CONSOLE;
	}

	public function setTB0300DATAINCORPORACAO( $TB0300_DATA_INCORPORACAO )
	{
		$this->TB0300_DATA_INCORPORACAO = $TB0300_DATA_INCORPORACAO;
	}

	public function getTB0300DATAINCORPORACAO()
	{
		return $this->TB0300_DATA_INCORPORACAO;
	}

	public function setTB0300DESCASSOALHO( $TB0300_DESC_ASSOALHO )
	{
		$this->TB0300_DESC_ASSOALHO = $TB0300_DESC_ASSOALHO;
	}

	public function getTB0300DESCASSOALHO()
	{
		return $this->TB0300_DESC_ASSOALHO;
	}

	public function setTB0300DESCFORRACAOLATERAL( $TB0300_DESC_FORRACAO_LATERAL )
	{
		$this->TB0300_DESC_FORRACAO_LATERAL = $TB0300_DESC_FORRACAO_LATERAL;
	}

	public function getTB0300DESCFORRACAOLATERAL()
	{
		return $this->TB0300_DESC_FORRACAO_LATERAL;
	}

	public function setTB0300DESCFORRACAOTETO( $TB0300_DESC_FORRACAO_TETO )
	{
		$this->TB0300_DESC_FORRACAO_TETO = $TB0300_DESC_FORRACAO_TETO;
	}

	public function getTB0300DESCFORRACAOTETO()
	{
		return $this->TB0300_DESC_FORRACAO_TETO;
	}

	public function setTB0300DISTENTREEIXO( $TB0300_DIST_ENTRE_EIXO )
	{
		$this->TB0300_DIST_ENTRE_EIXO = $TB0300_DIST_ENTRE_EIXO;
	}

	public function getTB0300DISTENTREEIXO()
	{
		return $this->TB0300_DIST_ENTRE_EIXO;
	}

	public function setTB0300INDELEVADOR( $TB0300_IND_ELEVADOR )
	{
		$this->TB0300_IND_ELEVADOR = $TB0300_IND_ELEVADOR;
	}

	public function getTB0300INDELEVADOR()
	{
		return $this->TB0300_IND_ELEVADOR;
	}

	public function setTB0300INDFROTA( $TB0300_IND_FROTA )
	{
		$this->TB0300_IND_FROTA = $TB0300_IND_FROTA;
	}

	public function getTB0300INDFROTA()
	{
		return $this->TB0300_IND_FROTA;
	}

	public function setTB0300INDPISOREBAIXADO( $TB0300_IND_PISO_REBAIXADO )
	{
		$this->TB0300_IND_PISO_REBAIXADO = $TB0300_IND_PISO_REBAIXADO;
	}

	public function getTB0300INDPISOREBAIXADO()
	{
		return $this->TB0300_IND_PISO_REBAIXADO;
	}

	public function setTB0300INDPISOREBRAMPA( $TB0300_IND_PISO_REB_RAMPA )
	{
		$this->TB0300_IND_PISO_REB_RAMPA = $TB0300_IND_PISO_REB_RAMPA;
	}

	public function getTB0300INDPISOREBRAMPA()
	{
		return $this->TB0300_IND_PISO_REB_RAMPA;
	}

	public function setTB0300INDSTATUSCAMARA( $TB0300_IND_STATUS_CAMARA )
	{
		$this->TB0300_IND_STATUS_CAMARA = $TB0300_IND_STATUS_CAMARA;
	}

	public function getTB0300INDSTATUSCAMARA()
	{
		return $this->TB0300_IND_STATUS_CAMARA;
	}

	public function setTB0300INDSTATUSVALIDADOR( $TB0300_IND_STATUS_VALIDADOR )
	{
		$this->TB0300_IND_STATUS_VALIDADOR = $TB0300_IND_STATUS_VALIDADOR;
	}

	public function getTB0300INDSTATUSVALIDADOR()
	{
		return $this->TB0300_IND_STATUS_VALIDADOR;
	}

	public function setTB0300INDSTATUSVEICULO( $TB0300_IND_STATUS_VEICULO )
	{
		$this->TB0300_IND_STATUS_VEICULO = $TB0300_IND_STATUS_VEICULO;
	}

	public function getTB0300INDSTATUSVEICULO()
	{
		return $this->TB0300_IND_STATUS_VEICULO;
	}

	public function setTB0300LEITOR( $TB0300_LEITOR )
	{
		$this->TB0300_LEITOR = $TB0300_LEITOR;
	}

	public function getTB0300LEITOR()
	{
		return $this->TB0300_LEITOR;
	}

	public function setTB0300MDDPOTENCIA( $TB0300_MDD_POTENCIA )
	{
		$this->TB0300_MDD_POTENCIA = $TB0300_MDD_POTENCIA;
	}

	public function getTB0300MDDPOTENCIA()
	{
		return $this->TB0300_MDD_POTENCIA;
	}

	public function setTB0300NUMANOFABRICACAO( $TB0300_NUM_ANO_FABRICACAO )
	{
		$this->TB0300_NUM_ANO_FABRICACAO = $TB0300_NUM_ANO_FABRICACAO;
	}

	public function getTB0300NUMANOFABRICACAO()
	{
		return $this->TB0300_NUM_ANO_FABRICACAO;
	}

	public function setTB0300NUMBANCOS( $TB0300_NUM_BANCOS )
	{
		$this->TB0300_NUM_BANCOS = $TB0300_NUM_BANCOS;
	}

	public function getTB0300NUMBANCOS()
	{
		return $this->TB0300_NUM_BANCOS;
	}

	public function setTB0300NUMCHASSI( $TB0300_NUM_CHASSI )
	{
		$this->TB0300_NUM_CHASSI = $TB0300_NUM_CHASSI;
	}

	public function getTB0300NUMCHASSI()
	{
		return $this->TB0300_NUM_CHASSI;
	}

	public function setTB0300NUMINDICEERROANT( $TB0300_NUM_INDICE_ERRO_ANT )
	{
		$this->TB0300_NUM_INDICE_ERRO_ANT = $TB0300_NUM_INDICE_ERRO_ANT;
	}

	public function getTB0300NUMINDICEERROANT()
	{
		return $this->TB0300_NUM_INDICE_ERRO_ANT;
	}

	public function setTB0300NUMINDICEERROATUAL( $TB0300_NUM_INDICE_ERRO_ATUAL )
	{
		$this->TB0300_NUM_INDICE_ERRO_ATUAL = $TB0300_NUM_INDICE_ERRO_ATUAL;
	}

	public function getTB0300NUMINDICEERROATUAL()
	{
		return $this->TB0300_NUM_INDICE_ERRO_ATUAL;
	}

	public function setTB0300NUMRENAVAM( $TB0300_NUM_RENAVAM )
	{
		$this->TB0300_NUM_RENAVAM = $TB0300_NUM_RENAVAM;
	}

	public function getTB0300NUMRENAVAM()
	{
		return $this->TB0300_NUM_RENAVAM;
	}

	public function setTB0300QTDEJANELAEMERGENCIA( $TB0300_QTDE_JANELA_EMERGENCIA )
	{
		$this->TB0300_QTDE_JANELA_EMERGENCIA = $TB0300_QTDE_JANELA_EMERGENCIA;
	}

	public function getTB0300QTDEJANELAEMERGENCIA()
	{
		return $this->TB0300_QTDE_JANELA_EMERGENCIA;
	}

	public function setTB0300QTDELIXEIRA( $TB0300_QTDE_LIXEIRA )
	{
		$this->TB0300_QTDE_LIXEIRA = $TB0300_QTDE_LIXEIRA;
	}

	public function getTB0300QTDELIXEIRA()
	{
		return $this->TB0300_QTDE_LIXEIRA;
	}

	public function setTB0300QTDEMESVIDAUTIL( $TB0300_QTDE_MES_VIDA_UTIL )
	{
		$this->TB0300_QTDE_MES_VIDA_UTIL = $TB0300_QTDE_MES_VIDA_UTIL;
	}

	public function getTB0300QTDEMESVIDAUTIL()
	{
		return $this->TB0300_QTDE_MES_VIDA_UTIL;
	}

	public function setTB0300QTDEPNEU( $TB0300_QTDE_PNEU )
	{
		$this->TB0300_QTDE_PNEU = $TB0300_QTDE_PNEU;
	}

	public function getTB0300QTDEPNEU()
	{
		return $this->TB0300_QTDE_PNEU;
	}

	public function setTB0300QTDEPORTAEMERGENCIA( $TB0300_QTDE_PORTA_EMERGENCIA )
	{
		$this->TB0300_QTDE_PORTA_EMERGENCIA = $TB0300_QTDE_PORTA_EMERGENCIA;
	}

	public function getTB0300QTDEPORTAEMERGENCIA()
	{
		return $this->TB0300_QTDE_PORTA_EMERGENCIA;
	}

	public function setTB0300QTDETOMADAAR( $TB0300_QTDE_TOMADA_AR )
	{
		$this->TB0300_QTDE_TOMADA_AR = $TB0300_QTDE_TOMADA_AR;
	}

	public function getTB0300QTDETOMADAAR()
	{
		return $this->TB0300_QTDE_TOMADA_AR;
	}

	public function setTB0300SALDOVIDAUTIL( $TB0300_SALDO_VIDA_UTIL )
	{
		$this->TB0300_SALDO_VIDA_UTIL = $TB0300_SALDO_VIDA_UTIL;
	}

	public function getTB0300SALDOVIDAUTIL()
	{
		return $this->TB0300_SALDO_VIDA_UTIL;
	}

	public function setTB0300TAMVEICULO( $TB0300_TAM_VEICULO )
	{
		$this->TB0300_TAM_VEICULO = $TB0300_TAM_VEICULO;
	}

	public function getTB0300TAMVEICULO()
	{
		return $this->TB0300_TAM_VEICULO;
	}

	public function setTB0300VAOLIVREPORTAS( $TB0300_VAO_LIVRE_PORTAS )
	{
		$this->TB0300_VAO_LIVRE_PORTAS = $TB0300_VAO_LIVRE_PORTAS;
	}

	public function getTB0300VAOLIVREPORTAS()
	{
		return $this->TB0300_VAO_LIVRE_PORTAS;
	}

	public function setTB0300VIDAUTILPRORROGADA( $TB0300_VIDA_UTIL_PRORROGADA )
	{
		$this->TB0300_VIDA_UTIL_PRORROGADA = $TB0300_VIDA_UTIL_PRORROGADA;
	}

	public function getTB0300VIDAUTILPRORROGADA()
	{
		return $this->TB0300_VIDA_UTIL_PRORROGADA;
	}

	public function setTB0300VIGIATRASEIRO( $TB0300_VIGIA_TRASEIRO )
	{
		$this->TB0300_VIGIA_TRASEIRO = $TB0300_VIGIA_TRASEIRO;
	}

	public function getTB0300VIGIATRASEIRO()
	{
		return $this->TB0300_VIGIA_TRASEIRO;
	}

	public function setTB0300VLRCAPITAL( $TB0300_VLR_CAPITAL )
	{
		$this->TB0300_VLR_CAPITAL = $TB0300_VLR_CAPITAL;
	}

	public function getTB0300VLRCAPITAL()
	{
		return $this->TB0300_VLR_CAPITAL;
	}

	public function setTB0300VLRCARROCERIAVEICULO( $TB0300_VLR_CARROCERIA_VEICULO )
	{
		$this->TB0300_VLR_CARROCERIA_VEICULO = $TB0300_VLR_CARROCERIA_VEICULO;
	}

	public function getTB0300VLRCARROCERIAVEICULO()
	{
		return $this->TB0300_VLR_CARROCERIA_VEICULO;
	}

	public function setTB0300VLRCHASSIVEICULO( $TB0300_VLR_CHASSI_VEICULO )
	{
		$this->TB0300_VLR_CHASSI_VEICULO = $TB0300_VLR_CHASSI_VEICULO;
	}

	public function getTB0300VLRCHASSIVEICULO()
	{
		return $this->TB0300_VLR_CHASSI_VEICULO;
	}

	public function setTB0301CODEMISSAO( $TB0301_COD_EMISSAO )
	{
		$this->TB0301_COD_EMISSAO = $TB0301_COD_EMISSAO;
	}

	public function getTB0301CODEMISSAO()
	{
		return $this->TB0301_COD_EMISSAO;
	}

	public function setTB0307IDSERIENOTACARROC( $TB0307_ID_SERIE_NOTA_CARROC )
	{
		$this->TB0307_ID_SERIE_NOTA_CARROC = $TB0307_ID_SERIE_NOTA_CARROC;
	}

	public function getTB0307IDSERIENOTACARROC()
	{
		return $this->TB0307_ID_SERIE_NOTA_CARROC;
	}

	public function setTB0307IDSERIENOTACHASSI( $TB0307_ID_SERIE_NOTA_CHASSI )
	{
		$this->TB0307_ID_SERIE_NOTA_CHASSI = $TB0307_ID_SERIE_NOTA_CHASSI;
	}

	public function getTB0307IDSERIENOTACHASSI()
	{
		return $this->TB0307_ID_SERIE_NOTA_CHASSI;
	}

	public function setTB0307NUMNOTAFISCALCARROC( $TB0307_NUM_NOTA_FISCAL_CARROC )
	{
		$this->TB0307_NUM_NOTA_FISCAL_CARROC = $TB0307_NUM_NOTA_FISCAL_CARROC;
	}

	public function getTB0307NUMNOTAFISCALCARROC()
	{
		return $this->TB0307_NUM_NOTA_FISCAL_CARROC;
	}

	public function setTB0307NUMNOTAFISCALCHASSI( $TB0307_NUM_NOTA_FISCAL_CHASSI )
	{
		$this->TB0307_NUM_NOTA_FISCAL_CHASSI = $TB0307_NUM_NOTA_FISCAL_CHASSI;
	}

	public function getTB0307NUMNOTAFISCALCHASSI()
	{
		return $this->TB0307_NUM_NOTA_FISCAL_CHASSI;
	}

	public function setTB0309CODMODELOCHASSI( $TB0309_COD_MODELO_CHASSI )
	{
		$this->TB0309_COD_MODELO_CHASSI = $TB0309_COD_MODELO_CHASSI;
	}

	public function getTB0309CODMODELOCHASSI()
	{
		return $this->TB0309_COD_MODELO_CHASSI;
	}

	public function setTB0319CODMODELOCARROCERIA( $TB0319_COD_MODELO_CARROCERIA )
	{
		$this->TB0319_COD_MODELO_CARROCERIA = $TB0319_COD_MODELO_CARROCERIA;
	}

	public function getTB0319CODMODELOCARROCERIA()
	{
		return $this->TB0319_COD_MODELO_CARROCERIA;
	}

	public function setTB0322CODCORFORROLATERAL( $TB0322_COD_COR_FORRO_LATERAL )
	{
		$this->TB0322_COD_COR_FORRO_LATERAL = $TB0322_COD_COR_FORRO_LATERAL;
	}

	public function getTB0322CODCORFORROLATERAL()
	{
		return $this->TB0322_COD_COR_FORRO_LATERAL;
	}

	public function setTB0322CODCORFORROTETO( $TB0322_COD_COR_FORRO_TETO )
	{
		$this->TB0322_COD_COR_FORRO_TETO = $TB0322_COD_COR_FORRO_TETO;
	}

	public function getTB0322CODCORFORROTETO()
	{
		return $this->TB0322_COD_COR_FORRO_TETO;
	}

	public function setTB0322CODCORVEICULO( $TB0322_COD_COR_VEICULO )
	{
		$this->TB0322_COD_COR_VEICULO = $TB0322_COD_COR_VEICULO;
	}

	public function getTB0322CODCORVEICULO()
	{
		return $this->TB0322_COD_COR_VEICULO;
	}

	public function setTB0323CODTIPOVEICULO( $TB0323_COD_TIPO_VEICULO )
	{
		$this->TB0323_COD_TIPO_VEICULO = $TB0323_COD_TIPO_VEICULO;
	}

	public function getTB0323CODTIPOVEICULO()
	{
		return $this->TB0323_COD_TIPO_VEICULO;
	}

	public function setTB0324CODFORNECEDORCARROC( $TB0324_COD_FORNECEDOR_CARROC )
	{
		$this->TB0324_COD_FORNECEDOR_CARROC = $TB0324_COD_FORNECEDOR_CARROC;
	}

	public function getTB0324CODFORNECEDORCARROC()
	{
		return $this->TB0324_COD_FORNECEDOR_CARROC;
	}

	public function setTB0324CODFORNECEDORCHASSI( $TB0324_COD_FORNECEDOR_CHASSI )
	{
		$this->TB0324_COD_FORNECEDOR_CHASSI = $TB0324_COD_FORNECEDOR_CHASSI;
	}

	public function getTB0324CODFORNECEDORCHASSI()
	{
		return $this->TB0324_COD_FORNECEDOR_CHASSI;
	}

	public function setTB0333CODMARCAPNEU( $TB0333_COD_MARCA_PNEU )
	{
		$this->TB0333_COD_MARCA_PNEU = $TB0333_COD_MARCA_PNEU;
	}

	public function getTB0333CODMARCAPNEU()
	{
		return $this->TB0333_COD_MARCA_PNEU;
	}

	public function setTB0334CODTIPOPNEU( $TB0334_COD_TIPO_PNEU )
	{
		$this->TB0334_COD_TIPO_PNEU = $TB0334_COD_TIPO_PNEU;
	}

	public function getTB0334CODTIPOPNEU()
	{
		return $this->TB0334_COD_TIPO_PNEU;
	}

	public function setTB0335CODTAMANHOPNEU( $TB0335_COD_TAMANHO_PNEU )
	{
		$this->TB0335_COD_TAMANHO_PNEU = $TB0335_COD_TAMANHO_PNEU;
	}

	public function getTB0335CODTAMANHOPNEU()
	{
		return $this->TB0335_COD_TAMANHO_PNEU;
	}

	public function setTB0406CODGRUPO( $TB0406_COD_GRUPO )
	{
		$this->TB0406_COD_GRUPO = $TB0406_COD_GRUPO;
	}

	public function getTB0406CODGRUPO()
	{
		return $this->TB0406_COD_GRUPO;
	}

	public function setTB0500CODTIPOREMUNERACAO( $TB0500_COD_TIPO_REMUNERACAO )
	{
		$this->TB0500_COD_TIPO_REMUNERACAO = $TB0500_COD_TIPO_REMUNERACAO;
	}

	public function getTB0500CODTIPOREMUNERACAO()
	{
		return $this->TB0500_COD_TIPO_REMUNERACAO;
	}

	public function setTB0501CODCATEGORIASERVICO( $TB0501_COD_CATEGORIA_SERVICO )
	{
		$this->TB0501_COD_CATEGORIA_SERVICO = $TB0501_COD_CATEGORIA_SERVICO;
	}

	public function getTB0501CODCATEGORIASERVICO()
	{
		return $this->TB0501_COD_CATEGORIA_SERVICO;
	}

	public function setTB0514CODABRANGENCIA( $TB0514_COD_ABRANGENCIA )
	{
		$this->TB0514_COD_ABRANGENCIA = $TB0514_COD_ABRANGENCIA;
	}

	public function getTB0514CODABRANGENCIA()
	{
		return $this->TB0514_COD_ABRANGENCIA;
	}

}