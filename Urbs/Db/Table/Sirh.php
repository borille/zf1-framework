<?php

require_once 'Urbs/Db/Table/Abstract.php';

/**
 * Classe que configura a dbTable para acessar ao tablespace SIRH
 *
 * @category    Urbs
 * @package     Urbs_Db
 * @subpackage  Table
 * @name        Urbs_Db_Table_Sirh
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Db_Table_Sirh extends Urbs_Db_Table_Abstract
{

	public function __construct()
	{
		$db = Zend_Db::factory( 'ORACLE', array(
			'host' => 'URBS.CURITIBA.PR.GOV.BR',
			'username' => 'SIRH',
			'password' => 'SIRH',
			'dbname' => 'URBS'
		) );

		parent::__construct( $db );
	}

}