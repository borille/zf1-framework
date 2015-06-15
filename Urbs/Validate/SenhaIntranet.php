<?php

require_once 'Zend/Validate/Abstract.php';

/**
 * Valida a senha atual da intranet
 * Class Urbs_Validate_SenhaAtual
 */
class Urbs_Validate_SenhaIntranet extends Zend_Validate_Abstract
{
	const MSG_SENHA = 'senha';

	protected $_messageTemplates = array(
		self::MSG_SENHA => "A senha atual não é válida"
	);

	public function isValid( $value )
	{
		$user = Zend_Auth::getInstance()->getIdentity();
		$userSirh = Urbs_Service_Sirh_Login::getInstance()->validarLogin(
			$user->getMatriculaSIRH(),
			$value,
			$user->getEmpresa()
		);

		if ( !$userSirh ) {
			$this->_error( self::MSG_SENHA );
			return false;
		}

		return true;
	}

}