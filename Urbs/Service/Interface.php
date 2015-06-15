<?php

interface Urbs_Service_Interface
{
	/**
	 * Deve retornar uma instancia da propria classe
	 */
	public static function getInstance();

	/**
	 * Deve retornar o repositorio utilizado
	 */
	function getRepository();
}