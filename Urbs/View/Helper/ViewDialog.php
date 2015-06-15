<?php

class Urbs_View_Helper_ViewDialog extends Zend_View_Helper_Abstract
{

	public function viewDialog( $id, $callback = 'view', $description = 'Visualizar registro' )
	{
		if ( defined( 'TWITTER_BOOTSTRAP' ) ) { // Verifica se o layout usa bootstrap

			$output = '<a href="#" title="' . $description . '" onClick="' . $callback . '(' . $id . ')">';
			$output .= '<i class="icon-search"></i>';
			$output .= '</a>';

		} else {

			$output = '<a href="#" title="' . $description . '" onClick="' . $callback . '(' . $id . ')">';
			$output .= '<img style="vertical-align: bottom; padding: 0px 5px 0px 5px;" width="18" src="' . INCLUDE_PATH . '/img/view.png"/> ';
			$output .= '</a>';

		}
		return $output;
	}
}

?>