<?php

require_once 'Urbs/Db/Table/Abstract.php';

/**
 * Classe que configura a dbTable para acessar ao tablespace ITINERARIO
 *
 * @category    Urbs
 * @package     Urbs_Db
 * @subpackage  Table
 * @name        Urbs_Db_Table_Itinerario
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Db_Table_Itinerario extends Urbs_Db_Table_Abstract
{

	public function __construct()
	{
		$db = Zend_Db::factory( 'ORACLE', array(
			'host' => 'URBS.CURITIBA.PR.GOV.BR',
			'username' => 'ITINERARIO',
			'password' => 'ITINERARIO',
			'dbname' => 'URBS'
		) );

		parent::__construct( $db );
	}

}