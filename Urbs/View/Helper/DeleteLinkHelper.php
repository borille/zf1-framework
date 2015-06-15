<?php

class Urbs_View_Helper_DeleteLinkHelper extends Zend_View_Helper_Abstract
{

	public function deleteLinkHelper( $id, $controller = null, $text = '', $description = 'Excluir registro' )
	{
		//verifica se foi passado algum nome de controller, senao tenta pegar o atual
		if ( !$controller ) {
			$controller = $this->view->controller;
		}

		if ( defined( 'TWITTER_BOOTSTRAP' ) ) { // Verifica se o layout usa bootstrap

			$output = '<a href="' . $this->view->url( array( 'controller' => $controller, 'action' => 'delete', 'id' => $id ), null, TRUE ) . '" title="' . $description . '">';
			$output .= '<i class="icon-trash"></i>';
			$output .= $text;
			$output .= '</a>';

		} else {

			$output = '<a href="' . $this->view->url( array( 'controller' => $controller, 'action' => 'delete', 'id' => $id ), null, TRUE ) . '" title="' . $description . '">';
			$output .= '<img style="vertical-align: bottom; padding: 0px 5px 0px 5px;" width="18" src="' . INCLUDE_PATH . '/img/delete.png"/> ';
			$output .= $text;
			$output .= '</a>';

		}
		return $output;
	}

}

?>