<?php

class Urbs_Form_Bootstrap_Element_Date extends Zend_Form_Element_Text
{

	/**
	 * @param array|string|Zend_Config $spec
	 * @param string $label
	 * @param string $format
	 * @param string $mask
	 * @param null $options
	 */
	public function __construct( $spec, $label = '', $format = 'dd/MM/yyyy', $mask = '99/99/9999', $options = null )
	{
		parent::__construct( $spec, $options );

		if ( $mask ) {
			echo "<script type='text/javascript'>jQuery(function($){ $(\"#$spec\").mask(\"$mask\");});</script>";
		}

		$calendar = "<span class='add-on btn' onClick=\"displayCalendar(document.getElementById('$spec'),'dd/mm/yyyy',this)\"><i class='icon-calendar'></i></span>";

		$this->setDescription( $calendar )
			->setAttrib( 'style', 'width: 100px' )
			->setLabel( $label )
			->setAttrib( 'decorator', '_DateElementDecorator' )
			->addValidator( new Zend_Validate_Date( array( 'locale' => 'pt_BR', 'format' => $format ) ) );

		return $this;
	}

}