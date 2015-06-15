<?php

class Urbs_View_Helper_Select extends Zend_View_Helper_Abstract {

    /**
     * Helper para criar um campo Select (html)
     * @author TRB@2011
     * @param string $name Nome e Id do Campo
     * @param string $value Nome do campo indice do array $options (que será o value do option)
     * @param string $label Nome do campo valor do array $options (que será a label) do action     
     * @param array $options Array com o primeiro option
     * @param array $data Array com os dados do select
     * @param string $default Campo que será selecionado como padrao
     * @param array #params Array com os parametros opcionais do select
     * @return string Select formatado
     */
    public function select($name, $value, $label, $data = array(), $options = array(), $default = null, $params = array()) {
        $output = '<select name="' . $name . '" id="' . $name . '"';

        //se foi passado algum parametro para o select
        if ($params != array()) {
            foreach ($params as $key => $param) {
                $output .= ' ' . $key . '="' . $param . '"';
            }
        }

        $output .= '>';

        //se foi passado a primeira opção do Select
        if ($options != array()) {
            $output .= '<option value="' . $options['key'] . '" selected="selected">';
            $output .= $options['value'];
            $output .= '</option>';
        }

        //preenche os options do select
        if ($data != array()) {
            foreach ($data as $option) {
                $output .= '<option value="' . $option[$value] . '" ';

                if ($option[$value] == $default) {
                    $output .= 'selected="selected"';
                }
                
                $output .= '>';                
                if(!is_array($label) ){
                    $output .= $option[$label];                                        
                }else{                    
                    $espaco = '';
                    foreach ($label as $sub_label) {
                        $output .= $espaco.$option[$sub_label];
                        $espaco = ' - ';
                    }
                }


                $output .= '</option>';
            }
        }

        $output .= '</select>';

        return $output;
    }

}

?>