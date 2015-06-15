<?php

class Urbs_View_Helper_EditLinkHelper extends Zend_View_Helper_Abstract
{

	public function editLinkHelper( $id, $controller = null, $text = '', $description = 'Editar registro' )
	{
		//verifica se foi passado algum nome de controller, senao tenta pegar o atual
		if ( !$controller ) {
			$controller = $this->view->controller;
		}

		if ( defined( 'TWITTER_BOOTSTRAP' ) ) { // Verifica se o layout usa bootstrap

			$output = '<a href="' . $this->view->url( array( 'controller' => $controller, 'action' => 'edit', 'id' => $id ), null, TRUE ) . '" title="' . $description . '">';
			$output .= '<i class="icon-pencil"></i>';
			$output .= $text;
			$output .= '</a>';

		} else {

			$output = '<a href="' . $this->view->url( array( 'controller' => $controller, 'action' => 'edit', 'id' => $id ), null, TRUE ) . '" title="' . $description . '">';
			$output .= '<img style="vertical-align: bottom; padding: 0px 5px 0px 5px;" width="18" src="' . INCLUDE_PATH . '/img/edit.png"/>';
			$output .= $text;
			$output .= '</a>';

		}
		return $output;
	}

}

?>