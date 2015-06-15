<?php

require ( $_SERVER['DOCUMENT_ROOT'] . "/Geral/classes/Fpdf17/fpdf.php" );

class Urbs_Pdf_FPdf_Abstract extends FPDF
{
	/**
	 * @var string
	 */

	protected $_title1 = 'URBS - URBANIZAÇÃO DE CURITIBA S.A.';

	/**
	 * @var string
	 */
	protected $_title2 = 'TÍTULO DO RELATÓRIO';

	/**
	 * @var string
	 */
	protected $_title3 = 'SUBTÍTULO';


	/**
	 * @var int
	 */
	protected $_fontSize = 9;

	/**
	 * @var int
	 */
	protected $_lineHeight = 5;

	/**
	 * @var bool
	 */
	protected $_showLogo = true;

	/**
	 * @var int
	 */
	protected $_logoSize = 12;

	/**
	 * @var bool
	 */
	protected $_showDate = true;

	/**
	 * @var string
	 */
	protected $_dateFormat = 'EEEE, dd/MM/yyyy';

	/**
	 * @var int
	 */
	protected $angle = 0;

	public function __construct( $p1 = 'P', $p2 = 'mm', $p3 = 'A4' )
	{
		//chama o construtor do FPDF
		parent::__construct( $p1, $p2, $p3 );

		//default
		$this->SetFont( 'Arial' );
		$this->SetMargins( $this->GetLeftMargin(), $this->GetToptMargin(), $this->GetRightMagin() );
		//$this->SetAutoPageBreak( true, 10 );
		$this->bMargin = 10;
		$this->AliasNbPages();
		$this->setLogoSize( ( $this->_lineHeight * 3 ) - 2 );
		//$this->AddPage();
	}

	public function header()
	{
		$this->drawLogo();
		$this->drawTitle1();
		$this->drawTitle2();
		$this->drawTitle3();

		if ( $this->_showLogo ) {
			$this->setY( $this->GetToptMargin() + $this->_logoSize + $this->_lineHeight );
		} else {
			$this->Ln();
		}
	}

	public function footer()
	{
		$this->setFont( $this->FontFamily, null, $this->_fontSize * 0.75 );
		$this->setY( $this->GetPageHeight() - $this->bMargin - ( $this->_lineHeight / 2 ) );
		if ( $this->_showDate ) {
			$this->Cell( 0, $this->_lineHeight, utf8_decode( Zend_Date::now()->toString( $this->_dateFormat ) ), 0, 0, 'L' );
		}
		$this->Cell( 0, $this->_lineHeight, 'Página ' . $this->PageNo() . ' de {nb}', 0, 0, 'R' );
	}

	public function drawLogo()
	{
		if ( $this->_showLogo ) {
			$this->Image( 'img/logo.png', $this->lMargin, $this->tMargin, $this->_logoSize );
		}
	}

	public function drawTitle1()
	{
		if ( $this->_showLogo ) {
			$this->setX( $this->lMargin + $this->_logoSize + 2 );
		}
		$this->setFont( $this->FontFamily, 'B', $this->_fontSize );
		$this->Cell( 0, $this->_lineHeight, $this->_title1, 0, 1, 'L' );
	}

	public function drawTitle2()
	{
		if ( $this->_showLogo ) {
			$this->setX( $this->lMargin + $this->_logoSize + 2 );
		}
		$this->setFont( $this->FontFamily, '', $this->_fontSize * 0.9 );
		$this->Cell( 0, $this->_lineHeight, $this->_title2, 0, 1, 'L' );
	}

	public function drawTitle3()
	{
		if ( $this->_showLogo ) {
			$this->setX( $this->lMargin + $this->_logoSize + 2 );
		}
		$this->setFont( $this->FontFamily, '', $this->_fontSize * 0.9 );
		$this->Cell( 0, $this->_lineHeight, $this->_title3, 0, 1, 'L' );
	}

	/**
	 * @param string $dateFormat
	 */
	public function setDateFormat( $dateFormat )
	{
		$this->_dateFormat = $dateFormat;
	}

	/**
	 * @param int $fontSize
	 */
	public function setFontSize( $fontSize )
	{
		$this->_fontSize = $fontSize;
	}

	/**
	 * @param int $lineHeight
	 */
	public function setLineHeight( $lineHeight )
	{
		$this->_lineHeight = $lineHeight;
	}

	/**
	 * @return int
	 */
	public function getLineHeight()
	{
		return $this->_lineHeight;
	}

	/**
	 * @param int $logoSize
	 */
	public function setLogoSize( $logoSize )
	{
		$this->_logoSize = $logoSize;
	}

	/**
	 * @param boolean $showDate
	 */
	public function setShowDate( $showDate )
	{
		$this->_showDate = $showDate;
	}

	/**
	 * @param boolean $showLogo
	 */
	public function setShowLogo( $showLogo )
	{
		$this->_showLogo = $showLogo;
	}

	/**
	 * @param string $title1
	 */
	public function setTitle1( $title1 )
	{
		$this->_title1 = $title1;
	}

	/**
	 * @param string $title2
	 */
	public function setTitle2( $title2 )
	{
		$this->_title2 = $title2;
	}

	/**
	 * @param string $title3
	 */
	public function setTitle3( $title3 )
	{
		$this->_title3 = $title3;
	}

	public function GetLeftMargin()
	{
		return $this->lMargin;
	}

	public function GetToptMargin()
	{
		return $this->tMargin;
	}

	public function GetRightMagin()
	{
		return $this->rMargin;
	}

	public function GetPageWidth()
	{
		return $this->w;
	}

	public function GetPageHeight()
	{
		return $this->h;
	}

	public function RotatedText( $x, $y, $txt, $angle )
	{
		//Text rotated around its origin
		$this->Rotate( $angle, $x, $y );
		$this->Text( $x, $y, $txt );
		$this->Rotate( 0 );
	}

	public function RotatedImage( $file, $x, $y, $w, $h, $angle )
	{
		//Image rotated around its upper-left corner
		$this->Rotate( $angle, $x, $y );
		$this->Image( $file, $x, $y, $w, $h );
		$this->Rotate( 0 );
	}

	function Rotate( $angle, $x = -1, $y = -1 )
	{
		if ( $x == -1 )
			$x = $this->x;
		if ( $y == -1 )
			$y = $this->y;
		if ( $this->angle != 0 )
			$this->_out( 'Q' );
		$this->angle = $angle;
		if ( $angle != 0 ) {
			$angle *= M_PI / 180;
			$c = cos( $angle );
			$s = sin( $angle );
			$cx = $x * $this->k;
			$cy = ( $this->h - $y ) * $this->k;
			$this->_out( sprintf( 'q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm', $c, $s, -$s, $c, $cx, $cy, -$cx, -$cy ) );
		}
	}

	function _endpage()
	{
		if ( $this->angle != 0 ) {
			$this->angle = 0;
			$this->_out( 'Q' );
		}
		parent::_endpage();
	}

}