<?php

class Urbs_View_Helper_PrintLinkHelper extends Zend_View_Helper_Abstract
{

	public function printLinkHelper( $id, $controller = null, $text = '', $description = 'Imprimir' )
	{
		//verifica se foi passado algum nome de controller, senao tenta pegar o atual
		if ( !$controller ) {
			$controller = $this->view->controller;
		}

		if ( defined( 'TWITTER_BOOTSTRAP' ) ) { // Verifica se o layout usa bootstrap

			$output = '<a href="' . $this->view->url( array( 'controller' => $controller, 'action' => 'print', 'id' => $id ), null, TRUE ) . '" title="' . $description . '" target="_blank">';
			$output .= '<i class="icon-print"></i>';
			$output .= $text;
			$output .= '</a>';

		} else {

			$output = '<a href="' . $this->view->url( array( 'controller' => $controller, 'action' => 'print', 'id' => $id ), null, TRUE ) . '" title="' . $description . '" target="_blank">';
			$output .= '<img style="vertical-align: bottom; padding: 0px 5px 0px 5px;" width="19" src="' . INCLUDE_PATH . '/img/print.png"/>';
			$output .= $text;
			$output .= '</a>';

		}

		return $output;
	}

}

?>