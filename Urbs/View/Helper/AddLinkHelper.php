<?php

class Urbs_View_Helper_AddLinkHelper extends Zend_View_Helper_Abstract
{

	public function addLinkHelper( $controller = null, $text = 'Adicionar', $description = 'Incluir novo registro', $id = null )
	{
		//verifica se foi passado algum nome de controller, senao tenta pegar o atual
		if ( !$controller ) {
			$controller = $this->view->controller;
		}

		$module = Zend_Controller_Front::getInstance()->getRequest()->getModuleName();

		if ( $id ) {
			$link = '<a href="' . $this->view->url( array( 'module' => $module, 'controller' => $controller, 'action' => 'add', 'id' => $id ), null, TRUE ) . '" title="' . $description . '">';
		} else {
			$link = '<a href="' . $this->view->url( array( 'module' => $module, 'controller' => $controller, 'action' => 'add' ), null, TRUE ) . '" title="' . $description . '">';
		}

		if ( defined( 'TWITTER_BOOTSTRAP' ) ) // Verifica se o layout usa bootstrap
		{
			$output = $link;
			$output .= '<i class="icon-plus"></i> ';
			$output .= $text;
			$output .= '</a>';
		} else {
			$output = $link;
			$output .= '<p style="margin-bottom: 10px">';
			$output .= '<img style="vertical-align: top" width="20" src="' . INCLUDE_PATH . '/img/add.png"/> ';
			$output .= $text;
			$output .= '</a></p>';
		}

		return $output;
	}

}

?>