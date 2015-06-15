<?php

class Urbs_View_Helper_GraficoBarraSimples extends Zend_View_Helper_Abstract
{

    /**
     * Helper para criar um gráfico html
     * @author MV@2012
     * @param string $percent tamanho usado
     * @param string $color cor de usado em hexa (optional) Default 0000FF
     * @param array ($width,$height,$border,$other_styles) (optional) Default (80%,20px,1px solid)
     * @return string html do gráfico
     */
    public function GraficoBarraSimples( $percent, $color = "0000FF", $params = array( ) )
    {
        $width = 0;
        $height = 0;
        $border = 0;

        if ( $params != array( ) )
        {
            $width = intval( $params[0] );
            $height = intval( $params[1] );
            $border = $params[2];
        }
        if ( !$width )
            $width = "80%";
        if ( !$height )
            $height = "20px";
        if ( !$border )
            $border = "1px solid";


        if ( defined( 'TWITTER_BOOTSTRAP' ) ) { // Verifica se o layout usa bootstrap

            $color = str_replace("2AD636", 'bar-success', $color);
            $color = str_replace("EFCC2D", 'bar-warning', $color);
            $color = str_replace("0000FF", 'bar-danger', $color);

            $output = "<div class='progress'>
                <div class='bar $color' style='width: $percent;'>
                </div>                
            </div>";


        } else {


            $output = "<div style='border: $border; width: $width;height: $height'>
                <div style='float:left;width: $percent%;height:20px;background:#$color;'></div>
            </div>";
        }

        return $output;
    }
}

?>