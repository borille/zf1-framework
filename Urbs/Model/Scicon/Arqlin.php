<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa uma linha da tabela SCI_CON.ARQLIN
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Conscf
 * @name        Urbs_Model_Scicon_Arqlin
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */

//TODO: renomear os getters/setters
class Urbs_Model_Scicon_Arqlin extends Urbs_Model_Abstract
{
	protected $LINHCODI;
	protected $LINHNOME;
	protected $EMPRESA;
	protected $TIPO;
	protected $STATUS;

	public function setEMPRESA( $EMPRESA )
	{
		$this->EMPRESA = $EMPRESA;
		return $this;
	}

	public function getEMPRESA()
	{
		return $this->EMPRESA;
	}

	public function setLINHCODI( $LINHCODI )
	{
		$this->LINHCODI = $LINHCODI;
		return $this;
	}

	public function getLINHCODI()
	{
		return $this->LINHCODI;
	}

	public function setLINHNOME( $LINHNOME )
	{
		$this->LINHNOME = $LINHNOME;
		return $this;
	}

	public function getLINHNOME()
	{
		return $this->LINHNOME;
	}

	public function setSTATUS( $STATUS )
	{
		$this->STATUS = $STATUS;
		return $this;
	}

	public function getSTATUS()
	{
		return $this->STATUS;
	}

	public function setTIPO( $TIPO )
	{
		$this->TIPO = $TIPO;
		return $this;
	}

	public function getTIPO()
	{
		return $this->TIPO;
	}

}