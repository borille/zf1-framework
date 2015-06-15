<?php

class Urbs_View_Helper_Submit extends Urbs_View_Helper_Button
{

	public function submit( $value = 'OK', $name = null, $attributes = array() )
	{
		parent::button( $value, $name, $attributes );
		return $this;
	}

	/**
	 * @return string
	 */
	public function render()
	{
		if ( $this->_html ) {
			$output = '<submit ' . $this->attributesToHtml() . '>' . $this->_html . '</submit>';
		} else {
			$output = '<input type="submit"' . $this->attributesToHtml() . '/>';
		}
		return $output;
	}
}

?>