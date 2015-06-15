<?php

require_once 'Zend/Db/Table/Abstract.php';

/**
 * Class for SQL table interface. Extends Zend_Db_Table_Abstract
 *
 * @category    Urbs
 * @package     Urbs_Db
 * @subpackage  Table
 * @name        Urbs_Db_Table_Abstract
 * @copyright   Copyright (c) 2012 - URBS
 * @author      TRB
 * @version     1.0
 */
abstract class Urbs_Db_Table_Abstract extends Zend_Db_Table_Abstract
{
	/**
	 * Guarda o total de linhas da query
	 * @var integer
	 */
	protected $_total = 0;

	/**
	 * Guarda o valor da �ltima chave prim�ria inserida no banco
	 * @var mixed
	 */
	protected $_lastInsertedId = null;

	/**
	 * Table alias
	 * @var string
	 */
	protected $_tableAlias = null;

	//--------------------------------------------------------------------------
	/**
	 * __destruct() - Destrutor da classe
	 *
	 * Fecha a conex�o com o Bando de Dados
	 */
	public function __destruct()
	{
		if ( $this->_db->isConnected() ) {
			$this->_db->closeConnection();
		}
	}

	//--------------------------------------------------------------------------
	/**
	 * Definir a configura��o do DbTable
	 *
	 * @param string $schema            Nome do Schema
	 * @param string|array $name        Nome da Tabela
	 * @param string|array $primary     Nome(s) da(s) chave(s) prim�ria(s)     *
	 * @param string $sequence          Nome da sequence
	 * @param array $cols               Array com o nome das colunas da tabela
	 * @return Urbs_Db_Table_Abstract
	 */
	public function configDbTable( $schema = null, $name = null, $primary = null, $sequence = null, array $cols = null )
	{
		$this->_schema = $schema;
		$this->_primary = $primary;
		$this->_sequence = $sequence;
		$this->_cols = $cols;

		if ( is_array( $name ) ) {
			$this->_tableAlias = key( $name );
			$this->_name = array_pop( $name );
		} else {
			$this->_name = $name;
		}
		return $this;
	}

	/**
	 * Retorna uma instancia da classe filha de Urbs_Db_Table_Abstract
	 *
	 * @return Urbs_Db_Table_Abstract
	 */
	public final static function getInstance()
	{
		return new static();
	}

	//--------------------------------------------------------------------------
	/**
	 * Retorna a(s) chave(s) prim�ria(s) da tabela
	 *
	 * @return string
	 */
	public function getPrimary()
	{
		return $this->_primary;
	}

	//--------------------------------------------------------------------------
	/**
	 * Retornar o nome da tabela
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->_name;
	}

	//--------------------------------------------------------------------------
	/**
	 * Retorna o nome da Sequence da tabela
	 *
	 * @return string
	 */
	public function getSequence()
	{
		return $this->_sequence;
	}

	//--------------------------------------------------------------------------
	/**
	 * Retorna o nome da tabela do banco j� com o schema (se existir)
	 *
	 * @return string
	 */
	public function getTableName()
	{
		return ( $this->_schema ? $this->_schema . '.' : '' ) . $this->_name;
	}

	//--------------------------------------------------------------------------
	/**
	 * @return array
	 * @throws Exception
	 */
	public function getTableNameWithAlias()
	{
		if ( !$this->_tableAlias ) {
			throw new Exception( 'A tabela n�o possui alias' );
		}
		return array( $this->getTableAlias() => $this->getName() );
	}

	//--------------------------------------------------------------------------
	/**
	 * Retorna o total de linhas da �ltima query que utilizou o setTotal
	 *
	 * @return integer
	 */
	public function getTotal()
	{
		return $this->_total;
	}

	//--------------------------------------------------------------------------
	/**
	 * Retorna o valor da chave prim�ria da �ltima opera��o de insert no banco
	 *
	 * @return mixed
	 */
	public function getLastInsertedId()
	{
		return $this->_lastInsertedId;
	}

	//--------------------------------------------------------------------------
	/**
	 * @param string $alias
	 * @return Urbs_Db_Table_Abstract
	 */
	public function setTableAlias( $alias )
	{
		$this->_tableAlias = $alias;
		return $this;
	}

