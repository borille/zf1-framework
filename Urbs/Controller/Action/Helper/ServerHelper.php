<?php

class Urbs_Controller_Action_Helper_ServerHelper extends Zend_Controller_Action_Helper_Abstract
{

    /**
     * Retorna o resultado do comando TOP, contendo os processos em ordem de uso
     * @return array de linhas (5 linhas de informação geral, uma em branco, o cabeçalho da tabela e as
     * linhas seguintes todas são processos)
     * ATENCAO: Funcao para servidor LINUX
     */
    function getTop()
    {
        if ( strtoupper( substr( PHP_OS, 0, 3 ) ) === 'WIN' )
        {
            return array( "função top não existe no Windows" );
        }
        else if ( strtoupper( substr( PHP_OS, 0, 3 ) ) === 'LIN' )
        {
            $retval = null;
            exec( 'top -b -n1', $retval );
            return $retval;
        }
        else
        {
            return array( "SO não reconhecido;" );
        }
    }

    /**
     * Retorna o uso do HD, resultado de df -h
     * @return array com os dados de cada mountpoint
     * (a primeira linha é o cabeçalho da tabela) 
     */
    function getUsoHD()
    {
        $saida = null;

        if ( strtoupper( substr( PHP_OS, 0, 3 ) ) === 'WIN' )
        {

            $local = $_SERVER['DOCUMENT_ROOT'];
            $dts = disk_total_space( $local );
            $dfs = disk_free_space( $local );
            $hd_usage = 100 - intval( $dfs * 100 / $dts );

            $saida[1]['filesystem'] = "Filesystem";
            $saida[1]['size'] = "Size";
            $saida[1]['used'] = "Used";
            $saida[1]['avail'] = "Avail";
            $saida[1]['percent'] = " Use%";
            $saida[1]['mpoint'] = "Mounted on";
            $saida[1]['cor'] = "Cor";

            $saida[2]['filesystem'] = $local;
            $saida[2]['size'] = Urbs_Action_Helper::resizeMem( $dts );
            $saida[2]['used'] = Urbs_Action_Helper::resizeMem( $dts - $dfs );
            $saida[2]['avail'] = Urbs_Action_Helper::resizeMem( $dfs );
            $saida[2]['percent'] = $hd_usage;
            $saida[2]['mpoint'] = $local;

            $cor = '2AD636';
            if ( $hd_usage > 25 )
                $cor = 'EFCC2D';else
            if ( $hd_usage > 50 )
                $cor = 'EF842D';else
            if ( $hd_usage > 80 )
                $cor = 'FF0000';

            $saida[2]['color'] = $cor;
        }
        else if ( strtoupper( substr( PHP_OS, 0, 3 ) ) === 'LIN' )
        {
            $retval = null;
            exec( "df -h | awk '{print $1\"#\"$2\"#\"$3\"#\"$4\"#\"$5\"#\"$6}'", $retval );

            if ( $retval )
            {
                foreach ( $retval as $value )
                {
                    if ( $value )
                    {
                        $i++;
                        $tmp_arr = explode( "#", $value );
                        $saida[$i]['filesystem'] = $tmp_arr[0];
                        $saida[$i]['size'] = $tmp_arr[1];
                        $saida[$i]['used'] = $tmp_arr[2];
                        $saida[$i]['avail'] = $tmp_arr[3];
                        $saida[$i]['percent'] = $tmp_arr[4];
                        $saida[$i]['mpoint'] = $tmp_arr[5];

                        $cor = '2AD636';
                        if ( $saida[$i]['percent'] > 25 )
                            $cor = 'EFCC2D';else
                        if ( $saida[$i]['percent'] > 50 )
                            $cor = 'EF842D';else
                        if ( $saida[$i]['percent'] > 80 )
                            $cor = 'FF0000';

                        $saida[$i]['color'] = $cor;
                    }
                }
            }
        }
        else
        {
            $saida[1]['filesystem'] = "SO não reconhecido;";
        }
        return $saida;
    }

    /**
     * Retorna os dados de Ram e SWAP da máquina
     * @return array (total,used,percent,free,shared,buffers,cached)
     * ATENCAO: Funcao para servidor LINUX
     */
    function getUsoRam()
    {
        $saida = null;

        if ( strtoupper( substr( PHP_OS, 0, 3 ) ) === 'WIN' )
        {
            $i = 0;

            $saida[$i]['title'] = "Consumo Php";
            $saida[$i]['total'] = 0;
            $saida[$i]['used'] = Urbs_Action_Helper::resizeMem( memory_get_usage( true ) );
            $saida[$i]['percent'] = 0;
            $saida[$i]['free'] = 0;
            $saida[$i]['shared'] = 0;
            $saida[$i]['buffers'] = 0;
            $saida[$i]['cached'] = 0;
        }
        else if ( strtoupper( substr( PHP_OS, 0, 3 ) ) === 'LIN' )
        {
            $retval = null;
            exec( "free | awk '{print $1\"#\"$2\"#\"$3\"#\"$4\"#\"$5\"#\"$6}'", $retval );
            if ( $retval )
            {
                foreach ( $retval as $value )
                {
                    if ( $value )
                    {
                        $tmp_arr = explode( "#", $value );
                        if ( intval( $tmp_arr[1] ) )
                        {
                            $i++;
                            $saida[$i]['title'] = $tmp_arr[0];
                            $saida[$i]['total'] = Urbs_Action_Helper::resizeMem( $tmp_arr[1] );
                            $saida[$i]['used'] = Urbs_Action_Helper::resizeMem( $tmp_arr[2] );
                            $saida[$i]['percent'] = intval( $tmp_arr[2] * 100 / $tmp_arr[1] );
                            $saida[$i]['free'] = Urbs_Action_Helper::resizeMem( $tmp_arr[3] );
                            $saida[$i]['shared'] = Urbs_Action_Helper::resizeMem( $tmp_arr[4] );
                            $saida[$i]['buffers'] = Urbs_Action_Helper::resizeMem( $tmp_arr[5] );
                            $saida[$i]['cached'] = Urbs_Action_Helper::resizeMem( $tmp_arr[6] );

                            $cor = '2AD636';
                            if ( $saida[$i]['percent'] > 25 )
                                $cor = 'EFCC2D';else
                            if ( $saida[$i]['percent'] > 50 )
                                $cor = 'EF842D';else
                            if ( $saida[$i]['percent'] > 80 )
                                $cor = 'FF0000';

                            $saida[$i]['color'] = $cor;
                        }
                    }
                }
            }
        } else
        {
            $saida[1]['title'] = "SO não reconhecido;";
        }
        return $saida;
    }
}

?>
