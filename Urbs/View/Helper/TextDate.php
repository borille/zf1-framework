<?php

class Urbs_View_Helper_TextDate extends Urbs_View_Helper_Text
{

	/**
	 * Helper para criar um campo input Text específico para data (html), já incluindo mascara no campo
	 * @author TRB@2012
	 * @param string $name Nome e Id do Campo
	 * @param string $value Valor do campo
	 * @param array $params Array com os parametros opcionais do campo
	 * @return string Campo formatado
	 */
	public function TextDate( $name, $value = null, $attributes = array(), $mask = '99/99/9999' )
	{
		parent::input( 'text', $name, $attributes );
		$this->setValue( $value );
		$this->setMask( $mask );

		return $this;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		//se for passado alguma máscara, formata o campo
		if ( $this->_mask ) {
			$id = $this->getAttribute( 'id' );
			$mask = $this->_mask;
			$this->view->headScript()->appendScript( "$('#$id').mask('$mask');" );
		}

		$name = $this->getAttribute( 'name' );

		if ( defined( 'TWITTER_BOOTSTRAP' ) ) {

			$output = '<div class="input-append">';
			$output .= '<input' . $this->attributesToHtml() . '/>';
			$output .= "<span class='add-on btn' onClick=\"displayCalendar(document.getElementById('$name'),'dd/mm/yyyy',this)\"><i class='icon-calendar'></i></span>";
			$output .= '</div>';

		} else {

			$output = '<input' . $this->attributesToHtml() . '/>';

			$src = INCLUDE_PATH . '/img/calendar.png';
			$output .= " <img style='vertical-align: bottom; cursor: pointer;' width='25px' src='$src' onClick=\"displayCalendar(document.getElementById('$name'),'dd/mm/yyyy',this)\" target='_self' title='Abrir Calendário'/>";

		}
		return $output;
	}

}

?>