	//--------------------------------------------------------------------------
	/**
	 * @return null|string
	 */
	public function getTableAlias()
	{
		return $this->_tableAlias;
	}

	//--------------------------------------------------------------------------
	/**
	 * Salva o total de linhas da query passada como par�metro
	 *
	 * @param string|Zend_Db_Table_Select $sub_select
	 */
	public function setTotal( $sub_select = null )
	{
		$select = $this->_db->select();
		$select->from( $sub_select, array( 'COUNT(*) AS TOTAL' ) );

		try {
			$this->_total = (int)$this->_db->fetchOne( $select );
		} catch ( Zend_Db_Exception $e ) {
			Urbs_Action_Helper::logger( $e->getMessage(), Zend_Log::ERR );
		}
	}

	//--------------------------------------------------------------------------
	/**
	 * Retorna as colunas especificadas de todas as linhas (dentro da clausula where)
	 *
	 * @param string|array $cols   Colunas desejadas
	 * @param string|array $where  OPTIONAL An SQL WHERE clause or Zend_Db_Table_Select object.
	 * @param string $order  OPTIONAL An SQL ORDER BY order.
	 * @param int $count  OPTIONAL An SQL LIMIT count.
	 * @param int $offset OPTIONAL An SQL LIMIT offset.
	 * @return array
	 */
	public function listAll( $cols = '*', $where = null, $order = null, $count = null, $offset = null )
	{
		$select = $this->getSelect( $cols );

		if ( $where ) {
			$this->addWhere( $select, $where );
		}

		if ( $order ) {
			if ( is_array( $order ) ) {
				foreach ( $order as $value ) {
					$select->order( $value );
				}
			} else {
				$select->order( $order );
			}
		}

		if ( $count ) {
			$select->count( $count );
		}

		if ( $offset ) {
			$select->offset( $offset );
		}

		try {
			return $this->_db->fetchAll( $select );
		} catch ( Zend_Db_Exception $e ) {
			Urbs_Action_Helper::logger( $e->getMessage(), Zend_Log::ERR );
			return array();
		}
	}

	//--------------------------------------------------------------------------
	/**
	 * Retorna as colunas especificadas da linha (dentro da clausula where)
	 *
	 * @param string|array $cols   Colunas desejadas
	 * @param string|array|Zend_Db_Table_Select $where  OPTIONAL An SQL WHERE clause or Zend_Db_Table_Select object.
	 * @return array
	 */
	public function listOne( $cols = '*', $where = null )
	{
		$select = $this->getSelect( $cols );

		if ( $where ) {
			$this->addWhere( $select, $where );
		}

		try {
			return $this->_db->fetchRow( $select );
		} catch ( Zend_Db_Exception $e ) {
			Urbs_Action_Helper::logger( $e->getMessage(), Zend_Log::ERR );
			return array();
		}
	}

	//--------------------------------------------------------------------------
	/**
	 * Retorna array com os dados da linha em que a chave prim�ria for igual ao $pkValue
	 *
	 * @param mixed $pkValue    Valor ou Array de valores para chave prim�ria
	 * @param string|array $cols       Colunas que se�o retornadas
	 * @return array
	 */
	public function getId( $pkValue = null, $cols = '*' )
	{
		$select = $this->getSelect( $cols );

		foreach ( $this->montaWherePK( $pkValue ) as $cond ) {
			$select->where( $cond );
		}
		try {
			return $this->_db->fetchRow( $select );
		} catch ( Zend_Db_Exception $e ) {
			Urbs_Action_Helper::logger( $e->getMessage(), Zend_Log::ERR );
			return array();
		}
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
		try {
			return $this->_db->fetchAll( $select );
		} catch ( Zend_Db_Exception $e ) {
			Urbs_Action_Helper::logger( $e->getMessage(), Zend_Log::ERR );
			return array();
		}
	}

	//--------------------------------------------------------------------------
	/**
	 * Tenta executar o select passado, retornando um resultado
	 * Caso ocorra erro, salva o erro ocorrido no arquivo de log (se estiver habilitado)
	 *
	 * @param   string $select
	 * @return  array
	 */
	public function returnOne( $select )
	{
		try {
			return $this->_db->fetchRow( $select );
		} catch ( Zend_Db_Exception $e ) {
			Urbs_Action_Helper::logger( $e->getMessage(), Zend_Log::ERR );
			return array();
		}
	}

