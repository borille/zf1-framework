<?php

class Urbs_View_Helper_FormataZero extends Zend_View_Helper_Abstract
{

    public function formataZero( $numero, $zeros = 0 )
    {
        return str_pad($numero, $zeros, '0', STR_PAD_LEFT);
    }
    
}