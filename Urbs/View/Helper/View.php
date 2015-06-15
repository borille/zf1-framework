<?php

class Urbs_View_Helper_View extends Zend_View_Helper_Abstract
{

	/**
	 * Helper que cria um link e desenha uma imagem de visualização
	 *
	 * @param array|string $params Array de parametros ou valor do parametro
	 * @param string $controller Nome do controller (padrão é o atual)
	 * @param string $text Texto para exibir ao lado do link
	 * @param string $description Descrição quando posicionar o mouse sobre o link
	 * @return string
	 */
	public function view( $params = array(), $controller = null, $text = '', $description = 'Visualizar registro' )
	{
		//verifica se foi passado algum nome de controller, senao tenta pegar o atual
		if ( !$controller ) {
			$controller = $this->view->controller;
		}

		$urlParams = array(
			'module' => Zend_Controller_Front::getInstance()->getRequest()->getModuleName(),
			'controller' => $controller,
			'action' => 'view'
		);

		if ( !is_array( $params ) ) {
			$params = array(
				'id' => $params
			);
		}

		$output = '<a href="' . $this->view->url( array_merge( $urlParams, $params ), null, TRUE ) . '" title="' . $description . '">';

		if ( defined( 'TWITTER_BOOTSTRAP' ) ) { // Verifica se o layout usa bootstrap
			$output .= '<i class="icon-search"></i>';
		} else {
			$output .= '<img style="vertical-align: bottom; padding: 0px 5px 0px 5px;" width="18" src="' . INCLUDE_PATH . '/img/view.png"/>';
		}

		$output .= $text;
		$output .= '</a>';

		return $output;
	}
}

?>