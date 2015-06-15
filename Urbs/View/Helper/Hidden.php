<?php

class Urbs_View_Helper_Hidden extends Zend_View_Helper_Abstract
{

    /**
     * Helper para criar um campo input Hidden (html)
     * @author TRB@2012
     * @param string $name Nome e Id do Campo
     * @param string $value Valor do campo
     * @param array $params Array com os parametros opcionais do campo
     * @return string Campo formatado
     */
    public function Hidden( $name, $value = null, $params = array( ) )
    {
        $output = "<input type='hidden' name='$name' id='$name'";

        //se for passado algum valor ao campo, preenche
        if ( $value )
        {
            $output .= " value='$value'";
        }

        //se foi passado algum parametro para o input
        if ( $params != array( ) )
        {
            foreach ( $params as $key => $value )
            {
                $output .= ' ' . $key . '="' . $value . '"';
            }
        }

        $output .= "/>";

        return $output;
    }

}

?>