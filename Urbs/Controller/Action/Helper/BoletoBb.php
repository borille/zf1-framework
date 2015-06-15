<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tborille
 * Date: 24/04/14
 * Time: 14:37
 * To change this template use File | Settings | File Templates.
 */

class Urbs_Controller_Action_Helper_BoletoBb extends Zend_Controller_Action_Helper_Abstract
{

	function direct( $id )
	{
		$view = Zend_Controller_Front::getInstance()->getParam( 'bootstrap' )->bootstrap( 'view' )->getResource( 'view' );
		$url = $view->serverUrl() . "/SIRU/cadastro/boletoUrbs/boletoBB/boletoBB.php?codigo=$id";

		Zend_Controller_Action_HelperBroker::getStaticHelper( 'Redirector' )->gotoUrl( $url );
	}

}