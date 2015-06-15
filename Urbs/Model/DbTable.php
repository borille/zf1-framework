<?php

require_once 'Zend/Db/Table/Abstract.php';

/**
 * É classe filha de Zend_Db_Table_Abstract.
 * Ela possui alguns métodos comuns utilizados por todas as classes DbTable.
 * 
 * 
 * @category    Urbs
 * @package     Urbs_Model
 * @name        Urbs_Model_DbTable
 * @copyright   Copyright (c) 2012 - URBS
 * @author      TRB
 * @version     1.0
 * 
 */
abstract class Urbs_Model_DbTable extends Zend_Db_Table_Abstract
{

    /**
     * @var string Nome da Tabela no BD
     */
    protected $_name;

    /**
     * @var string Nome da chave primária do BD
     */
    protected $_primary;

    /**
     * @var string Nome do campo de sequencia da tabela
     */
    protected $_sequence;

    /**
     * @var int Total de linhas de um Select
     */
    private $_total = 0;

    //--------------------------------------------------------------------------    
    /**
     * __construct() - Construtor da classe
     *
     * @param string $_name Nome da tabela do Banco de Dados
     * @param string $_primary Nome do campo que é PK da respectiva tabela
     */
    public function __construct( $name = null, $primary = null, $sequence = null )
    {
        if ( !$name )
        {
            die( 'Error. Invalid Table Name!' );
        }

        $this->_name = $name;
        $this->_primary = $primary;
        $this->_sequence = $sequence;

        //chama o construtor da classe pai
        parent::__construct();
    }

    //--------------------------------------------------------------------------    
    /**
     * __destruct() - Destrutor da classe
     * Fecha a conexão com o Bando de Dados
     */
    public function __destruct()
    {
        $this->_db->closeConnection();
    }

    //--------------------------------------------------------------------------    
    protected function getName()
    {
        return $this->_name;
    }

    //--------------------------------------------------------------------------    
    protected function setName( $_name )
    {
        $this->_name = $_name;
    }

    //--------------------------------------------------------------------------    
    protected function getPrimary()
    {
        return $this->_primary;
    }

    //--------------------------------------------------------------------------    
    protected function setPrimary( $_primary )
    {
        $this->_primary = $_primary;
    }

    //--------------------------------------------------------------------------
    /**
     * getTotal() Retorna a quantidade total de registros do Select utilizado
     *
     * @return inteiro
     */
    public function getTotal()
    {
        return $this->_total;
    }

    //--------------------------------------------------------------------------
    /**
     * setTotal() Salva a quantidade total de registros do respectivo Select passado por parametro
     *
     * @param string $sub_select Select utilizado
     */
    protected function setTotal( $sub_select = null )
    {
        $select = $this->_db->select();

        $select->from( $sub_select, array( 'COUNT(*) AS TOTAL' ) );

        try
        {
            $result = $this->_db->fetchRow( $select );
            $this->_total = (int) $result['TOTAL'];
        }
        catch ( Zend_Db_Exception $e )
        {
            //Salva erro no Log
            if ( Zend_Registry::isRegistered( 'logger' ) )
            {
                Zend_Registry::get( 'logger' )->err( $e->getMessage() );
            }
        }
    }

    //--------------------------------------------------------------------------    
    /**
     * getNextId()
     * Retorna o próximo valor da chave primaria da tabela
     *
     * @return inteiro
     */
    public function getNextId()
    {
        //guarda o valor da última Identity da tabela
        $lastId = $this->getLastId();

        if ( $lastId >= 0 )
        {
            return $lastId + 1;
        }
        else
        {
            return false;
        }
    }

