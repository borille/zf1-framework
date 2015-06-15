<?php

class Urbs_Controller_Action_Helper_OpenPdf extends Zend_Controller_Action_Helper_Abstract
{

    function direct( $nome_arquivo )
    {
        //abre o arquivo no browser        
        header( 'Content-type: application/pdf' );
        header( 'Content-Disposition: inline; filename="' . $nome_arquivo . '"' );
        header( 'Content-Length: ' . filesize( $nome_arquivo ) );
        @readfile( $nome_arquivo );
    }

}
