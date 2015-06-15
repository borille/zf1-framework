<?php

require_once 'Urbs/Service/Abstract.php';

/**
 * Classe com m�todos comuns para todas as filhas de Urbs_Service_Sirh
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @name        Urbs_Service_Sirh
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

abstract class Urbs_Service_Sirh extends Urbs_Service_Abstract
{
	/**
	 * M�todo para validar a matr�cula
	 * Padr�es v�lidos => 99999 ou 99999-9 ou 99999-X
	 *
	 * @param string $matricula
	 */
	public function validarMatricula( $matricula )
	{
		$matricula = trim( strtoupper( $matricula ) );

		if ( !is_numeric( $matricula ) ) {
			$valida = preg_match( "/^[0-9]{5}-[X0-9]{1}$/", $matricula );
		} else {
			$valida = preg_match( "/^[0-9]{5}$/", $matricula );
		}

		if ( !$valida ) {
			throw new Exception( "A matr�cula com digito: $matricula n�o � v�lida!" );
		}
		return $matricula;
	}

	/**
	 * Verifica se a verba informada � v�lida
	 *
	 * @param $verba
	 * @return int|string
	 * @throws Exception
	 */
	public function validarVerba( $verba )
	{
		if ( !is_numeric( $verba ) || ( strlen( $verba ) != 7 ) ) {
			throw new Exception( 'C�digo da verba � inv�lido!' );
		}
		return $verba;
	}
}