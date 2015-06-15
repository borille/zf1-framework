<?php

/*
 * Retorna array com o nome e a versão do navegador utilizado
 */
class Urbs_Controller_Action_Helper_VersaoBrowser extends Zend_Controller_Action_Helper_Abstract
{

    public function direct()
    {
        $browsers = array("firefox", "msie", "opera", "chrome", "safari",
            "mozilla", "seamonkey", "konqueror", "netscape",
            "gecko", "navigator", "mosaic", "lynx", "amaya",
            "omniweb", "avant", "camino", "flock", "aol");

        $agent = strtolower( $_SERVER['HTTP_USER_AGENT'] );
        
        foreach ( $browsers as $browser )
        {
            if ( preg_match( "#($browser)[/ ]?([0-9.]*)#", $agent, $match ) )
            {
                $result = array(
                    'agent' => $agent,
                    'name' => $match[1],
                    'version' => $match[2]
                );
                
                return $result;
            }
        }
    }

}

?> 