<?php

class Urbs_View_Helper_ViewLinkHelper extends Zend_View_Helper_Abstract
{

	public function viewLinkHelper( $id, $controller = null, $text = '', $description = 'Visualizar registro' )
	{
		//verifica se foi passado algum nome de controller, senao tenta pegar o atual
		if ( !$controller ) {
			$controller = $this->view->controller;
		}

		if ( defined( 'TWITTER_BOOTSTRAP' ) ) { // Verifica se o layout usa bootstrap

			$output = '<a href="' . $this->view->url( array( 'controller' => $controller, 'action' => 'view', 'id' => $id ), null, TRUE ) . '" title="' . $description . '">';
			$output .= '<i class="icon-search"></i>';
			$output .= $text;
			$output .= '</a>';

		} else {

			$output = '<a href="' . $this->view->url( array( 'controller' => $controller, 'action' => 'view', 'id' => $id ), null, TRUE ) . '" title="' . $description . '">';
			$output .= '<img style="vertical-align: bottom; padding: 0px 5px 0px 5px;" width="18" src="' . INCLUDE_PATH . '/img/view.png"/> ';
			$output .= $text;
			$output .= '</a>';
		}

		return $output;
	}

}

?>