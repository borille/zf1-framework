<?php

require_once 'Zend/Validate/Abstract.php';

/**
 * Valida a data informada
 * Class Urbs_Validate_DateAs
 */
class Urbs_Validate_DateAs extends Zend_Validate_Abstract
{
	//types
	const GREATER = 1;
	const GREATER_OR_EQUAL = 2;
	const EQUAL = 3;
	const EARLIER = 4;
	const EARLIER_OR_EQUAL = 5;

	//vars
	private $date = null;
	private $type = null;
	private $format = null;

	protected $_messageTemplates = array(
		'notGreater' => "A data deve ser maior que '%value%'!",
		'notGreaterOrEqual' => "A data deve ser maior ou igual a '%value%'!",
		'notEqual' => "A data deve ser igual a '%value%'!",
		'notEarlier' => "A data deve ser menor que '%value%'!",
		'notEarlierOrEqual' => "A data deve ser menor ou igual a '%value%'!",
	);

	/**
	 * @param $date
	 * @param $type
	 * @param string $format
	 */
	public function __construct( $date, $type, $format = 'dd/MM/yyyy' )
	{
		$this->date = $date;
		$this->type = $type;
		$this->format = $format;
	}

	public function isValid( $value )
	{
		$this->_setValue( $this->date );
		$date = new Zend_Date( $value, $this->format );
		$now = new Zend_Date( $this->date, $this->format );

		switch ( $this->type ) {
			case self::GREATER:
				if ( (int)$date->compare( $now ) <= 0 ) {
					$this->_error( 'notGreater' );
					return false;
				}
				break;
			case self::GREATER_OR_EQUAL:
				if ( (int)$date->compare( $now ) < 0 ) {
					$this->_error( 'notGreaterOrEqual' );
					return false;
				}
				break;
			case self::EQUAL:
				if ( (int)$date->compare( $now ) != 0 ) {
					$this->_error( 'notEqual' );
					return false;
				}
				break;
			case self::EARLIER:
				if ( (int)$date->compare( $now ) >= 0 ) {
					$this->_error( 'notEarlier' );
					return false;
				}
				break;
			case self::EARLIER_OR_EQUAL:
				if ( (int)$date->compare( $now ) > 0 ) {
					$this->_error( 'notEarlierOrEqual' );
					return false;
				}
				break;
		}
		return true;
	}

}