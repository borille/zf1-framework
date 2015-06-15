<?php
/**
 * Classe com métodos comuns para CRUD na tabela ITINERARIO.SHAPE_POINT
 *
 * @category    Urbs
 * @package     Urbs_Service
 * @subpackage  Sirh
 * @name        Urbs_Service_Itinerario_ShapePoint
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Service_Itinerario_ShapePoint extends Urbs_Service_Itinerario implements Urbs_Service_Interface
{

	/**
	 * @var Urbs_Service_Itinerario_ShapePoint
	 */
	protected static $_instance = null;

	/**
	 * @var Urbs_Db_Table_Itinerario_ShapePoint
	 */
	protected $_repository = null;

	/**
	 * @return Urbs_Service_Itinerario_ShapePoint
	 */
	public static function getInstance()
	{
		if ( self::$_instance === NULL ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * @return Urbs_Db_Table_Itinerario_ShapePoint
	 */
	function getRepository()
	{
		if ( $this->_repository === null ) {
			$this->_repository = new Urbs_Db_Table_Itinerario_ShapePoint();
		}
		return $this->_repository;
	}

	/**
	 * Retorna o shape da linha
	 *
	 * @param bool $toObject
	 * @return array|Urbs_Model_Itinerario_ShapeLinha
	 */
	public function getShapeLinha( $idLinha, $toObject = true )
	{
		$result = $this->getRepository()->getShapeLinha( $idLinha );

		if ( $toObject ) {
			require_once 'Urbs/Model/Itinerario/ShapeLinha.php';
			$list = array();
			foreach ( $result as $row ) {
				$model = new Urbs_Model_Itinerario_ShapeLinha( $row );
				$list[] = $model;
			}
			$result = $list;
		}

		return $result;
	}

}