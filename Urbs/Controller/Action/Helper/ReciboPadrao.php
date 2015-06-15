<?php

class Urbs_Controller_Action_Helper_ReciboPadrao extends Zend_Controller_Action_Helper_Abstract
{

    public function direct( $mpdf, $nome, $valor, $descricao )
    {   
        $stylesheet = file_get_contents( 'css/recibo/gerar.css' );
        $mpdf->WriteHTML( $stylesheet, 1 ); // The parameter 1 tells that this is css/style only and no body/html/text

        $mpdf->AddPage();        
        
        $logo = $_SERVER['DOCUMENT_ROOT'] . "/Geral/imagens/urbs2.gif";

        $DATA = strftime( "%d/%m/%Y", time() );
        $HORA = strftime( "%H:%M", time() );

        $html = "
<table border='0'>
<tr>
    <td align='center'><img src='$logo' width='55' /></td>
    <th colspan='2'>
        <br>
        URBS - URBANIZAÇÃO DE CURITIBA S.A.<br>
        AV.PRES. AFFONSO CAMARGO, 330 - RODOFERROVIARIA - BL.CENTRAL<br>
        C.N.P.J. 75.076.836/0001-79 - INSC. EST. 101.47666-90<br>
        (041) 3320-3321        
        <br>
        <br>
    </th>
</tr>
<tr>
    <th width='120px'>NOME</th>
    <td>$nome</td>
    <td></td>
</tr>
<tr>
    <td align='center'>ATX-UGT</td>
    <th>RECIBO</th>
    <th width='100px'>VALOR R$</th>
</tr>
<tr>
    <td align='center' valign='top'>MOTO-FRETE</td>
    <td rowspan='3' valign='top'>$descricao</td>
    <td align='center' valign='top'>$valor</td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
<tr>    
    <td>&nbsp;</td>
    <td><strong>PAGÁVEL SOMENTE NOS CAIXAS DA TESOURARIA DA URBS</strong></td>
    <td>&nbsp;</td>
</tr>
<tr>
    <td colspan='3'><small>VÁLIDO SOMENTE COM AUTENTICAÇÃO MECÂNICA</small></td>
</tr>
<tr>
    <td>$DATA</td>
    <td>$HORA</td>
    <th>CAIXA</th>
</tr>
</table>";

        $top = 18;

        for ( $i = 0; $i < 3; $i++ )
        {
            $mpdf->WriteHTML( $html );

            $x = 15;
            $y = $top;
            $l = 180;
            $a = 73;

            $mpdf->Rect( $x, $y, $l, $a );

            $y += 21;
            $a = 6;

            $mpdf->Rect( $x + 32, $y, $l - 58, 39 );
            $mpdf->Rect( $x, $y, $l, $a );

            $y += $a + 6;
            $a = 27;

            $mpdf->Rect( $x, $y, $l, $a );

            $x = $l - 11;
            $y += $a + 8;

            $mpdf->Line( $x, $y, $x + 26, $y );

            $mpdf->WriteHTML( "<br><br>" );

            $top += 86;
        }

        return $mpdf;
    }

}