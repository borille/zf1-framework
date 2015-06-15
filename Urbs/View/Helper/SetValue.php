<?php

class Urbs_View_Helper_SetValue extends Zend_View_Helper_Abstract
{

	/**
	 * Helper para setar o valor de um campo (html)
	 * @author TRB@2012
	 * @param string $id Id do Campo
	 * @param string $value Valor do campo
	 * @param boolean $html Se � para alterar o valor do HTML do campo
	 */
	public function setValue( $id, $value = null, $html = false )
	{
		if ( defined( 'TWITTER_BOOTSTRAP' ) ) {
			if ( $html ) {
				$this->view->headScript()->appendScript( "$('#$id').html('$value');" );
			} else {
				$this->view->headScript()->appendScript( "$('#$id').val('$value');" );
			}
		} else {
			if ( $html ) {
				echo "<script type='text/javascript'>document.getElementById('$id').innerHTML = '$value'</script>";
			} else {
				echo "<script type='text/javascript'>document.getElementById('$id').value = '$value'</script>";
			}
		}

	}

}

?>