<?php

class Urbs_View_Helper_FlashMessages extends Zend_View_Helper_Abstract
{

	public function flashMessages()
	{
		$flashMessenger = Zend_Controller_Action_HelperBroker::getStaticHelper( 'FlashMessenger' );

		if ( $flashMessenger->setNamespace( 'default' )->hasMessages() ) {
			$messages = $flashMessenger->setNamespace( 'default' )->getMessages();
		}

		if ( $flashMessenger->setNamespace( 'success' )->hasMessages() ) {
			$messages = $flashMessenger->setNamespace( 'success' )->getMessages();
		}

		$output = '';

		if ( !empty( $messages ) ) {

			$output = '<div id="message">';
			foreach ( $messages as $message ) {
				$output .= '<p>' . $message . '</p>';
			}
			$output .= '</div>';
			$output .= "<script type='text/javascript'>jQuery('#message').slideDown(500)</script>";
		}

		return $output;
	}

}

?>
