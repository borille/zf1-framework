<?php

class Urbs_Controller_Action_Helper_Recibo extends Zend_Controller_Action_Helper_Abstract
{

    /**
     * @param Urbs_Pdf_MyZendPdf $pdf Objeto ao qual será adicionado o recibo
     * @param type $nome Nome
     * @param type $valor Valor
     * @param type $text Descrição do Recibo
     * @return Urbs_Pdf_MyZendPdf Retorna o próprio objeto passado
     */
    public function direct( Urbs_Pdf_MyZendPdf $pdf, $nome = null, $valor = null, $text = null )
    {
        //cria uma pagina        
        $page = new Zend_Pdf_Page( Zend_Pdf_Page::SIZE_A4 );

        //adiciona a pagina ao arquivo
        $pdf->pages[] = $page;

        //define as margens
        $marginTop = $page->getHeight() - 50;
        $marginBottom = 50;
        $marginLeft = 45;
        $marginRight = $page->getWidth() - 45;

        for ( $i = 0; $i < 3; $i++ )
        {
            if ( $i > 0 )
            {
                $marginTop -= 250;
            }

            //Load and Draw image
            $image = Zend_Pdf_Image::imageWithPath( 'img/logo.png' );
            $page->drawImage( $image, $marginLeft + 20, $marginTop - 55, $marginLeft + 60, $marginTop - 5 );

            $page->setLineWidth( 0.5 );
            $page->drawRectangle( $marginLeft, $marginTop, $marginRight, $marginTop - 210, Zend_Pdf_Page::SHAPE_DRAW_STROKE );
            $page->drawLine( $marginLeft, $marginTop - 60, $marginRight, $marginTop - 60 );
            $page->drawLine( $marginLeft, $marginTop - 80, $marginRight, $marginTop - 80 );
            $page->drawLine( $marginLeft, $marginTop - 100, $marginRight, $marginTop - 100 );
            $page->drawLine( $marginLeft, $marginTop - 170, $marginRight, $marginTop - 170 );
            $page->drawLine( $marginRight - 80, $marginTop - 195, $marginRight, $marginTop - 195 );
            $page->drawLine( $marginLeft + 80, $marginTop - 60, $marginLeft + 80, $marginTop - 170 );
            $page->drawLine( $marginRight - 80, $marginTop - 60, $marginRight - 80, $marginTop - 170 );

            $page->setFont( Zend_Pdf_Font::fontWithName( Zend_Pdf_Font::FONT_HELVETICA_BOLD ), 9 );
            $pdf->drawText( $page, 'URBS - URBANIZAÇÃO DE CURITIBA S.A.', $marginLeft + 80, $marginTop - 20, $marginRight, TEXT_ALIGN_CENTER );
            $pdf->drawText( $page, 'AV.PRES. AFFONSO CAMARGO, 330 - RODOFERROVIARIA - BL.CENTRAL', $marginLeft + 80, $marginTop - 30, $marginRight, TEXT_ALIGN_CENTER );
            $pdf->drawText( $page, 'C.N.P.J. 75.076.836/0001-79 - INSC. EST. 101.47666-90', $marginLeft + 80, $marginTop - 40, $marginRight, TEXT_ALIGN_CENTER );
            $pdf->drawText( $page, '(041) 3320-3321', $marginLeft + 80, $marginTop - 50, $marginRight, TEXT_ALIGN_CENTER );

            $pdf->drawText( $page, 'NOME', $marginLeft, $marginTop - 75, $marginLeft + 80, TEXT_ALIGN_CENTER );
            $pdf->drawText( $page, $nome, $marginLeft + 85, $marginTop - 75, $marginRight - 80, TEXT_ALIGN_LEFT );

            $pdf->drawText( $page, 'RECIBO', $marginLeft + 80, $marginTop - 95, $marginRight - 80, TEXT_ALIGN_CENTER );
            $pdf->drawText( $page, 'VALOR R$', $marginRight - 80, $marginTop - 95, $marginRight, TEXT_ALIGN_CENTER );
            $pdf->drawText( $page, $valor, $marginRight - 80, $marginTop - 115, $marginRight, TEXT_ALIGN_CENTER );

            $page->setFont( Zend_Pdf_Font::fontWithName( Zend_Pdf_Font::FONT_HELVETICA ), 9 );
            $pdf->drawTextBox( $page, $text, $marginLeft + 85, $marginTop - 115, $marginRight - 80 );
            $pdf->drawText( $page, 'ATX-UGT', $marginLeft, $marginTop - 95, $marginLeft + 80, TEXT_ALIGN_CENTER );
            $pdf->drawText( $page, 'MOTO-FRETE', $marginLeft, $marginTop - 115, $marginLeft + 80, TEXT_ALIGN_CENTER );

            $page->setFont( Zend_Pdf_Font::fontWithName( Zend_Pdf_Font::FONT_HELVETICA_BOLD ), 8 );
            $pdf->drawText( $page, 'PAGÁVEL SOMENTE NOS CAIXAS DA TESOURARIA DA URBS', $marginLeft + 85, $marginTop - 165, $marginLeft + 80, TEXT_ALIGN_LEFT );

            $page->setFont( Zend_Pdf_Font::fontWithName( Zend_Pdf_Font::FONT_HELVETICA ), 7 );
            $pdf->drawText( $page, 'VÁLIDO SOMENTE COM AUTENTICAÇÃO MECÂNICA', $marginLeft + 5, $marginTop - 180, $marginLeft + 80, TEXT_ALIGN_LEFT );

            $page->setFont( Zend_Pdf_Font::fontWithName( Zend_Pdf_Font::FONT_HELVETICA ), 9 );
            $pdf->drawText( $page, date( 'd/m/Y' ), $marginLeft + 5, $marginTop - 205, $marginLeft + 80, TEXT_ALIGN_LEFT );
            $pdf->drawText( $page, date( 'H:i' ), $marginLeft + 85, $marginTop - 205, $marginLeft + 80, TEXT_ALIGN_LEFT );

            $page->setFont( Zend_Pdf_Font::fontWithName( Zend_Pdf_Font::FONT_HELVETICA_BOLD ), 9 );
            $pdf->drawText( $page, 'CAIXA', $marginRight - 80, $marginTop - 205, $marginRight, TEXT_ALIGN_CENTER );
        }
        return $pdf;
    }

}