<?php

require_once 'Urbs/Service/Siru.php';
require_once 'Urbs/Service/Interface.php';
require_once 'Urbs/Db/Table/Siru/Boleto.php';
require_once 'Urbs/Model/Siru/Boleto.php';

/**
 * Classe com métodos comuns para CRUD na tabela SIRU.TB001_BOLETO_URBS
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Siru_Boleto
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Service_Siru_Boleto extends Urbs_Service_Siru implements Urbs_Service_Interface
{
	/**
	 * @var Urbs_Service_Siru_Boleto
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Siru_Boleto
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Siru_Boleto
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Siru_Boleto
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Siru_Boleto();
		}
		return $this->_repository;
	}

	/**
	 * Retorna um objeto|array com os dados do boleto
	 *
	 * @param $id
	 * @param bool $toObject
	 * @return array|Urbs_Model_Siru_Boleto
	 */
	public function getBoleto( $id, $toObject = true )
	{
		$result = $this->getRepository()->getId( $id );

		if ( $toObject ) {
			return new Urbs_Model_Siru_Boleto( $result );
		}
		return $result;
	}


	/**
	 * Gera um novo boleto
	 *
	 * @param Urbs_Model_Siru_Boleto $model
	 * @param Urbs_Model_Siru_Sacado|string $sacado
	 * @param Urbs_Model_Siru_TipoBoleto|string $tipoBoleto
	 * @return bool
	 */
	public function incluirBoleto( Urbs_Model_Siru_Boleto $boleto, $sacado, $tipoBoleto )
	{
		if ( !is_object( $boleto ) ) {
			$boleto = new Urbs_Model_Siru_Boleto();
		}

		//se não for passado o Sacado, busca o mesmo
		if ( $sacado != null && !is_object( $sacado ) ) {
			if ( is_numeric( $sacado ) ) {
				$sacado = Urbs_Service_Siru_Sacado::getInstance()->getSacado( $sacado );
			} else {
				$sacado = Urbs_Service_Siru_Sacado::getInstance()->getSacadoDocumento( $sacado );
			}
		}

		//se for passado id do TipoBoleto, busca o mesmo
		if ( $tipoBoleto != null && !is_object( $tipoBoleto ) ) {
			$tipoBoleto = Urbs_Service_Siru_TipoBoleto::getInstance()->getTipoBoleto( $tipoBoleto );
		}

		//preenche o sacado
		if ( !$boleto->getIdSacado() ) {
			$boleto->setIdSacado( $sacado->getId() );
		}

		//preenche o tipo de boleto
		if ( !$boleto->getIdTipoBoleto() ) {
			$boleto->setIdTipoBoleto( $tipoBoleto->getIdTipoBoleto() );
		}

		//preenche o id do boleto
		if ( !$boleto->getIdBoleto() ) {
			$boleto->setIdBoleto( Urbs_Db_Table_Siru_Boleto::getInstance()->getNextSequence() );
		}

		//preenche o nosso numero
		if ( !$boleto->getNossoNumero() ) {
			require_once 'Urbs/Db/Table/Siru/TipoBoleto.php';
			$convenio = Urbs_Db_Table_Siru_TipoBoleto::getInstance()->getNumeroConvenio( $boleto->getIdTipoBoleto() );
			$boleto->setNossoNumero( $convenio . str_pad( $boleto->getIdBoleto(), 10, '0', STR_PAD_LEFT ) );
		}

		//verifica se é pra cobrar tarifa
		if ( $boleto->getIdTarifa() == null && $tipoBoleto->getCobrarTarifa() == 'S' ) {
			require_once 'Urbs/Db/Table/Siru/TipoBoleto.php';
			$boleto->setIdTarifa( Urbs_Db_Table_Siru_Tarifa::getInstance()->getIdTarifaVigente() );
		}

		//se nao tiver data de emissao, seta pra data atual
		if ( !$boleto->getDataEmissao() ) {
			$boleto->setDataEmissao( new Zend_Db_Expr( 'TRUNC(SYSDATE)' ) );
		}

		//se nao tiver data de vencimento, seta pra data atual somando o prazo de pagamento
		if ( !$boleto->getDataVencimento() ) {
			$prazo = $tipoBoleto->getDiasPrazoVencimento();
			$boleto->setDataVencimento( new Zend_Db_Expr( "TRUNC(SYSDATE + $prazo)" ) );
		}

		//preenche o valor do boleto
		if ( !$boleto->getValorBoleto() ) {
			$boleto->setValorBoleto( $tipoBoleto->getValor() );
		}

		if ( !$boleto->getDescricaoItens() ) {
			$boleto->setDescricaoItens( $tipoBoleto->getNomeTipoBoleto() );
		}

		if ( $this->getRepository()->insert( $boleto ) ) {
			return $boleto->getIdBoleto();
		}
		return false;
	}

}