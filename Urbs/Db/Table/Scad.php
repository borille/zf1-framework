<?php

require_once 'Urbs/Db/Table/Abstract.php';

/**
 * Classe que configura a dbTable para acessar ao tablespace SCAD
 *
 * @category    Urbs
 * @package     Urbs_Db
 * @subpackage  Table
 * @name        Urbs_Db_Table_Scad
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Db_Table_Scad extends Urbs_Db_Table_Abstract
{

	public function __construct()
	{
		$db = Zend_Db::factory( 'ORACLE', array(
			'host' => 'DESENV.CURITIBA.PR.GOV.BR',
			'username' => 'SCAD',
			'password' => 'DESENV',
			'dbname' => 'DESENV'
		) );

		parent::__construct( $db );
	}

}