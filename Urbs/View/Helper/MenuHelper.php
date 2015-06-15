<?php

class Urbs_View_Helper_MenuHelper extends Zend_View_Helper_Abstract
{

    public function menuHelper( $menus, $controller, $action, $id )
    {
        $output = '<div class="menu_listar"><table><tr>';

        foreach ( $menus as $key => $value )
        {
            if ( $id > 0 )
            {
                $url = Zend_View_Helper_Url::url( array( 'controller' => $controller, 'action' => $key, 'id' => $id ), null, TRUE );
            }
            else
            {
                $url = Zend_View_Helper_Url::url( array( 'controller' => $controller, 'action' => $key ), null, TRUE );
            }
            if ( $key == $action )
            {
                $output .= "<th title='Aba Atual'>$value</th>";
            }
            else
            {
                $output .= "<td onClick=\"location.href='$url'\" title='Abrir Aba'>$value</td>";
            }
        }
        $output .= '</tr></table><br/></div>';

        return $output;
    }

}
?>