	//--------------------------------------------------------------------------
	/**
	 * getLastId()
	 * Retorna o valor da �ltima PK da tabela
	 *
	 * @return integer
	 */
	public function getLastId()
	{
		if ( is_array( $this->_primary ) ) {
			throw new Zend_db_Exception( 'N�o foi poss�vel determinar o �ltimo valor da PK. A tabela possui mais de uma PK' );
		}

		$select = $this->_db->select();
		$select->from( $this->getTableName(), new Zend_Db_Expr( 'MAX(' . $this->_primary . ')' ) );

		try {
			return (int)$this->_db->fetchOne( $select );
		} catch ( Zend_Db_Exception $e ) {
			Urbs_Action_Helper::logger( $e->getMessage(), Zend_Log::ERR );
			return false;
		}
	}

	//--------------------------------------------------------------------------
	/**
	 * getNextId()
	 * Retorna o pr�ximo valor da chave primaria da tabela
	 *
	 * @return inteiro
	 */
	public function getNextId()
	{
		//guarda o valor da �ltima Identity da tabela
		$lastId = $this->getLastId();

		if ( $lastId >= 0 ) {
			return $lastId + 1;
		} else {
			return false;
		}
	}

	//--------------------------------------------------------------------------
	/**
	 * Apaga uma linha da tabela
	 *
	 * @param   mixed $pkValue        Valor ou array com valores da chave prim�ria da linha que ser� apagada
	 * @param   boolean $transaction    Se � para utilizar transa��o ou n�o (default: TRUE)
	 * @return  boolean                             Sucesso ou Falha
	 * @throws  Zend_Db_Exception
	 */
	public function delete( $pkValue, $transaction = true )
	{
		//monta clausula where
		$where = $this->montaWherePK( $pkValue );

		try {
			//inicia transa��o no banco
			if ( $transaction ) {
				$this->_db->beginTransaction();
			}

			parent::delete( $where );

			//inicia transa��o no banco
			if ( $transaction ) {
				$this->_db->commit();
			}
		} catch ( Zend_Db_Exception $e ) {
			//inicia transa��o no banco
			if ( $transaction ) {
				$this->_db->rollBack();
			}

			Urbs_Action_Helper::logger( $e->getMessage(), Zend_Log::ERR );

			if ( !$transaction ) {
				throw new Exception( $e->getMessage() );
			}

			return false;
		}
		return true;
	}

	//--------------------------------------------------------------------------
	/**
	 * Insere uma linha no banco
	 *
	 * @param   array|Urbs_Model_Abstract $data           Dados a serem inseridos
	 * @param   boolean $transaction    Se � para utilizar transa��o ou n�o (default: TRUE)
	 * @param   boolean $profiler       Define se � para fazer log dos par�metros da opera��o de insert
	 * @return  mixed                                       Valor da chave prim�ria inserida
	 */
	public function insert( $data, $transaction = true, $profiler = true )
	{
		//se o objeto � filho da classe Urbs_Model_Abstract, converte para um array
		if ( get_parent_class( $data ) == 'Urbs_Model_Abstract' ) {
			$data = $data->toArray();
		}

		//se foi definido as colunas da tabela, monta um array com esses campos como ind�ce do array que ser� inserido
		if ( isset( $this->_cols ) ) {
			$tmpData = array();

			foreach ( $this->_cols as $col ) {
				if ( array_key_exists( $col, $data ) ) {
					$tmpData[$col] = $data[$col];
				}
			}
			$data = $tmpData;
		}

		//se o valor da chave primaria for em branco, seta como nulo
		if ( $this->getPrimary() ) {
			if ( !is_array( $this->getPrimary() ) ) {
				if ( isset( $data[$this->getPrimary()] ) ) {
					if ( $data[$this->getPrimary()] == '' ) {
						$data[$this->getPrimary()] = null;
					}
				} else {
					$data[$this->getPrimary()] = null;
				}
			}
		}

		try {
			// fazer log das transa��es sql
			$this->_db->getProfiler()->setEnabled( $profiler );

			//inicia transa��o no banco
			if ( $transaction ) {
				$this->_db->beginTransaction();
			}

			//insere no banco
			$this->_lastInsertedId = parent::insert( $data );

			//commit
			if ( $transaction ) {
				$this->_db->commit();
			}
		} catch ( Zend_Db_Exception $e ) {
			//rollback
			if ( $transaction ) {
				$this->_db->rollBack();
			}

			//recolhe os parametros SQL
			if ( $profiler ) {
				$params = " params:" . implode( '; ', $this->_db->getProfiler()->getLastQueryProfile()->getQueryParams() );
				$this->_db->getProfiler()->setEnabled( false );
			}

			Urbs_Action_Helper::logger( $e->getMessage() . $params, Zend_Log::ERR );

			if ( !$transaction ) {
				throw new Exception( $e->getMessage() );
			}

			return false;
		}

		return $this->_lastInsertedId;
	}

