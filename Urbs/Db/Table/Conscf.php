<?php

require_once 'Urbs/Db/Table/Abstract.php';

/**
 * Classe que configura a dbTable para acessar ao tablespace CON_SCF
 *
 * @category    Urbs
 * @package     Urbs_Db
 * @subpackage  Table
 * @name        Urbs_Db_Table_Conscf
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Db_Table_Conscf extends Urbs_Db_Table_Abstract
{

	public function __construct()
	{
		$db = Zend_Db::factory( 'ORACLE', array(
			'host' => 'URBS.CURITIBA.PR.GOV.BR',
			'username' => 'CON_SCF',
			'password' => 'CON_SCF',
			'dbname' => 'URBS'
		) );

		parent::__construct( $db );
	}

}