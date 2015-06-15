<?php

/**
 * Retorna uma tag HTML <a href> de acordo com os parametros passados
 * @author TRB@2013
 * @version 1.0
 */
class Urbs_View_Helper_Add extends Urbs_View_Helper_Link
{

	/**
	 * @param string $html          Conteúdo da tag
	 * @param array $params         Parametros da URL
	 * @param array $attributes     Atributos HTML da tag <a>
	 * @return string               Tag HTML <a>
	 */
	public function add( $html = 'Adicionar', $params = array(), $attributes = array() )
	{
		if ( !isset( $params['module'] ) ) {
			$params['module'] = Zend_Controller_Front::getInstance()->getRequest()->getModuleName();
		}

		if ( !isset( $params['controller'] ) ) {
			$params['controller'] = Zend_Controller_Front::getInstance()->getRequest()->getControllerName();
		}

		if ( !isset( $params['action'] ) ) {
			$params['action'] = 'add';
		}

		$this->setHtml( $html );
		$this->setAttributes( $attributes );
		$this->setParams( $params );

		return $this;
	}

	/**
	 * @return string
	 */
	public function render()
	{
		$this->setUrl( array_merge( array( 'module' => $this->_module, 'controller' => $this->_controller, 'action' => $this->_action ), $this->_params ) );
		$attributes = $this->attributesToHtml();

		if ( defined( 'TWITTER_BOOTSTRAP' ) ) // Verifica se o layout usa bootstrap
		{
			$output = "<a $attributes>";
			$output .= '<i class="icon-plus"></i> ';
			$output .= $this->_html;
			$output .= '</a>';
		} else {
			$output = "<a $attributes>";
			$output .= '<p style="margin-bottom: 10px">';
			$output .= '<img style="vertical-align: top" width="20" src="' . INCLUDE_PATH . '/img/add.png"/> ';
			$output .= $this->_html;
			$output .= '</a></p>';
		}

		return $output;
	}

}

?>