	//--------------------------------------------------------------------------
	/**
	 * Salva(insere ou atualiza) o dados no banco
	 *
	 * @param   array|Urbs_Model_Abstract $data           Dados a serem inseridos
	 * @param   mixed|array $pkValue        Valor ou array com valores da chave prim�ria da linha que ser� atualizada
	 * @param   boolean $transaction    Se � para utilizar transa��o ou n�o (default: TRUE)
	 * @param   boolean $profiler       Define se � para fazer log dos par�metros da opera��o de insert
	 * @return  boolean                                     Sucesso ou Falha
	 */
	public function save( $data, $pkValue = null, $transaction = true, $profiler = true )
	{
		//se o objeto � filho da classe Urbs_Model_Abstract, converte para um array
		if ( get_parent_class( $data ) == 'Urbs_Model_Abstract' ) {
			$data = $data->toArray();
		}

		//se foi definido as colunas da tabela, monta um array verificando se os parametros passados pertencem a tabela
		if ( isset( $this->_cols ) ) {
			$tmpData = array();

			foreach ( $data as $key => $value ) {
				if ( in_array( $key, $this->_cols ) ) {
					$tmpData[$key] = $value;
				}
			}
			$data = $tmpData;
		}

		try {
			// fazer log das transa��es sql
			$this->_db->getProfiler()->setEnabled( $profiler );

			//inicia transa��o no banco
			if ( $transaction ) {
				$this->_db->beginTransaction();
			}

			//verifica se a tabela tem PK
			if ( $this->getPrimary() ) {
				$insert = false;

				//verifica se todos os campos de chave primaria estao preenchidos
				if ( is_array( $this->getPrimary() ) ) {
					foreach ( $this->getPrimary() as $value ) {
						if ( $data[$value] == null || $data[$value] == '' ) {
							$insert = true;
						}
					}
				} else {
					if ( isset( $data[$this->getPrimary()] ) ) {
						if ( $data[$this->getPrimary()] == null || $data[$this->getPrimary()] == '' ) {
							$insert = true;
						}
					} else {
						$insert = true;
					}
				}

				//se os campos de chave primaria est�o preenchidos
				if ( $insert ) {
					//insere no banco
					$this->_lastInsertedId = parent::insert( $data );
				} else {
					//verifica se foi passado o valor da PK que ser� atualizada
					if ( !$pkValue ) {
						$pkValue = array();

						foreach ( (array)$this->getPrimary() as $value ) {
							$pkValue[] = $data[$value];
						}
					}

					//monta clausula where
					$where = $this->montaWherePK( $pkValue );

					//atualiza o banco
					parent::update( $data, $where );
				}
			} else {
				//insere no banco
				$this->_lastInsertedId = parent::insert( $data );
			}

			//commit
			if ( $transaction ) {
				$this->_db->commit();
			}
		} catch ( Zend_Db_Exception $e ) {
			//rollback
			if ( $transaction ) {
				$this->_db->rollBack();
			}

			//recolhe os parametros SQL
			if ( $profiler ) {
				$params = " params:" . implode( '; ', $this->_db->getProfiler()->getLastQueryProfile()->getQueryParams() );
				$this->_db->getProfiler()->setEnabled( false );
			}

			Urbs_Action_Helper::logger( $e->getMessage() . $params, Zend_Log::ERR );

			if ( !$transaction ) {
				throw new Exception( $e->getMessage() );
			}

			return false;
		}
		return true;
	}