    //--------------------------------------------------------------------------
    /**
     * getLastId()
     * Retorna o valor da última Identity da tabela
     *
     * @return inteiro
     */
    public function getLastId()
    {
        $select = $this->_db->select();

        $sql = 'MAX(' . $this->_primary . ') as TOTAL';

        $select->from( $this->_name, $sql );

        try
        {
            $result = $this->_db->fetchRow( $select );

            return (int) $result['TOTAL'];
        }
        catch ( Zend_Db_Exception $e )
        {
            //Salva erro no Log
            if ( Zend_Registry::isRegistered( 'logger' ) )
            {
                Zend_Registry::get( 'logger' )->err( $e->getMessage() );
            }

            return false;
        }
    }

    //--------------------------------------------------------------------------
    /**
     * listar()
     * Retorna todos os dados da tabela
     *
     * @return array
     */
    public function listar( $where = null, $order = null )
    {
        $select = $this->_db->select();

        $select->from( $this->_name );

        //verifica se foi passado algum where
        if ( $where )
        {
            $select->where( $where );
        }

        //verifica se foi passado algum order by
        if ( $order )
        {
            $select->order( $order );
        }
        else
        {
            $select->order( $this->_primary );
        }

        try
        {
            //retorna resultado
            return $this->_db->fetchAll( $select );
        }
        catch ( Zend_Exception $e )
        {
            //Salva erro no Log
            if ( Zend_Registry::isRegistered( 'logger' ) )
            {
                Zend_Registry::get( 'logger' )->err( $e->getMessage() );
            }

            //em caso de erro retorna array vazio
            return array( );
        }
    }

    //--------------------------------------------------------------------------
    /**
     * getId( $id )
     * 
     * Retorna a linha da tabela onde $id for igual ao valor da PK
     * 
     * @param integer $id
     * @return array
     */
    public function getId( $id )
    {
        $select = $this->_db->select();

        $select->from( $this->_name )
                ->where( $this->_primary . ' = ?', $id );

        try
        {
            //retorna resultado
            return $this->_db->fetchRow( $select );
        }
        catch ( Zend_Db_Exception $e )
        {
            //Salva erro no Log
            if ( Zend_Registry::isRegistered( 'logger' ) )
            {
                Zend_Registry::get( 'logger' )->err( $e->getMessage() );
            }

            //em caso de erro retorna array vazio
            return array( );
        }
    }

    //--------------------------------------------------------------------------
    /**
     * getColumnValue
     * 
     * Retorna o valor da terminada coluna da linha
     * 
     * @param integer $id
     * @param string $column Nome da coluna desejada
     * @return array
     */
    public function getColumnValue( $id, $column )
    {
        try
        {
            $result = $this->getId( $id );

            //retorna resultado
            return $result[$column];
        }
        catch ( Exception $e )
        {
            //Salva erro no Log
            if ( Zend_Registry::isRegistered( 'logger' ) )
            {
                Zend_Registry::get( 'logger' )->err( $e->getMessage() );
            }

            //em caso de erro retorna array vazio
            return array( );
        }
    }

    //--------------------------------------------------------------------------
    /**
     * delete()
     * Apaga uma linha na tabela
     *
     * @param int $id Id da linha a ser apagada
     * 
     * @return bool True ou False
     */
    public function delete( $id )
    {
        try
        {
            $this->_db->delete( $this->_name, $this->_primary . ' = ' . (int) $id );

            return true;
        }
        catch ( Zend_Db_Exception $e )
        {
            //Salva erro no Log
            if ( Zend_Registry::isRegistered( 'logger' ) )
            {
                Zend_Registry::get( 'logger' )->err( $e->getMessage() );
            }

            return false;
        }
    }

