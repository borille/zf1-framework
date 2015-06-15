<?php

class Urbs_View_Helper_SetFocus extends Zend_View_Helper_Abstract
{

    /**
     * Helper para setar o foco no campo
     * @author TRB@2012
     * @param string $id Id do Campo
     */
    public function setFocus( $id )
    {
        echo "<script type='text/javascript'>document.getElementById('$id').focus()</script>";
    }

}

?>