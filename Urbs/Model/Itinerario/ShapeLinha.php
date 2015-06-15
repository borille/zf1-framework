<?php

require_once 'Urbs/Model/Abstract.php';

/**
 * Objeto que representa o shape de uma linha
 *
 * @category    Urbs
 * @package     Urbs_Model
 * @subpackage  Conscf
 * @name        Urbs_Model_Itinerario_ShapeLinha
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */

//TODO: renomear os getters/setters
class Urbs_Model_Itinerario_ShapeLinha extends Urbs_Model_Abstract
{
	protected $LAT;
	protected $LON;

	public function setLat( $LAT )
	{
		$this->LAT = $LAT;
		return $this;
	}

	public function getLat()
	{
		return $this->LAT;
	}

	public function setLon( $LON )
	{
		$this->LON = $LON;
		return $this;
	}

	public function getLon()
	{
		return $this->LON;
	}

}