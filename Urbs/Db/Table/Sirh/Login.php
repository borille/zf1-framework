<?php

require_once 'Urbs/Db/Table/Sirh.php';

/**
 * Classe Db table que acessa a view SIRH.VW_LOGIN
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Sirh
 * @name        Urbs_Db_Table_Sirh_Login
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Sirh_Login extends Urbs_Db_Table_Sirh
{

	public function init()
	{
		parent::configDbTable( 'SIRH', 'VW_LOGIN' );
	}

	/**
	 * @param $matricula
	 * @param $senha
	 * @param int $empresa
	 * @return array
	 */
	public function validaLoginSemDigito( $matricula, $senha, $empresa = 1 )
	{
		$select = $this->getSelect()
			->where( 'MATRICULA = ?', $matricula )
			->where( 'EMPRESA = ?', $empresa )
			->where( 'SENHA = SIRH.CRIPTOGRAFA_2(?)', $senha );

		return $this->returnOne( $select );
	}

	/**
	 * @param $matricula
	 * @param $senha
	 * @return array
	 */
	public function validaLoginComDigito( $matricula, $senha )
	{
		$select = $this->getSelect()
			->where( 'MATRICULA_TOTAL = ?', $matricula )
			->where( 'SENHA = SIRH.CRIPTOGRAFA_2(?)', $senha );

		return $this->returnOne( $select );
	}
}