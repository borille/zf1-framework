<?php

require ($_SERVER['DOCUMENT_ROOT'] . "/Geral/classes/MPDF/mpdf.php");

class Urbs_Pdf_MPdf extends mPDF
{

    public function __construct( $mode = 'c', $format = 'A4' )
    {
        //chama o construtor do MPDF
        parent::__construct( $mode, $format);
        
        //configurações padroes
        $this->allow_charset_conversion = true;  // Set by default to TRUE
        $this->charset_in = 'iso-8859-1';        
    }

}

?>
