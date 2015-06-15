<?php

class Urbs_View_Helper_VoltarButton extends Zend_View_Helper_Abstract
{

    public function voltarButton( $params = null )
    {
		if( is_array( $params )){ //verifica se o params é um array
        
            $front = Zend_Controller_Front::getInstance();
			
            $router = $front->getRouter();
            $request = $front->getRequest();

            if ( $params['controller'] == null ){
                $params['controller'] = $request->getControllerName();
            }

            $url = $router->assemble( $params, null, TRUE );
        }else{
            $url = $params;
        }
         
		if(!$url){
			$output = "<input type='button' onclick='javascript:history.go(-1);' value='Voltar'/>";		
		}else 
        $output = "<input type='button' onclick='location.href=\"$url\";self.focus();' value='Voltar'/>";

        return $output;
    }

}