<?php
/**
 * Form para alterar a senha da intranet
 *
 * @category    Urbs
 * @package     Urbs_Form
 * @subpackage  Bootstrap
 * @name        Urbs_Form_Bootstrap_ChangePassword
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Form_Bootstrap_ChangePassword extends Urbs_Form_Bootstrap
{

	public function init()
	{
		//----------------------------------------------------------------------
		$senha = new Zend_Form_Element_Password( 'atual' );
		$senha->setAttrib( 'placeholder', 'Senha Atual' )
			->setRequired( true )
			->addValidator( new Urbs_Validate_SenhaIntranet() );
		$this->addPrependIcon( $senha, 'icon-unlock' );

		//----------------------------------------------------------------------
		$nova = new Zend_Form_Element_Password( 'nova' );
		$nova->setAttrib( 'placeholder', 'Nova Senha' )
			->setRequired( true );
		$this->addPrependIcon( $nova, 'icon-lock' );

		//----------------------------------------------------------------------
		$confirma = new Zend_Form_Element_Password( 'confirma' );
		$confirma->setAttrib( 'placeholder', 'Confirmar Nova Senha' )
			->setRequired( true )
			->addValidator( new Zend_Validate_Identical( 'nova' ) )
			->setErrorMessages( array( Zend_Validate_Identical::NOT_SAME => 'A confirmação da nova senha não confere' ) );
		$this->addPrependIcon( $confirma, 'icon-lock' );

		//----------------------------------------------------------------------
		$submit = new Zend_Form_Element_Button( 'submit' );
		$submit->setLabel( 'Alterar a Senha' );

		//----------------------------------------------------------------------
		$cancel = new Zend_Form_Element_Button( 'cancel' );
		$cancel->setLabel( 'Limpar os Campos' );

		//----------------------------------------------------------------------
		$this->setAttrib( 'class', 'form' );
		$this->addElements( array( $senha, $nova, $confirma, $submit, $cancel ) );

	}
}