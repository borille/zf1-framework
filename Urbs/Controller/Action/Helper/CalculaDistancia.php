<?php

/**
 * Class Urbs_Controller_Action_Helper_CalculaDistancia
 */
class Urbs_Controller_Action_Helper_CalculaDistancia extends Zend_Controller_Action_Helper_Abstract
{

	/**
	 * Calcula a distancia em km entre duas coordenadas geográficas
	 * Fórmula de Haversine
	 *
	 * @param $lat1 latidude inicial
	 * @param $lon1 longitude inicial
	 * @param $lat2 latidude final
	 * @param $lon2 longitude final
	 * @return float
	 */

	function direct( $lat1, $lon1, $lat2, $lon2 )
	{
		return ( 6371 * 3.14159 * sqrt( ( $lat2 - $lat1 ) * ( $lat2 - $lat1 ) + cos( $lat2 / 57.29578 ) * cos( $lat1 / 57.29578 ) * ( $lon2 - $lon1 ) * ( $lon2 - $lon1 ) ) / 180 );
	}

}
