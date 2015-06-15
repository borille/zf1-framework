<?php

class Urbs_View_Helper_SetMask extends Zend_View_Helper_Abstract
{

	/**
	 * Helper para setar a mascara de um campo (html)
	 * @author TRB@2012
	 * @param string $id Id do Campo
	 * @param string $mask Máscara do campo
	 */
	public function setMask( $id, $mask = null )
	{
		if ( defined( 'TWITTER_BOOTSTRAP' ) ) {
			$this->view->headScript()->appendScript( "$('#$id').mask('$mask');" );
		} else {
			echo "<script type='text/javascript'>$(\"#$id\").mask(\"$mask\");</script>";
		}

	}
}

?>