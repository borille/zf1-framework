<?php

/**
 * Retorna uma tag HTML <a href> de acordo com os parametros passados
 * @author TRB@2013
 * @version 1.1
 */
class Urbs_View_Helper_Link extends Urbs_View_Helper_HtmlElement
{

	protected $_html;
	protected $_module;
	protected $_controller;
	protected $_action;
	protected $_params;

	/**
	 * @param string $html          Conteúdo da tag
	 * @param string $controller    Nome do Controller
	 * @param string $action        Nome da Action
	 * @param array $params         Parametros da URL
	 * @param array $attributes     Atributos HTML da tag <a>
	 * @return string               Tag HTML <a>
	 */
	public function link( $html = 'link', $controller = null, $action = 'index', $params = array(), $attributes = array() )
	{
		$this->_html = $html;
		$this->setAttributes( $attributes );

		$this->_module = Zend_Controller_Front::getInstance()->getRequest()->getModuleName();

		//verifica se foi passado algum nome de controller, senao tenta pegar o atual
		if ( !$controller ) {
			$this->_controller = Zend_Controller_Front::getInstance()->getRequest()->getControllerName();
		} else {
			$this->_controller = $controller;
		}

		$this->_action = $action;
		$this->_params = $params;

		return $this;
	}

	/**
	 * @param string|array $url
	 * @return $this
	 */
	public function setUrl( $url )
	{
		if ( is_array( $url ) ) {
			$url = $this->view->url( $url, null, TRUE );
		}
		$this->setAttribute( 'href', $url );
		return $this;
	}

	/**
	 * @param $html
	 * @return $this
	 */
	public function setHtml( $html )
	{
		$this->_html = $html;
		return $this;
	}

	/**
	 * @param $module string
	 * @return $this
	 */
	public function setModule( $module )
	{
		$this->_module = $module;
		return $this;
	}

	/**
	 * @param $controller string
	 * @return $this
	 */
	public function setController( $controller )
	{
		$this->_controller = $controller;
		return $this;
	}

	/**
	 * @param $action string
	 * @return $this
	 */
	public function setAction( $action )
	{
		$this->_action = $action;
		return $this;
	}

	/**
	 * @param $params array
	 * @return $this
	 */
	public function setParams( $params )
	{
		$this->_params = $params;
		return $this;
	}

	/**
	 * @return string
	 */
	public function render()
	{
		//verificar se ainda não foi configurada a url
		if ( $this->getAttribute( 'href' ) == '' ) {
			$this->setUrl( array_merge( array( 'module' => $this->_module, 'controller' => $this->_controller, 'action' => $this->_action ), $this->_params ) );
		}
		$attributes = $this->attributesToHtml();
		$output = "<a $attributes>$this->_html</a>";
		return $output;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->render();
	}

}

?>