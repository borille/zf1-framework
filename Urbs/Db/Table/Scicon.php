<?php

require_once 'Urbs/Db/Table/Abstract.php';

/**
 * Classe que configura a dbTable para acessar ao tablespace SCI_CON
 *
 * @category    Urbs
 * @package     Urbs_Db
 * @subpackage  Table
 * @name        Urbs_Db_Table_Scicon
 * @copyright   Copyright (c) 2014 - URBS
 * @version     1.0
 */
class Urbs_Db_Table_Scicon extends Urbs_Db_Table_Abstract
{

	public function __construct()
	{
		$db = Zend_Db::factory( 'ORACLE', array(
			'host' => 'URBS.CURITIBA.PR.GOV.BR',
			'username' => 'SCI_CON',
			'password' => 'SCI_CON',
			'dbname' => 'URBS'
		) );

		parent::__construct( $db );
	}

}