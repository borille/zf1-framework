<?php

class Urbs_View_Helper_AppendTo extends Zend_View_Helper_Abstract
{

	/**
	 * Helper para adicionar o conteudo a um elemento
	 * @param string $id Id do elemento
	 * @param $content Conteudo
	 */
	public function appendTo( $id, $content = null )
	{
		$this->view->headScript()->appendScript( "$('#$id').append('$content');" );
	}

}

?>