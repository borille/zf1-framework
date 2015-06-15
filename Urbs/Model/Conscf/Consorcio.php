<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela CON_SCF.TB0206_CONSORCIO
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Conscf
 * @name        Urbs_Model_Conscf_Consorcio
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */

//TODO: renomear os getters/setters
class Urbs_Model_Conscf_Consorcio extends Urbs_Model_Abstract
{
	protected $TB0206_COD_CONSORCIO;
	protected $TB0206_NOME_CONSORCIO;

	public function setTB0206CODCONSORCIO( $TB0206_COD_CONSORCIO )
	{
		$this->TB0206_COD_CONSORCIO = $TB0206_COD_CONSORCIO;
		return $this;
	}

	public function getTB0206CODCONSORCIO()
	{
		return $this->TB0206_COD_CONSORCIO;
	}

	public function setTB0206NOMECONSORCIO( $TB0206_NOME_CONSORCIO )
	{
		$this->TB0206_NOME_CONSORCIO = $TB0206_NOME_CONSORCIO;
		return $this;
	}

	public function getTB0206NOMECONSORCIO()
	{
		return $this->TB0206_NOME_CONSORCIO;
	}

	public function getTipoConsorcio()
	{
		switch ( $this->getTB0206CODCONSORCIO() ) {
			case 1:
			case 2:
			case 3:
				return 1;
				break;
			case 4:
			case 5:
				return 2;
				break;
			default:
				return 0;
				break;
		}
	}

}