	//--------------------------------------------------------------------------
	/**
	 * Atualiza uma linha no banco
	 *
	 * @param   array|Urbs_Model_Abstract $data           Dados a serem inseridos
	 * @param   mixed|array $pkValue        Valor ou array com valores da chave prim�ria da linha que ser� atualizada
	 * @param   boolean $transaction    Se � para utilizar transa��o ou n�o (default: TRUE)
	 * @param   boolean $profiler       Define se � para fazer log dos par�metros da opera��o de insert
	 * @param   boolean $returnPk       Retorna o pk do obj inserido
	 * @return  boolean                                     Sucesso ou Falha
	 */
	public function update( $data, $pkValue = null, $transaction = true, $profiler = true, $returnPk = false )
	{
		//se o objeto � filho da classe Urbs_Model_Abstract, converte para um array
		if ( get_parent_class( $data ) == 'Urbs_Model_Abstract' ) {
			$data = $data->toArray();
		}

		//se foi definido as colunas da tabela, monta um array verificando se os parametros passados pertencem a tabela
		if ( isset( $this->_cols ) ) {
			$tmpData = array();

			foreach ( $data as $key => $value ) {
				if ( in_array( $key, $this->_cols ) ) {
					$tmpData[$key] = $value;
				}
			}
			$data = $tmpData;
		}

		//verifica se foi passado o valor da PK que ser� atualizada
		if ( !$pkValue ) {
			$pkValue = array();

			foreach ( (array)$this->_primary as $value ) {
				$pkValue[] = $data[$value];
			}
		}

		//monta clausula where
		$where = $this->montaWherePK( $pkValue );

		try {
			// fazer log das transa��es sql
			$this->_db->getProfiler()->setEnabled( $profiler );

			//inicia transa��o no banco
			if ( $transaction ) {
				$this->_db->beginTransaction();
			}

			//atualiza o banco
			parent::update( $data, $where );

			//commit
			if ( $transaction ) {
				$this->_db->commit();
			}
		} catch ( Zend_Db_Exception $e ) {
			//rollback
			if ( $transaction ) {
				$this->_db->rollBack();
			}

			//recolhe os parametros SQL
			if ( $profiler ) {
				$params = " params:" . implode( '; ', $this->_db->getProfiler()->getLastQueryProfile()->getQueryParams() );
				$this->_db->getProfiler()->setEnabled( false );
			}

			Urbs_Action_Helper::logger( $e->getMessage() . $params, Zend_Log::ERR );

			if ( !$transaction ) {
				throw new Exception( $e->getMessage() );
			}

			return false;
		}
		if ( $returnPk ) return $pkValue;
		else return true;

	}

	//--------------------------------------------------------------------------
	/**
	 * Monta as clausulas where conforme o valor passado no parametro id
	 *
	 * @param   mixed|array $pkValue    Valor ou array com valores da chave prim�ria da linha
	 * @return  string|array
	 * @throws  Zend_Db_Exception
	 */
	private function montaWherePK( $pkValue )
	{
		$where = array();
		$primary = (array)$this->_primary;
		$pkValue = (array)$pkValue;

		if ( sizeof( $primary ) != sizeof( $pkValue ) ) {
			throw new Zend_Db_Exception( 'Par�metros para chave prim�ria inv�lidos' );
		} else {
			if ( $primary != array() ) {
				$array = array_combine( $primary, $pkValue );
				foreach ( $array as $key => $value ) {
					$where[] = $this->_db->quoteInto( "$key = ?", $value );
				}
			}
		}

		return $where;
	}

	//--------------------------------------------------------------------------
	/**
	 * Adiciona clausula where ao Zend_Db_Select passado
	 *
	 * @param Zend_Db_Select $select
	 * @param string|array $where
	 * @return Zend_Db_Select
	 */
	private function addWhere( Zend_Db_Select $select, $where )
	{
		$where = (array)$where;

		foreach ( $where as $key => $value ) {
			if ( is_int( $key ) ) {
				$select->where( $value );
			} else {
				$select->where( $key, $value );
			}
		}
		return $select;
	}

