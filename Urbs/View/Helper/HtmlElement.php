<?php

class Urbs_View_Helper_HtmlElement extends Zend_View_Helper_HtmlElement
{
	/**
	 * @var array
	 */
	protected $_attributes = array();

	/**
	 * @param array $attributes
	 */
	public function setAttributes( $attributes )
	{
		if ( is_array( $attributes ) ) {
			$this->_attributes = $attributes;
		}
		return $this;
	}

	/**
	 * @return array
	 */
	public function getAttributes()
	{
		return $this->_attributes;
	}

	/**
	 * @param string $attribute
	 * @param string $value
	 * @return $this
	 */
	public function setAttribute( $attribute, $value )
	{
		$this->_attributes[$attribute] = $value;
		return $this;
	}

	/**
	 * @param string $attribute
	 * @return bool
	 */
	public function getAttribute( $attribute )
	{
		if ( isset( $this->_attributes[$attribute] ) ) {
			return $this->_attributes[$attribute];
		} else {
			return null;
		}
	}

	/**
	 * Converts an associative array to a string of tag attributes.
	 *
	 * @return string
	 */
	public function attributesToHtml()
	{
		return $this->_htmlAttribs( $this->_attributes );
	}
}

?>