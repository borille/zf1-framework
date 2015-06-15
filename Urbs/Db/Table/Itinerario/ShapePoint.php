<?php

require_once 'Urbs/Db/Table/Conscf.php';

/**
 * Classe Db table que acessa a tabela ITINERARIO.SHAPE_POINT
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Itinerario
 * @name        Urbs_Db_Table_Itinerario_ShapePoint
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Itinerario_ShapePoint extends Urbs_Db_Table_Itinerario
{

	public function init()
	{
		parent::configDbTable( 'ITINERARIO', array( 'SP' => 'SHAPE_POINT' ), 'SHAPE_PT_ID' );
	}

	public function getShapeLinha( $idLinha )
	{
		$subSelect = $this->getAdapter()->select();
		$subSelect->from( array( 'S' => 'SHAPE' ), 'SHAPE_ID' )
			->joinLeft( array( 'I' => 'ITINERARY' ), 'S.SHAPE_ID = I.SHAPE_ID', '' )
			->where( "S.SHAPE_NAME NOT LIKE '%Atendimento%'" )
			->where( "S.SHAPE_NAME NOT LIKE '%Especial%'" )
			->where( 'I.IS_TRUNK = ?', 1 )
			->where( 'I.ROUTE_ID = ?', $idLinha );

		$select = $this->getSelect( array( 'SHAPE_PT_LAT AS LAT', 'SHAPE_PT_LON AS LON' ) )
			->where( "SP.SHAPE_ID IN ($subSelect)" )
			->order( array( 'SP.SHAPE_ID', 'SP.SHAPE_PT_ID' ) );

		return $this->returnAll( $select );
	}

}