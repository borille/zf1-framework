<?php

require_once 'Zend/Pdf.php';

class Urbs_Pdf_MyZendPdf extends Zend_Pdf
{

    private $margins = array(40, 35, 40, 35);

    /**
     * The default encoding
     * 
     * @var string
     */
    public $encoding = 'ISO-8859-1';

    /**
     * Align text at left of provided coordinates
     * 
     * @var string
     */
    const TEXT_ALIGN_LEFT = 'left';

    /**
     * Align text at right of provided coordinates
     * 
     * @var string
     */
    const TEXT_ALIGN_RIGHT = 'right';

    /**
     * Center-text horizontally within provided coordinates
     * 
     * @var string
     */
    const TEXT_ALIGN_CENTER = 'center';

    /**
     * Extension of basic draw-text function to allow it to vertically center text
     *
     * @param Zend_Pdf_Page $page
     * @param string $text
     * @param int $x1 Left Margin
     * @param int $y1 Top Margin
     * @param int $x2 Width
     * @param int $position TEXT_ALIGN_LEFT | TEXT_ALIGN_RIGHT | TEXT_ALIGN_CENTER
     * @param string $encoding
     * @return Zend_Pdf_Page
     */
    public function drawText( Zend_Pdf_Page $page, $text, $x1, $y1, $x2 = null, $position = TEXT_ALIGN_LEFT, $encoding = null )
    {
        if ( $encoding == null )
            $encoding = $this->encoding;

        $bottom = $y1; // could do the same for vertical-centering
        switch ( $position )
        {
            case TEXT_ALIGN_LEFT :
                $left = $x1;
                break;
            case TEXT_ALIGN_RIGHT :
                if ( null === $x2 )
                {
                    throw new Exception( "Cannot right-align text horizontally, x2 is not provided" );
                }
                $textWidth = $this->getTextWidth( $text, $page );
                $left = $x2 - $textWidth;
                break;
            case TEXT_ALIGN_CENTER :
                if ( null === $x2 )
                {
                    throw new Exception( "Cannot center text horizontally, x2 is not provided" );
                }
                $textWidth = $this->getTextWidth( $text, $page );
                $left = $x1 + ( ($x2 - $x1) - $textWidth ) / 2;
                break;
            default :
                throw new Exception( "Invalid position value \"$position\"" );
        }

        // display multi-line text
        $page->drawText( $text, $left, $y1, $encoding );
        return $page;
    }

    /**
     * Draw text inside a box using word wrap
     * 
     * @param Zend_Pdf_Page $page
     * @param string $text
     * @param int $x1
     * @param int $y1
     * @param int $x2
     * @param int $position
     * @param float $lineHeight
     * @param string $encoding
     * 
     * @return integer bottomPosition
     */
    public function drawTextBox( Zend_Pdf_Page $page, $text, $x1, $y1, $x2 = null, $position = TEXT_ALIGN_LEFT, $lineHeight = 1.1, $encoding = null )
    {
        if ( $encoding == null )
            $encoding = $this->encoding;

        $lines = explode( PHP_EOL, $text );

        $bottom = $y1;
        $lineHeight = $page->getFontSize() * $lineHeight;
        foreach ( $lines as $line )
        {
            preg_match_all( '/([^\s]*\s*)/i', $line, $matches );

            $words = $matches[1];

            $lineText = '';
            $lineWidth = 0;
            foreach ( $words as $word )
            {
                $wordWidth = $this->getTextWidth( $word, $page );

                if ( $lineWidth + $wordWidth < $x2 - $x1 )
                {
                    $lineText .= $word;
                    $lineWidth += $wordWidth;
                }
                else
                {
                    $this->drawText( $page, $lineText, $x1, $bottom, $x2, $position, $encoding );
                    $bottom -= $lineHeight;
                    
                    $lineText = $word;
                    $lineWidth = $wordWidth;
                }
            }

            $this->drawText( $page, $lineText, $x1, $bottom, $x2, $position, $encoding );
            $bottom -= $lineHeight;
        }

        return $bottom;
    }

