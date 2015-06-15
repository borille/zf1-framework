<?php

class Urbs_View_Helper_Button extends Urbs_View_Helper_HtmlElement
{

	protected $_html;

	/**
	 * Helper para criar um campo Button (html)
	 * @author TRB@2012
	 * @param string $name Nome e Id do Campo
	 * @param string $value Valor do campo
	 * @param array $attributes Array com os parametros opcionais do campo
	 * @return string Campo formatado
	 */
	public function Button( $value = 'OK', $name = null, $attributes = array() )
	{
		$this->setAttributes( $attributes );

		if ( $value ) {
			$this->setAttribute( 'value', $value );
		} else {
			$this->setHtml( 'OK' );
		}

		if ( $name ) {
			$this->setAttribute( 'name', $name );
			$this->setAttribute( 'id', $name );
		}

		if ( defined( 'TWITTER_BOOTSTRAP' ) ) // Verifica se o layout usa bootstrap
		{
			if ( ( $class = $this->getAttribute( 'class' ) ) ) {
				$this->setAttribute( 'class', 'btn ' . $class );
			} else {
				$this->setAttribute( 'class', 'btn' );
			}
		}
		return $this;
	}

	/**
	 * @return string
	 */
	public function render()
	{
		if ( $this->_html ) {
			$output = '<button ' . $this->attributesToHtml() . '>' . $this->_html . '</button>';
		} else {
			$output = '<input type="button"' . $this->attributesToHtml() . '/>';
		}
		return $output;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->render();
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setHtml( $html )
	{
		$this->_html = $html;
		return $this;
	}

	/**
	 * @param string $type
	 * @return $this
	 */
	public function setType( $type )
	{
		if ( strpos( $type, 'btn-' ) === false ) {
			$type = 'btn-' . $type;
		}

		if ( isset( $this->_attributes['class'] ) ) {
			$this->_attributes['class'] = $this->_attributes['class'] . ' ' . $type;
		} else {
			$this->_attributes['class'] = $type;
		}

		return $this;
	}

}

?>