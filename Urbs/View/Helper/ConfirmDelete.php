<?php

class Urbs_View_Helper_ConfirmDelete extends Zend_View_Helper_Abstract
{

	public function confirmDelete( $params = array(), $controller = null, $action = 'delete', $text = '', $description = 'Excluir registro' )
	{
		//verifica se foi passado algum nome de controller, senao tenta pegar o atual
		if ( !$controller ) {
			$controller = $this->view->controller;
		}

		$urlParams = array(
			'module' => Zend_Controller_Front::getInstance()->getRequest()->getModuleName(),
			'controller' => $controller,
			'action' => $action
		);

		if ( !is_array( $params ) ) {
			$params = array(
				'id' => $params
			);
		}

		if ( defined( 'TWITTER_BOOTSTRAP' ) ) { // Verifica se o layout usa bootstrap

			$output = "<a href='#' onClick='confirmDeleteBs(\"" . $this->view->url( array_merge( $urlParams, $params ), null, TRUE ) . "\")' title='" . $description . "'>";
			$output .= '<i class="icon-trash"></i>';
			$output .= $text;
			$output .= '</a>';

		} else {

			$output = "<a href='#' onClick='confirmDelete(\"" . $this->view->url( array_merge( $urlParams, $params ), null, TRUE ) . "\")' title='" . $description . "'>";
			$output .= '<img style="vertical-align: bottom; padding: 0px 5px 0px 5px;" width="18" src="' . INCLUDE_PATH . '/img/delete.png"/> ';
			$output .= $text;
			$output .= '</a>';
		}

		return $output;
	}
}

?>