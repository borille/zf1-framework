<?php

class Urbs_View_Helper_AlertMessages extends Zend_View_Helper_Abstract
{

	public function alertMessages()
	{
		$flashMessenger = Zend_Controller_Action_HelperBroker::getStaticHelper( 'FlashMessenger' );

		$output = '';

		if ( !empty( $flashMessenger ) ) {

			if ( defined( 'TWITTER_BOOTSTRAP' ) ) {
				$closeButton = '<button type="button" class="close" data-dismiss="alert">×</button>';
			} else {
				$closeButton = '';
			}

			if ( $flashMessenger->setNamespace( 'success' )->hasMessages() ) {
				foreach ( $flashMessenger->getMessages() as $msg ) {
					$output .= '<div class="alert alert-success fade in">';
					$output .= $closeButton;
					$output .= '<b>' . $msg . '</b>';
					$output .= '</div>';
				}
			}

			if ( $flashMessenger->setNamespace( 'error' )->hasMessages() ) {
				foreach ( $flashMessenger->getMessages() as $msg ) {
					$output .= '<div class="alert alert-error fade in">';
					$output .= $closeButton;
					$output .= '<b>' . $msg . '</b>';
					$output .= '</div>';
				}
			}

			if ( $flashMessenger->setNamespace( 'notice' )->hasMessages() ) {
				foreach ( $flashMessenger->getMessages() as $msg ) {
					$output .= '<div class="alert fade in">';
					$output .= $closeButton;
					$output .= '<b>' . $msg . '</b>';
					$output .= '</div>';
				}
			}

			if ( $flashMessenger->setNamespace( 'info' )->hasMessages() ) {
				foreach ( $flashMessenger->getMessages() as $msg ) {
					$output .= '<div class="alert alert-info fade in">';
					$output .= $closeButton;
					$output .= '<b>' . $msg . '</b>';
					$output .= '</div>';
				}
			}
		}

		return $output;
	}

}

?>
