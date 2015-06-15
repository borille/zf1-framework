<?php
/**
 * Classe Db table que acessa a tabela PORTAL.PBDR_TB021_VW_LOGIN_X_TB020_MO
 *
 * @category    Urbs
 * @package     Urbs_Db_Table
 * @subpackage  Portal
 * @name        Urbs_Db_Table_Portal_Publicador
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */

class Urbs_Db_Table_Portal_Publicador extends Urbs_Db_Table_Portal
{

	public function init()
	{
		parent::configDbTable( 'PORTAL', 'PBDR_TB021_VW_LOGIN_X_TB020_MO', array( 'PBDR_TB020_COD_MODULO', 'MATRICULA' ) );
	}

	/**
	 * @param $matricula
	 * @param $modulo
	 * @return string
	 */
	public function getPermissaoNoModulo( $matricula, $modulo )
	{
		$result = $this->getId( array( $modulo, $matricula ), 'PBDR_TB021_PERMISSAO' );
		return $result['PBDR_TB021_PERMISSAO'];
	}

}