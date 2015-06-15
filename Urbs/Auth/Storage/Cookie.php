<?php

/**
 * @see Zend_Auth_Storage_Interface
 */
require_once 'Zend/Auth/Storage/Interface.php';

class Urbs_Auth_Storage_Cookie implements Zend_Auth_Storage_Interface
{
	/**
	 * Default session namespace
	 */
	const NAMESPACE_DEFAULT = 'Zend_Auth';

	/**
	 * Default cookie path
	 */
	const PATH_DEFAULT = '/';

	/**
	 * Default cookie expiration time 8h
	 */
	const EXPIRE_DEFAULT = 28800;

	/**
	 * Session namespace
	 *
	 * @var mixed
	 */
	protected $_namespace;

	/**
	 * Cookie path
	 *
	 * @var mixed
	 */
	protected $_path;

	/**
	 * Cookie expiration time
	 *
	 * @var mixed
	 */
	protected $_expire;

	/**
	 * Sets session storage options and initializes session namespace object
	 *
	 * @param  mixed $namespace
	 * @return void
	 */
	public function __construct( $namespace = self::NAMESPACE_DEFAULT, $expire = self::EXPIRE_DEFAULT, $path = self::PATH_DEFAULT )
	{
		$this->_namespace = $namespace;
		$this->_expire = $expire;
		$this->_path = $path;
	}

	/**
	 * Returns the session namespace
	 *
	 * @return string
	 */
	public function getNamespace()
	{
		return $this->_namespace;
	}

	/**
	 * @return mixed
	 */
	public function getExpirationTime()
	{
		return $this->_expire;
	}

	/**
	 * @param mixed $expire
	 * @return $this
	 */
	public function setExpirationTime( $expire )
	{
		$this->_expire = $expire;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPath()
	{
		return $this->_path;
	}

	/**
	 * @param mixed $path
	 * @return $this
	 */
	public function setPath( $path )
	{
		$this->_path = $path;
		return $this;
	}

	/**
	 * Returns true if and only if storage is empty
	 *
	 * @throws Zend_Auth_Storage_Exception If it is impossible to determine whether storage is empty
	 * @return boolean
	 */
	public function isEmpty()
	{
		return !isset( $_COOKIE[$this->_namespace] );
	}

	/**
	 * Returns the contents of storage
	 *
	 * Behavior is undefined when storage is empty.
	 *
	 * @throws Zend_Auth_Storage_Exception If reading contents from storage is impossible
	 * @return mixed
	 */
	public function read()
	{
		return unserialize( $_COOKIE[$this->_namespace] );
	}

	/**
	 * Writes $contents to storage
	 *
	 * @param  mixed $contents
	 * @throws Zend_Auth_Storage_Exception If writing $contents to storage is impossible
	 * @return void
	 */
	public function write( $contents )
	{
		setcookie( $this->_namespace, serialize( $contents ), time() + $this->_expire, $this->_path );
	}

	/**
	 * Clears contents from storage
	 *
	 * @throws Zend_Auth_Storage_Exception If clearing contents from storage is impossible
	 * @return void
	 */
	public function clear()
	{
		if ( isset( $_COOKIE[$this->_namespace] ) ) {
			unset( $_COOKIE[$this->_namespace] );
			setcookie( $this->_namespace, null, time() - 3600, $this->_path ); // empty value and old timestamp
		}
	}

}