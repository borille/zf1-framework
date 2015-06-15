<?php

class Urbs_View_Helper_Currency extends Zend_View_Helper_Abstract
{

    /**
     * Helper que formata um valor em moeda
     * 
     * @param string $numero
     * @param boolean $simbolo
     * @return string
     */
    public function Currency( $numero = 0, $simbolo = false )
    {
        $currency = new Zend_Currency( 'pt_BR' );

        //verifica se é pra tirar o R$ da frente
        if ( !$simbolo )
        {
            $currency->setFormat( array(
                'symbol' => null
            ) );
        }

        try
        {
            $numero = str_replace( ',', '.', $numero );

            if ( !is_numeric( $numero ) )
            {
                $numero = 0;
            }

            return $currency->toCurrency( $numero );
        }
        catch ( Exception $e )
        {
            return $currency->toCurrency( 0 );
        }
    }

}