	//--------------------------------------------------------------------------
	/**
	 * Retorna o resultado da consulta do cache (caso ainda n�o exista no cache, salva o resultado nele)
	 *
	 * @param string $cacheName          Nome que ser� utilizado para ler/salvar o cache
	 * @param string $callbackFunction   Nome da fun��o que ser� chamada caso ainda n�o exista essa informa��o no cache
	 * @param mixed $parameters         Par�metros da fun��o de Callback (Opcional)
	 * @return array
	 */
	public function returnFromCache( $cacheName, $callbackFunction, $parameters = null )
	{
		//verifica se o cache est� habilitado
		if ( Zend_Registry::isRegistered( 'cache' ) ) {
			$cache = Zend_Registry::get( 'cache' );

			//verifica se existe o resultado em cache
			if ( !$result = $cache->load( ( $cacheName ) ) ) {
				//caso n�o exista, executa a fun��o e salva o resultado no cache
				$result = call_user_func( array( $this, $callbackFunction ), $parameters );
				$cache->save( $result, $cacheName );
			}
		} else {
			$result = call_user_func( array( $this, $callbackFunction ), $parameters );
		}
		return $result;
	}

	/**
	 * Retorna o resultado da consulta do cache global (caso ainda n�o exista no cache, salva o resultado nele)
	 *
	 * @param $cacheName        Nome do cache
	 * @param $callbackFunction Nome da fun��o a ser chamada caso n�o exista cache ainda
	 * @param null $parameters  Parametros da Fun��o a ser chamada
	 * @param int $lifeTime     Tempo de vida da cache
	 * @param null $cacheDir    Diret�rio da cache
	 * @return false|mixed
	 */
	public function returnFromGlobalCache( $cacheName, $callbackFunction, $parameters = null, $lifeTime = 86400, $cacheDir = null )
	{
		if ( !$cacheDir ) {
			$cacheDir = $_SERVER['DOCUMENT_ROOT'] . '/Geral/Zend/public/cache';
		}

		require_once 'Zend/Cache.php';
		$cache = Zend_Cache::factory(
			'core',
			'file',
			array( 'automatic_serialization' => true, 'lifetime' => $lifeTime ),
			array( 'cache_dir' => $cacheDir )
		);

		//verifica se existe o resultado em cache
		if ( !$result = $cache->load( ( $cacheName ) ) ) {
			//caso n�o exista, executa a fun��o e salva o resultado no cache
			$result = call_user_func( array( $this, $callbackFunction ), $parameters );
			$cache->save( $result, $cacheName );
		}
		return $result;
	}

	//--------------------------------------------------------------------------
	/**
	 * Retorna um objeto do tipo Zend_Db_Select com a seguinte query: SELECT * FROM TABLE_NAME
	 * @param string|array $cols   Colunas desejadas
	 * @return Zend_Db_Select
	 */
	public function getSelect( $cols = '*' )
	{
		return $this->getAdapter()->select()
			->from( ( $this->_tableAlias !== null ) ? array( $this->_tableAlias => $this->_name ) : $this->_name, $cols ? $cols : '*', $this->_schema );
	}

	/**
	 * Retorna o valor da coluna definida da linha em que a chave prim�ria for igual ao $pkValue
	 *
	 * @param mixed $pkValue    Valor ou Array de valores para chave prim�ria
	 * @param string $col       Coluna que ser� retornada
	 * @return mixed
	 */
	public function getRowValue( $pkValue, $col )
	{
		if ( !is_string( $col ) ) {
			throw new Zend_Db_Table_Exception( 'A coluna informada deve ser string' );
		}

		$result = $this->getId( $pkValue, $col );
		return $result[$col];
	}

	/**
	 * Retorna o valor da coluna definida do resultado do SQL
	 *
	 * @param mixed $sql        Sql a ser executado
	 * @param string $col       Coluna que ser� retornada
	 * @return mixed
	 */
	public function getRowValueFromSql( $sql, $col )
	{
		if ( !is_string( $col ) ) {
			throw new Zend_Db_Table_Exception( 'A coluna informada deve ser string' );
		}

		$result = $this->returnOne( $sql );
		return $result[$col];
	}
}