<?php

class Urbs_View_Helper_Input extends Urbs_View_Helper_HtmlElement
{
	/**
	 * Helper para criar um campo Button (html)
	 * @author TRB@2012
	 * @param string $name Nome e Id do Campo
	 * @param string $value Valor do campo
	 * @param array $attributes Array com os parametros opcionais do campo
	 * @return string Campo formatado
	 */
	public function Input( $type, $name = null, $attributes = array() )
	{
		$this->setAttributes( $attributes );
		$this->setAttribute( 'type', $type );
		$this->setAttribute( 'name', $name );
		return $this;
	}

	/**
	 * @return string
	 */
	public function render()
	{
		$output = '<input' . $this->attributesToHtml() . '/>';
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
	 * @param $name
	 * @return $this
	 */
	public function setName( $name )
	{
		$this->setAttribute( 'name', $name );
		return $this;
	}

	/**
	 * @param $id
	 * @return $this
	 */
	public function setId( $id )
	{
		$this->setAttribute( 'id', $id );
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setValue( $value )
	{
		$this->setAttribute( 'value', $value );
		return $this;
	}

}

?>