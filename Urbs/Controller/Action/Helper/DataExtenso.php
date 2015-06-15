<?php

class Urbs_Controller_Action_Helper_DataExtenso extends Zend_Controller_Action_Helper_Abstract
{

    function direct()
    {
        //retorna a data por extenso: DD de MES de AAAA
        setlocale( LC_TIME, "portuguese" );
        return strftime( "%d de %B de %Y", time() );
    }

}
