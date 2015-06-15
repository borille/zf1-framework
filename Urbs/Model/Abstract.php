<?php

/**
 * Possui alguns métodos comuns utilizados por todas as classes Model.
 *
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @name        Urbs_Model_Abstract
 * @copyright   Copyright (c) 2012 - URBS
 * @author      TRB
 * @version     1.2
 */
abstract class Urbs_Model_Abstract
{
	//--------------------------------------------------------------------------
	/**
	 * Construtor da classe
	 *
	 * Se for passado o parametro $data, seta o objeto por meio desse.
	 * Os nomes do indice do array devem ser os mesmos dos atributos do objeto
	 * e caso algum nome de indice desse array não existir como atributo, ele é ignorado
	 *
	 * @param array $data Array com os dados para preencher o objeto
	 */
	public function __construct( $data = array() )
	{
		if ( $data ) {
			$this->setFromArray( $data );
		}
	}

	//--------------------------------------------------------------------------
	/** toArray() Retorna um array com todas as variaveis do objeto Model e seus respectivos valores
	 *
	 * @example data[nomeVariavel] = valorVariavel
	 *
	 * @return array
	 */
	final public function toArray()
	{
		try {
			//guarda as variaveis todas as variaveis do objeto
			$reflection = new ReflectionClass( $this );
			$vars = array_keys( $reflection->getdefaultProperties() );

			//guarda somente as variaveis da classe pai
			$reflection = new ReflectionClass( __CLASS__ );
			$parent_vars = array_keys( $reflection->getdefaultProperties() );

			$data = array();

			//percorre todas as variaveis
			foreach ( $vars as $key ) {
				//verifica se a variavel não é da classe pai
				if ( !in_array( $key, $parent_vars ) ) {
					//salva no array data[nomeVariavel] = valorVariavel
					$data[$key] = $this->$key;
				}
			}
		} catch ( Zend_Db_Exception $e ) {
			//Salva erro no Log
			if ( Zend_Registry::isRegistered( 'logger' ) ) {
				Zend_Registry::get( 'logger' )->err( $e->getMessage() );
			}
			$data = array();
		}
		return $data;
	}

	//--------------------------------------------------------------------------
	/**
	 * __set( $name, $value )
	 *
	 * Utilizado para setar o valor de um atributo do objeto Model
	 *
	 * @param string $name Nome do Atributo
	 * @param valor $value Valor do Atributo
	 */
	public function __set( $name, $value )
	{
		$method = 'set' . $name;
		try {
			if ( method_exists( $this, $method ) ) {
				$this->$method( $value );
			} else {
				$this->$name = $value;
			}
		} catch ( Zend_Db_Exception $e ) {
			throw new Exception( 'Erro ao setar o valor: ' . $value . ' ao atributo: ' . $name . ' - ' . $e->getMessage() );
		}
	}

	//--------------------------------------------------------------------------
	/**
	 * __get( $name )
	 *
	 * Utilizado para recuperar o valor de um atributo do objeto Model
	 *
	 * @param string $name  Nome do Atributo
	 * @return valor
	 */
	public function __get( $name )
	{
		$method = 'get' . $name;
		try {
			if ( method_exists( $this, $method ) ) {
				return $this->$method();
			} else {
				return $this->$name;
			}
		} catch ( Zend_Db_Exception $e ) {
			throw new Exception( 'Erro ao obter o valor do atributo: ' . $name . ' - ' . $e->getMessage() );
		}
	}

	//--------------------------------------------------------------------------
	/**
	 * Seta o objeto por meio dos parametros passados por um array.
	 * Os nomes do indice do array devem ser os mesmos dos atributos do objeto,
	 * e caso algum nome de indice desse array não existir como atributo, ele é ignorado.
	 * Ex.:
	 *
	 * Se o objeto Model possui os atributos $MATRICULA e $NOME
	 * deve se passar um array com esses nomes de indice => $data = array( 'MATRICULA' => 12345, 'NOME' => 'João' );
	 *
	 * @param array $data Array com os dados para preencher o objeto
	 * @return boolean TRUE|FALSE
	 */
	public function setFromArray( $data = array() )
	{
		if ( $data ) {
			try {
				//guarda as variaveis todas as variaveis do objeto
				$reflection = new ReflectionClass( $this );
				$vars = array_keys( $reflection->getdefaultProperties() );

				//guarda somente as variaveis da classe pai
				$reflection = new ReflectionClass( __CLASS__ );
				$parent_vars = array_keys( $reflection->getdefaultProperties() );

				//percorre todas as variaveis
				foreach ( $vars as $key ) {
					//verifica se a variavel não é da classe pai
					if ( !in_array( $key, $parent_vars ) ) {
						if ( array_key_exists( $key, $data ) ) {
							$this->__set( $key, $data[$key] );
						}
					}
				}
				return true;
			} catch ( Zend_Db_Exception $e ) {
				//Salva erro no Log
				if ( Zend_Registry::isRegistered( 'logger' ) ) {
					Zend_Registry::get( 'logger' )->err( $e->getMessage() );
				}
			}
		}
		return false;
	}

}

?>
