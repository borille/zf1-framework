<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela SIRH.SIRH_TB001_PESSOAL_URBS
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Sirh
 * @name        Urbs_Model_Sirh_Pessoal
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Model_Sirh_Pessoal extends Urbs_Model_Abstract
{
	protected $SIRH_TB001_MATRICULA;
	protected $SIRH_TB007_FAIXA;
	protected $SIRH_TB006_COD_CLASSE;
	protected $SIRH_TB005_COD_EMPR_RH;
	protected $SIRH_TB002_VERBA;
	protected $SIRH_TB001_NOME;
	protected $SIRH_TB001_CARGO;
	protected $SIRH_TB001_CART_TRAB;
	protected $SIRH_TB001_VIGENCIA;
	protected $SIRH_TB001_DT_NASC;
	protected $SIRH_TB001_DT_ADMI;
	protected $SIRH_TB001_DT_DEMI;
	protected $SIRH_TB001_DT_IMP;
	protected $SIRH_TB001_PIS_PASEP;
	protected $SIRH_TB001_CPF;
	protected $SIRH_TB001_CARGA_HORARIA;
	protected $SIRH_TB001_COR_PESSOA;
	protected $SIRH_TB001_NR_CI;
	protected $SIRH_TB001_UF_CI;
	protected $SIRH_TB001_COD_INSTRUCAO;
	protected $SIRH_TB001_END_RUA;
	protected $SIRH_TB001_END_NUMERO;
	protected $SIRH_TB001_END_COMPL;
	protected $SIRH_TB001_END_CEP;
	protected $SIRH_TB001_END_CIDADE;
	protected $SIRH_TB001_END_UF;
	protected $SIRH_TB001_END_BAIRRO;
	protected $SIRH_TB001_TELEFONE;
	protected $SIRH_TB001_STATUS;
	protected $SIRH_TB001_SEXO;
	protected $SIRH_TB001_SIC;
	protected $SIRH_TB001_MATRICULA_NUMERO;
	protected $SIRH_TB001_MATRICULA_DIGITO;
	protected $SIRH_TB001_CELULAR;
	protected $SIRH_TB001_DT_ULT_ALTERACAO;
	protected $SIRH_TB001_RESP_ULT_ALTERACAO;
	protected $SIRH_TB001_SENHA_INTRA;
	protected $SIRH_TB001_EMAIL;
	protected $SIRH_TB001_SENHA;
	protected $SIRH_TB001_DATA_MUD_SENHA;
	protected $SIRH_TB001_NIVEL_HIERARQUICO;
	protected $SIRH_TB215_COD_CARGOS;
	protected $SIRH_TB001_LOGIN_EMAIL;
	protected $SIRH_TB001_BIO_NITGEN_POL_DIR;

	public function setSIRHTB215CODCARGOS( $SIRH_TB215_COD_CARGOS )
	{
		$this->SIRH_TB215_COD_CARGOS = $SIRH_TB215_COD_CARGOS;
		return $this;
	}

	public function getSIRHTB215CODCARGOS()
	{
		return $this->SIRH_TB215_COD_CARGOS;
	}

	public function setSIRHTB007FAIXA( $SIRH_TB007_FAIXA )
	{
		$this->SIRH_TB007_FAIXA = $SIRH_TB007_FAIXA;
		return $this;
	}

	public function getSIRHTB007FAIXA()
	{
		return $this->SIRH_TB007_FAIXA;
	}

	public function setSIRHTB006CODCLASSE( $SIRH_TB006_COD_CLASSE )
	{
		$this->SIRH_TB006_COD_CLASSE = $SIRH_TB006_COD_CLASSE;
		return $this;
	}

	public function getSIRHTB006CODCLASSE()
	{
		return $this->SIRH_TB006_COD_CLASSE;
	}

	public function setSIRHTB005CODEMPRRH( $SIRH_TB005_COD_EMPR_RH )
	{
		$this->SIRH_TB005_COD_EMPR_RH = $SIRH_TB005_COD_EMPR_RH;
		return $this;
	}

	public function getSIRHTB005CODEMPRRH()
	{
		return $this->SIRH_TB005_COD_EMPR_RH;
	}

	public function setVerba( $verba )
	{
		$this->SIRH_TB002_VERBA = $verba;
		return $this;
	}

	public function getVerba()
	{
		return $this->SIRH_TB002_VERBA;
	}

	public function setVigencia( $vigencia )
	{
		$this->SIRH_TB001_VIGENCIA = $vigencia;
		return $this;
	}

	public function getVigencia()
	{
		return $this->SIRH_TB001_VIGENCIA;
	}

	public function setSIRHTB001UFCI( $SIRH_TB001_UF_CI )
	{
		$this->SIRH_TB001_UF_CI = $SIRH_TB001_UF_CI;
		return $this;
	}

	public function getSIRHTB001UFCI()
	{
		return $this->SIRH_TB001_UF_CI;
	}

	public function setTelefone( $telefone )
	{
		$this->SIRH_TB001_TELEFONE = $telefone;
		return $this;
	}

	public function getTelefone()
	{
		return $this->SIRH_TB001_TELEFONE;
	}

	public function setStatus( $status )
	{
		$this->SIRH_TB001_STATUS = $status;
		return $this;
	}

	public function getStatus()
	{
		return $this->SIRH_TB001_STATUS;
	}

	public function setSIRHTB001SIC( $SIRH_TB001_SIC )
	{
		$this->SIRH_TB001_SIC = $SIRH_TB001_SIC;
		return $this;
	}

	public function getSIRHTB001SIC()
	{
		return $this->SIRH_TB001_SIC;
	}

	public function setSexo( $sexo )
	{
		$this->SIRH_TB001_SEXO = $sexo;
		return $this;
	}

	public function getSexo()
	{
		return $this->SIRH_TB001_SEXO;
	}

	public function setSIRHTB001SENHAINTRA( $SIRH_TB001_SENHA_INTRA )
	{
		$this->SIRH_TB001_SENHA_INTRA = $SIRH_TB001_SENHA_INTRA;
		return $this;
	}

	public function getSIRHTB001SENHAINTRA()
	{
		return $this->SIRH_TB001_SENHA_INTRA;
	}

	/**
	 * @param $senha
	 * @return $this
	 */
	public function setSenha( $senha )
	{
		$this->SIRH_TB001_SENHA = $senha;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSenha()
	{
		return $this->SIRH_TB001_SENHA;
	}

	public function setSIRHTB001RESPULTALTERACAO( $SIRH_TB001_RESP_ULT_ALTERACAO )
	{
		$this->SIRH_TB001_RESP_ULT_ALTERACAO = $SIRH_TB001_RESP_ULT_ALTERACAO;
		return $this;
	}

	public function getSIRHTB001RESPULTALTERACAO()
	{
		return $this->SIRH_TB001_RESP_ULT_ALTERACAO;
	}

	public function setSIRHTB001PISPASEP( $SIRH_TB001_PIS_PASEP )
	{
		$this->SIRH_TB001_PIS_PASEP = $SIRH_TB001_PIS_PASEP;
		return $this;
	}

	public function getSIRHTB001PISPASEP()
	{
		return $this->SIRH_TB001_PIS_PASEP;
	}

	public function setSIRHTB001NRCI( $SIRH_TB001_NR_CI )
	{
		$this->SIRH_TB001_NR_CI = $SIRH_TB001_NR_CI;
		return $this;
	}

	public function getSIRHTB001NRCI()
	{
		return $this->SIRH_TB001_NR_CI;
	}

	public function setNome( $nome )
	{
		$this->SIRH_TB001_NOME = $nome;
		return $this;
	}

	public function getNome()
	{
		return $this->SIRH_TB001_NOME;
	}

	public function setSIRHTB001NIVELHIERARQUICO( $SIRH_TB001_NIVEL_HIERARQUICO )
	{
		$this->SIRH_TB001_NIVEL_HIERARQUICO = $SIRH_TB001_NIVEL_HIERARQUICO;
		return $this;
	}

	public function getSIRHTB001NIVELHIERARQUICO()
	{
		return $this->SIRH_TB001_NIVEL_HIERARQUICO;
	}

	public function setMatriculaNumero( $matriculaNumero )
	{
		$this->SIRH_TB001_MATRICULA_NUMERO = $matriculaNumero;
		return $this;
	}

	public function getMatriculaNumero()
	{
		return $this->SIRH_TB001_MATRICULA_NUMERO;
	}

	public function setMatriculaDigito( $matriculaDigito )
	{
		$this->SIRH_TB001_MATRICULA_DIGITO = $matriculaDigito;
		return $this;
	}

	public function getMatriculaDigito()
	{
		return $this->SIRH_TB001_MATRICULA_DIGITO;
	}

	public function setMatricula( $matricula )
	{
		$this->SIRH_TB001_MATRICULA = $matricula;
		return $this;
	}

	public function getMatricula()
	{
		return $this->SIRH_TB001_MATRICULA;
	}

	public function setLoginEmail( $loginEmail )
	{
		$this->SIRH_TB001_LOGIN_EMAIL = $loginEmail;
		return $this;
	}

	public function getLoginEmail()
	{
		return $this->SIRH_TB001_LOGIN_EMAIL;
	}

	public function setSIRHTB001ENDUF( $SIRH_TB001_END_UF )
	{
		$this->SIRH_TB001_END_UF = $SIRH_TB001_END_UF;
		return $this;
	}

	public function getSIRHTB001ENDUF()
	{
		return $this->SIRH_TB001_END_UF;
	}

	public function setSIRHTB001ENDRUA( $SIRH_TB001_END_RUA )
	{
		$this->SIRH_TB001_END_RUA = $SIRH_TB001_END_RUA;
		return $this;
	}

	public function getSIRHTB001ENDRUA()
	{
		return $this->SIRH_TB001_END_RUA;
	}

	public function setSIRHTB001ENDNUMERO( $SIRH_TB001_END_NUMERO )
	{
		$this->SIRH_TB001_END_NUMERO = $SIRH_TB001_END_NUMERO;
		return $this;
	}

	public function getSIRHTB001ENDNUMERO()
	{
		return $this->SIRH_TB001_END_NUMERO;
	}

	public function setSIRHTB001ENDCOMPL( $SIRH_TB001_END_COMPL )
	{
		$this->SIRH_TB001_END_COMPL = $SIRH_TB001_END_COMPL;
		return $this;
	}

	public function getSIRHTB001ENDCOMPL()
	{
		return $this->SIRH_TB001_END_COMPL;
	}

	public function setSIRHTB001ENDCIDADE( $SIRH_TB001_END_CIDADE )
	{
		$this->SIRH_TB001_END_CIDADE = $SIRH_TB001_END_CIDADE;
		return $this;
	}

	public function getSIRHTB001ENDCIDADE()
	{
		return $this->SIRH_TB001_END_CIDADE;
	}

	public function setSIRHTB001ENDCEP( $SIRH_TB001_END_CEP )
	{
		$this->SIRH_TB001_END_CEP = $SIRH_TB001_END_CEP;
		return $this;
	}

	public function getSIRHTB001ENDCEP()
	{
		return $this->SIRH_TB001_END_CEP;
	}

	public function setSIRHTB001ENDBAIRRO( $SIRH_TB001_END_BAIRRO )
	{
		$this->SIRH_TB001_END_BAIRRO = $SIRH_TB001_END_BAIRRO;
		return $this;
	}

	public function getSIRHTB001ENDBAIRRO()
	{
		return $this->SIRH_TB001_END_BAIRRO;
	}

	public function setEmail( $email )
	{
		$this->SIRH_TB001_EMAIL = $email;
		return $this;
	}

	public function getEmail()
	{
		return $this->SIRH_TB001_EMAIL;
	}

	public function setSIRHTB001DTULTALTERACAO( $SIRH_TB001_DT_ULT_ALTERACAO )
	{
		$this->SIRH_TB001_DT_ULT_ALTERACAO = $SIRH_TB001_DT_ULT_ALTERACAO;
		return $this;
	}

	public function getSIRHTB001DTULTALTERACAO()
	{
		return $this->SIRH_TB001_DT_ULT_ALTERACAO;
	}

	public function setDataNascimento( $dataNascimento )
	{
		$this->SIRH_TB001_DT_NASC = $dataNascimento;
		return $this;
	}

	public function getDataNascimento()
	{
		return $this->SIRH_TB001_DT_NASC;
	}

	public function setSIRHTB001DTIMP( $SIRH_TB001_DT_IMP )
	{
		$this->SIRH_TB001_DT_IMP = $SIRH_TB001_DT_IMP;
		return $this;
	}

	public function getSIRHTB001DTIMP()
	{
		return $this->SIRH_TB001_DT_IMP;
	}

	public function setDataDemissao( $dataDemissao )
	{
		$this->SIRH_TB001_DT_DEMI = $dataDemissao;
		return $this;
	}

	public function getDataDemissao()
	{
		return $this->SIRH_TB001_DT_DEMI;
	}

	public function setDataAdmissao( $dataAdmissao )
	{
		$this->SIRH_TB001_DT_ADMI = $dataAdmissao;
		return $this;
	}

	public function getDataAdmissao()
	{
		return $this->SIRH_TB001_DT_ADMI;
	}

	public function setSIRHTB001DATAMUDSENHA( $SIRH_TB001_DATA_MUD_SENHA )
	{
		$this->SIRH_TB001_DATA_MUD_SENHA = $SIRH_TB001_DATA_MUD_SENHA;
		return $this;
	}

	public function getSIRHTB001DATAMUDSENHA()
	{
		return $this->SIRH_TB001_DATA_MUD_SENHA;
	}

	public function setCpf( $cpf )
	{
		$this->SIRH_TB001_CPF = $cpf;
		return $this;
	}

	public function getCpf()
	{
		return $this->SIRH_TB001_CPF;
	}

	public function setCorPessoa( $corPessoa )
	{
		$this->SIRH_TB001_COR_PESSOA = $corPessoa;
		return $this;
	}

	public function getCorPessoa()
	{
		return $this->SIRH_TB001_COR_PESSOA;
	}

	public function setSIRHTB001CODINSTRUCAO( $SIRH_TB001_COD_INSTRUCAO )
	{
		$this->SIRH_TB001_COD_INSTRUCAO = $SIRH_TB001_COD_INSTRUCAO;
		return $this;
	}

	public function getSIRHTB001CODINSTRUCAO()
	{
		return $this->SIRH_TB001_COD_INSTRUCAO;
	}

	public function setCelular( $celular )
	{
		$this->SIRH_TB001_CELULAR = $celular;
		return $this;
	}

	public function getCelular()
	{
		return $this->SIRH_TB001_CELULAR;
	}

	public function setSIRHTB001CARTTRAB( $SIRH_TB001_CART_TRAB )
	{
		$this->SIRH_TB001_CART_TRAB = $SIRH_TB001_CART_TRAB;
		return $this;
	}

	public function getSIRHTB001CARTTRAB()
	{
		return $this->SIRH_TB001_CART_TRAB;
	}

	public function setCargo( $cargo )
	{
		$this->SIRH_TB001_CARGO = $cargo;
		return $this;
	}

	public function getCargo()
	{
		return $this->SIRH_TB001_CARGO;
	}

	public function setCargaHoraria( $cargaHoraria )
	{
		$this->SIRH_TB001_CARGA_HORARIA = $cargaHoraria;
		return $this;
	}

	public function getCargaHoraria()
	{
		return $this->SIRH_TB001_CARGA_HORARIA;
	}

	public function setSIRHTB001BIONITGENPOLDIR( $SIRH_TB001_BIO_NITGEN_POL_DIR )
	{
		$this->SIRH_TB001_BIO_NITGEN_POL_DIR = $SIRH_TB001_BIO_NITGEN_POL_DIR;
		return $this;
	}

	public function getSIRHTB001BIONITGENPOLDIR()
	{
		return $this->SIRH_TB001_BIO_NITGEN_POL_DIR;
	}
}