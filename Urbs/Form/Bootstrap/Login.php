<?php
/**
 * Form de login
 *
 * @category    Urbs
 * @package     Urbs_Form
 * @subpackage  Bootstrap
 * @name        Urbs_Form_Bootstrap_Login
 * @copyright   Copyright (c) 2013 - URBS
 * @version     1.0
 */
class Urbs_Form_Bootstrap_Login extends Urbs_Form_Bootstrap
{

	public function init()
	{
		$empresa = Urbs_Service_Sirh_Empresa::getInstance()->getFormSelectEmpresa( 'empresa' );
		$this->addPrependIcon( $empresa, 'icon-home' );

		//----------------------------------------------------------------------
		$matricula = new Zend_Form_Element_Text( 'matricula' );
		$matricula->setAttrib( 'placeholder', 'Matrícula' )
			->setAttribs( array( 'maxlength' => 5, 'onKeyPress' => 'return mascaraInteiro(event);' ) )
			->addValidator( new Zend_Validate_Int )
			->setRequired( true )
			->addValidator( 'StringLength', false, array( 5 ) );
		$this->addPrependIcon( $matricula, 'icon-user' );

		//----------------------------------------------------------------------
		$senha = new Zend_Form_Element_Password( 'senha' );
		$senha->setAttrib( 'placeholder', 'Senha' )
			->setRequired( true )
			->addValidator( 'StringLength', false, array( 4 ) );
		$this->addPrependIcon( $senha, 'icon-lock' );

		//----------------------------------------------------------------------
		$submit = new Zend_Form_Element_Button( 'submit' );
		$submit->setLabel( 'Login' );

		//----------------------------------------------------------------------
		$this->setAttrib( 'class', 'form-login' );
		$this->addElements( array( $empresa, $matricula, $senha, $submit ) );
	}
}