    //--------------------------------------------------------------------------
    /**
     * @name save
     * 
     * Função que insere no BD ou atualiza um registro no BD
     * 
     * @author TRB
     * @version 1.0
     * 
     * @param Model $model Objeto Model
     * @param boolean $useTransaction Define se é pra usar transação no banco
     * @param boolean $profiler Define se é para fazer log dos parâmetros da operação de update e insert
     * @return boolean TRUE|FALSE
     */
    public function save( Urbs_Model_Model $model, $useTransaction = true, $profiler = true )
    {
        try
        {
            //verifica se o objeto é filho da classe Urbs_Model_Model
            if ( get_parent_class( $model ) != 'Urbs_Model_Model' )
            {
                throw new Zend_Db_Exception( 'Método Save não suporta objetos da classe: ' . get_class( $model ) );
            }

            //guarda os dados do objeto model em um array
            $data = $model->toArray();

            // fazer log das transações sql
            $this->_db->getProfiler()->setEnabled( $profiler );

            //inicia transação no banco
            if ( $useTransaction )
            {
                $this->_db->beginTransaction();
            }

            //verifica se existe chave primaria na tabela
            if ( $this->_primary )
            {
                //verifica se o campo de chave primaria está preenchido
                if ( null === ( $id = $model->__get( $this->_primary ) ) )
                {//se nao estiver preenchido quer dizer que é uma nova inserção no BD
                    //obtem o valor da chave primaria da tabela
                    if ( $this->_sequence )
                    {//se foi definido que a tabela tem uma sequencia para gerar PK, usa ela
                        $nextId = $this->_db->nextSequenceId( $this->_sequence );
                    }
                    else
                    {//senao utiliza a função que pega o maior valor das PK e soma 1
                        $nextId = $this->getNextId();
                    }

                    //preenche o campo da chave primaria com o seu valor
                    $data[$this->_primary] = $nextId;

                    //insere no banco
                    $this->_db->insert( $this->_name, $data );
                }
                else
                {
                    //atualiza o banco
                    $this->_db->update( $this->_name, $data, array( $this->_primary . ' = ?' => $id ) );
                }
            }
            else
            {
                $this->_db->insert( $this->_name, $data );
            }
        }
        catch ( Zend_Db_Exception $e )
        {
            //recolhe os parametros SQL
            if ( $profiler )
            {
                $params = " params:" . implode( '; ', $this->_db->getProfiler()->getLastQueryProfile()->getQueryParams() );
                $this->_db->getProfiler()->setEnabled( false );
            }

            //em caso de erro, faz rollback da transação no banco
            if ( $useTransaction )
            {
                $this->_db->rollBack();
            }

            //Salva erro no Log
            if ( Zend_Registry::isRegistered( 'logger' ) )
            {
                Zend_Registry::get( 'logger' )->err( $e->getMessage() . $params );
            }

            //retorna erro
            return false;
        }

        //em caso de sucesso, comita transação
        if ( $useTransaction )
        {
            $this->_db->commit();
        }

        //retorna sucesso
        if($nextId){
            return $nextId;
        }else
            return true;
    }

    //--------------------------------------------------------------------------
    /**
     * Tenta executar o select passado, retornando todos os resultados
     * Caso ocorra erro, salva o erro ocorrido no arquivo de log (se estiver habilitado)
     * 
     * @param string $select
     * @return array
     */
    public function returnAll( $select )
    {
        try
        {
            return $this->_db->fetchAll( $select );
        }
        catch ( Zend_Db_Exception $e )
        {
            if ( Zend_Registry::isRegistered( 'logger' ) )
            {
                //Salva erro no Log
                Zend_Registry::get( 'logger' )->err( $e->getMessage() );
            }
            return false;
        }
    }

    //--------------------------------------------------------------------------
    /**
     * Tenta executar o select passado, retornando um resultado
     * Caso ocorra erro, salva o erro ocorrido no arquivo de log (se estiver habilitado)
     * 
     * @param string $select
     * @return array
     */
    public function returnOne( $select )
    {
        try
        {
            return $this->_db->fetchRow( $select );
        }
        catch ( Zend_Db_Exception $e )
        {
            if ( Zend_Registry::isRegistered( 'logger' ) )
            {
                //Salva erro no Log
                Zend_Registry::get( 'logger' )->err( $e->getMessage() );
            }
            return false;
        }
    }

}

?>
