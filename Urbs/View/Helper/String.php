<?php

class Urbs_View_Helper_String extends Zend_View_Helper_Abstract
{

    /**
     * Helper para mostrar apenas a primeira palavra do texto (Ex: Nomes completos)
     * @author MV@2012
     * @param string $nomew Texto 
     * @return string Primeira Palavra
     */
    function firstword($nomew){
		$arr = explode(' ',trim($nomew));	
		return $arr[0];
	}
    
}

?>