    /**
     * Create pages from a text using wrapping
     * 
     * @param Zend_Pdf_Page $template    The template where all new pages are created on
     * @param string $text                The text
     * @param array $margins              array(top, right, bottom, left) Margins from the borders of the document
     * @param align $position            self::TEXT_ALIGN_LEFT
     * @param lineheight $lineHeight    The lineheight, by default 1.1 = 110% of text-height
     * @param string $encoding            If null the self::$encoding is used
     * @return array $pages                Array of created pages
     */
    public function createPages( Zend_Pdf_Page $template, $text, $position = TEXT_ALIGN_LEFT, $lineHeight = 1.1, $encoding = null )
    {
        if ( $encoding == null )
            $encoding = $this->encoding;

        $pages = array();
        $currentPage = null;

        $lines = explode( "\n", $text );

        $lineHeight = $template->getFontSize() * $lineHeight;
        $x1 = $this->margins[1];
        $x2 = $template->getWidth() - $this->margins[1];
        $y1 = $template->getHeight() - $this->margins[0] - $lineHeight;
        $y2 = $this->margins[2];

        $bottom = $y1;
        foreach ( $lines as $line )
        {

            if ( $currentPage == null || $bottom <= $y2 )
            {
                $pages[] = $currentPage = new Zend_Pdf_Page( $template );
                $currentPage->setFont( $template->getFont(), $template->getFontSize() );
                $bottom = $y1;
            }

            preg_match_all( '/([^\s+\-,.\\/]*[\s+\-,.\\/]*)/i', $line, $matches );

            $words = $matches[1];

            $lineText = '';
            $lineWidth = 0;
            foreach ( $words as $word )
            {
                $wordWidth = $this->getTextWidth( $word, $currentPage );

                if ( $lineWidth + $wordWidth < $x2 - $x1 )
                {
                    $lineText .= $word;
                    $lineWidth += $wordWidth;
                }
                else
                {
                    $this->drawText( $currentPage, $lineText, $x1, $bottom, $x2, $position, $encoding );
                    $bottom -= $lineHeight;
                    $lineText = $word;
                    $lineWidth = $wordWidth;
                }
            }

            $this->drawText( $currentPage, $lineText, $x1, $bottom, $x2, $position, $encoding );
            $bottom -= $lineHeight;
        }

        return $pages;
    }

    /**
     * Return length of generated string in points
     *
     * @param string                     $text
     * @param Zend_Pdf_Resource_Font|Zend_Pdf_Page     $font
     * @param int                         $fontSize
     * @return double
     */
    public function getTextWidth( $text, $resource, $fontSize = null, $encoding = null )
    {
        if ( $encoding == null )
            $encoding = $this->encoding;

        if ( $resource instanceof Zend_Pdf_Page )
        {
            $font = $resource->getFont();
            $fontSize = $resource->getFontSize();
        }
        elseif ( $resource instanceof Zend_Pdf_Resource_Font )
        {
            $font = $resource;
            if ( $fontSize === null )
                throw new Exception( 'The fontsize is unknown' );
        }

        if ( !$font instanceof Zend_Pdf_Resource_Font )
        {
            throw new Exception( 'Invalid resource passed' );
        }

        $drawingText = iconv( '', $encoding, $text );
        $characters = array();
        for ( $i = 0; $i < strlen( $drawingText ); $i++ )
        {
            $characters [] = ord( $drawingText [$i] );
        }
        $glyphs = $font->glyphNumbersForCharacters( $characters );
        $widths = $font->widthsForGlyphs( $glyphs );
        $textWidth = (array_sum( $widths ) / $font->getUnitsPerEm()) * $fontSize;
        return $textWidth;
    }

    //--------------------------------------------------------------------------
    public function setMargins( $margins = array() )
    {
        $this->margins = $margins;
    }

    //--------------------------------------------------------------------------
    public function header( Zend_Pdf_Page $template, $text, $position = TEXT_ALIGN_CENTER )
    {
        $y = $template->getHeight() - $this->margins[0];
        $x = 0;
        $width = $template->getWidth();        

        $this->drawTextBox( $template, $text, $x, $y, $width, $position );

        return $this;
    }
    //--------------------------------------------------------------------------
    public function footer( Zend_Pdf_Page $template, $text, $position = TEXT_ALIGN_CENTER )
    {
        $y = $this->margins[2];
        $x = 0;
        $width = $template->getWidth();        

        $this->drawTextBox( $template, $text, $x, $y, $width, $position );

        return $this;
    }
    //--------------------------------------------------------------------------
}