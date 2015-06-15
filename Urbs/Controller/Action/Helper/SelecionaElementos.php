<?php

/**
 * Class Urbs_Controller_Action_Helper_CalculaDistancia
 */
class Urbs_Controller_Action_Helper_SelecionaElementos extends Zend_Controller_Action_Helper_Abstract
{

	/**
	 * Seleciona N elementos do Array
	 *
	 * @param $array
	 * @param $numero
	 * @return array
	 */
	function direct( $array, $numero )
	{
		$result = array();

		$step = ( sizeof( $array ) - 1 ) / ( $numero - 1 );

		for ( $i = 0; $i < $numero; $i++ ) {
			$result[] = $array[round( $step * $i )];
		}

		return $result;
	}

}
