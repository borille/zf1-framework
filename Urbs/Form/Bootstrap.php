<?php

require_once 'EasyBib/Form.php';

class Urbs_Form_Bootstrap extends EasyBib_Form
{

//--------------------------------------------------------------------------
	public function __construct( $options = null )
	{
		$this->setMethod( 'post' );
		$this->setAttrib( 'class', 'form row-fluid' );
		parent::__construct( $options );
		EasyBib_Form_Decorator::setFormDecorator( $this, EasyBib_Form_Decorator::BOOTSTRAP );
	}

	/**
	 * Retorna um campo input com mascara e calendário
	 * @param string $name      Nome do campo
	 * @param string $format    Formato da Data
	 * @param string $mask      Máscara para a Data
	 * @param boolean $calendar Exibir o calendário
	 * @return \Zend_Form_Element_Text
	 */
	public function createDate( $name, $label = '', $format = 'dd/MM/yyyy', $mask = '99/99/9999', $calendar = true )
	{
		if ( $calendar ) {
			$calendar = "<span class='add-on btn' onClick=\"displayCalendar(document.getElementById('$name'),'dd/mm/yyyy',this)\"><i class='icon-calendar'></i></span>";
		}

		if ( $mask ) {
			$mask = "jQuery(function($){ $(\"#$name\").mask(\"$mask\");});";
			$view = Zend_Controller_Front::getInstance()->getParam( 'bootstrap' )->bootstrap( 'view' )->getResource( 'view' );
			$view->headScript()->appendScript( $mask );
		}

		$element = new Zend_Form_Element_Text( $name );
		$element->setDescription( $calendar )
			->setAttrib( 'style', 'width: 100px' )
			->setLabel( $label )
			->setAttrib( 'decorator', '_DateElementDecorator' )
			->addValidator( new Zend_Validate_Date( array( 'locale' => 'pt_BR', 'format' => $format ) ) );

		return $element;
	}

	/**
	 *
	 * @param Zend_Form_Element $element
	 * @param string $mask
	 */
	public function setMask( $element, $mask )
	{
		if ( $mask ) {
			$name = $element->getName();
			$script = "jQuery(function($){ $(\"#$name\").mask(\"$mask\");});";
			$view = Zend_Controller_Front::getInstance()->getParam( 'bootstrap' )->bootstrap( 'view' )->getResource( 'view' );
			$view->headScript()->appendScript( $script );
		}
		return $this;
	}

	/**
	 * @param Zend_Form_Element $element
	 * @param $icon
	 * @return Zend_Form_Element
	 */
	public function addPrependIcon( $element, $icon )
	{
		$element->setAttrib( 'decorator', '_PrependIconDecorator' )
			->setDescription( "<span class='add-on'><i class='$icon'></i></span>" );

		return $element;
	}

	/**
	 * @param Zend_Form_Element $element
	 * @param $icon
	 * @return Zend_Form_Element
	 */
	public function addAppendIcon( $element, $icon )
	{
		$element->setAttrib( 'decorator', '_AppendIconDecorator' )
			->setDescription( "<span class='add-on'><i class='$icon'></i></span>" );

		return $element;
	}

	/**
	 * Retorna um campo color picker do twitter bootstrap
	 * @param string $name      Nome do campo
	 * @param string $label     Label do campo
	 * @return \Zend_Form_Element_Text
	 */
	public function createColorPicker( $name, $label = '' )
	{
		$view = Zend_Controller_Front::getInstance()->getParam( 'bootstrap' )->bootstrap( 'view' )->getResource( 'view' );
		$view->headLink()->appendStylesheet( INCLUDE_PATH . '/pick-a-color/build/1.1.8/css/pick-a-color-1.1.8.min.css' );
		$view->headScript()->appendFile( INCLUDE_PATH . '/pick-a-color/build/1.1.8/js/pick-a-color-1.1.8.min.js' );
		$view->headScript()->appendFile( INCLUDE_PATH . '/pick-a-color/build/dependencies/tinycolor-0.9.15.min.js' );
		$view->headScript()->appendScript( "$(document).ready(function(){ $(\".pick-a-color\").pickAColor(); });" );

		$element = new Zend_Form_Element_Text( $name );
		$element->setAttrib( 'class', 'pick-a-color span4' )
			->setAttrib( 'style', 'text-transform: uppercase' )
			->setLabel( $label )
			->addValidator( new Zend_Validate_StringLength( array( 'min' => 6, 'max' => 6 ) ) )
			->addFilter( new Zend_Filter_StringToUpper() );

		return $element;
	}
}