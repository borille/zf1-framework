<?php

class Urbs_View_Helper_SearchForm extends Urbs_View_Helper_HtmlElement
{
	/**
	 * View Helper para criar um form de busca
	 *
	 * @param string $value
	 * @param string $placeholder
	 * @return string
	 */
	public function searchForm( $value = '', $placeholder = '' )
	{
		$this->setAttribute( 'value', $value );
		$this->setAttribute( 'placeholder', $placeholder );
		$this->setAttribute( 'method', 'post' );

		return $this;
	}

	/**
	 * @return string
	 */
	public function render()
	{
		$placeholder = $this->getAttribute( 'placeholder' );
		$value = $this->getAttribute( 'value' );
		$method = $this->getAttribute( 'method' );

		$html = "<form method='$method'>
					<div class='input-append'>
						<input class='span4' id='txt-search' name='txt-search' type='text' value='$value'
						       placeholder='$placeholder' style='text-transform: uppercase'>
						<button class='btn' type='submit' name='btn-action' value='ok'>
							" . $this->view->icon( 'search' ) . " Ok
						</button>
						<button class='btn' type='submit' name='btn-action' value='clear'>
							" . $this->view->icon( 'remove' ) . " Limpar
						</button>
					</div>
				</form>";

		return $html;
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