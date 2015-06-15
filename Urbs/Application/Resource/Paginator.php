<?php

/**
 * Classe para configurar a Paginação
 * para uso dentro do sistema
 * 
 * @category Urbs
 * @package Urbs_Application
 * @subpackage Urbs_Application_Resource
 * @author TRB
 * @copyright Urbs@2012
 */
class Urbs_Application_Resource_Paginator extends Zend_Application_Resource_ResourceAbstract
{

    public function init()
    {
        $options = $this->getOptions();

        /* Estilo */
        if ( isset( $options['style'] ) )
        {
            Zend_Paginator::setDefaultScrollingStyle( $options['style'] );
        }

        /* Elementos por Página */
        if ( isset( $options['perpage'] ) )
        {
            Zend_Paginator::setDefaultItemCountPerPage( $options['perpage'] );
        }

        /* Script para Renderização */
        if ( isset( $options['script'] ) )
        {
            Zend_View_Helper_PaginationControl::setDefaultViewPartial( $options['script'] );
        }

        /* Próprio Objeto como Recurso */
        return $this;
    }
}