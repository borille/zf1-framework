<?php

class Urbs_View_Helper_Text extends Urbs_View_Helper_Input
{

	/**
	 * @var string
	 */
	protected $_mask;

	/**
	 * Helper para criar um campo input Text (html)
	 * @author TRB@2012
	 * @param string $name Nome e Id do Campo
	 * @param string $value Valor do campo
	 * @param array $attributes Array com os parametros opcionais do campo
	 * @param string $mask Máscara para o campo
	 * @return string Campo formatado
	 */
	public function Text( $name, $value = null, $attributes = array(), $mask = null )
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

		return parent::__toString();
	}

	/**
	 * @param $mask
	 */
	public function setMask( $mask )
	{
		if ( !$this->getAttribute( 'id' ) ) {
			$this->setId( $this->getAttribute( 'name' ) );
		}

		$this->_mask = $mask;
		return $this;
	}

}

?>