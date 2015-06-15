<?php

require_once 'Urbs/Service/Sirh.php';
require_once 'Urbs/Service/Interface.php';
require_once 'Urbs/Db/Table/Sirh/Pessoal.php';

/**
 * Classe com métodos comuns para CRUD na tabela SIRH.SIRH_TB001_PESSOAL_URBS
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Sirh_Pessoal
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Service_Sirh_Pessoal extends Urbs_Service_Sirh implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Sirh_Pessoal
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Sirh_Pessoal
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Sirh_Pessoal
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Sirh_Pessoal
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Sirh_Pessoal();
		}
		return $this->_repository;
	}

	/**
	 * Retorna um objeto|array com os dados do usuário passado
	 *
	 * @param $matricula
	 * @param int $empresa
	 * @param bool $toObject
	 * @return array|Urbs_Model_Sirh_Pessoal
	 */
	public function getPessoa( $matricula, $empresa = 1, $toObject = true )
	{
		$matricula = $this->validarMatricula( $matricula );

		if ( is_numeric( $matricula ) ) {
			$result = $this->getRepository()->getPessoa( $matricula, $empresa );
		} else {
			$result = $this->getRepository()->getPessoa( $matricula );
		}

		if ( $toObject ) {
			require_once 'Urbs/Model/Sirh/Pessoal.php';
			return new Urbs_Model_Sirh_Pessoal( $result );
		}
		return $result;
	}

	/**
	 * Retorna a verba que a pessoa está lotada
	 *
	 * @param $matricula
	 * @param int $empresa
	 * @return mixed
	 */
	public function getVerbaPessoa( $matricula, $empresa = 1 )
	{
		return $this->_getValorCampo( $matricula, Urbs_Db_Table_Sirh_Pessoal::VERBA, $empresa );
	}

	/**
	 * Retorna o nome da pessoa
	 *
	 * @param $matricula
	 * @param int $empresa
	 * @return mixed
	 */
	public function getNomePessoa( $matricula, $empresa = 1 )
	{
		return $this->_getValorCampo( $matricula, Urbs_Db_Table_Sirh_Pessoal::NOME, $empresa );
	}

	/**
	 * Retorna o email da pessoa
	 *
	 * @param $matricula
	 * @param int $empresa
	 * @return mixed
	 */
	public function getEmailPessoa( $matricula, $empresa = 1 )
	{
		return $this->_getValorCampo( $matricula, Urbs_Db_Table_Sirh_Pessoal::EMAIL, $empresa );
	}

	/**
	 * envia busca ao repositorio de acordo com o tipo de matricula
	 *
	 * @param $matricula
	 * @param $campo
	 * @param int $empresa
	 * @return mixed
	 */
	protected function _getValorCampo( $matricula, $campo, $empresa = 1 )
	{
		$matricula = $this->validarMatricula( $matricula );

		if ( is_numeric( $matricula ) ) {
			return $this->getRepository()->getValorCampo( $matricula, $campo, $empresa );
		} else {
			return $this->getRepository()->getValorCampo( $matricula, $campo );
		}
	}

	/**
	 * Retorna o endereço completo da pessoa
	 *
	 * @param $matricula
	 * @param int $empresa
	 * @param bool $toObject
	 * @return array|Urbs_Model_Sirh_Pessoal_Endereco
	 */
	public function getEnderecoCompleto( $matricula, $empresa = 1, $toObject = true )
	{
		$matricula = $this->validarMatricula( $matricula );

		if ( is_numeric( $matricula ) ) {
			$result = $this->getRepository()->getEnderecoCompleto( $matricula, $empresa );
		} else {
			$result = $this->getRepository()->getEnderecoCompleto( $matricula );
		}

		if ( $toObject ) {
			require_once 'Urbs/Model/Sirh/Pessoal/Endereco.php';
			return new Urbs_Model_Sirh_Pessoal_Endereco( $result );
		}
		return $result;
	}

	/**
	 * Retorna a lotação completa da pessoa
	 *
	 * @param $matricula
	 * @param int $empresa
	 * @param bool $toObject
	 * @return array|Urbs_Model_Sirh_Lotacao_Completa
	 */
	public function getLotacaoCompleta( $matricula, $empresa = 1, $toObject = true )
	{
		$matricula = $this->validarMatricula( $matricula );

		if ( is_numeric( $matricula ) ) {
			$result = $this->getRepository()->getLotacaoCompleta( $matricula, $empresa );
		} else {
			$result = $this->getRepository()->getLotacaoCompleta( $matricula );
		}

		if ( $toObject ) {
			require_once 'Urbs/Model/Sirh/Lotacao/Completa.php';
			return new Urbs_Model_Sirh_Lotacao_Completa( $result );
		}
		return $result;
	}

	/**
	 * Retorna se uma pessoa está ativa no SIRH
	 *
	 * @param $matricula
	 * @param int $empresa
	 * @return bool
	 */
	public function isPessoaAtiva( $matricula, $empresa = 1 )
	{
		$matricula = $this->validarMatricula( $matricula );

		if ( is_numeric( $matricula ) ) {
			return $this->getRepository()->getPessoaAtiva( $matricula, $empresa );
		} else {
			return $this->getRepository()->getPessoaAtiva( $matricula );
		}
	}

	/**
	 * Altera a senha da intranet
	 *
	 * @param $matricula
	 * @param $empresa
	 * @param $senha
	 * @return bool
	 */
	public function alterarSenha( $matricula, $empresa, $senha )
	{
		return $this->getRepository()->alterarSenha( $this->validarMatricula( $matricula ), $empresa, $senha );
	}

}