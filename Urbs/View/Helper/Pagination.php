<?php

/**
 * View Helper para mostrar a paginação
 *
 * @author tborille
 *
 * @param $params['page'] int Número da página atual
 * @param $params['limit'] int Máximo de itens por página
 * @param $params['total'] int Total de itens da consulta
 */
class Urbs_View_Helper_Pagination extends Zend_View_Helper_Abstract
{

	public function pagination( $params = array() )
	{
		//salva o nome do controller e action atuais
		$controller = Zend_Controller_Front::getInstance()->getRequest()->getControllerName();
		$action = Zend_Controller_Front::getInstance()->getRequest()->getActionName();


		$limit = $params['limit'];
		$page = ( $params['page'] <= 0 ) ? 1 : $params['page'];

		$total_pages = ceil( $params['total'] / $limit );

		$start_page = ( ( $page - 5 ) < 1 ) ? 1 : $page - 5;
		$end_page = ( ( $start_page + 10 ) > $total_pages ) ? $total_pages : $start_page + 10;

		$next_page = ( $page < $total_pages ) ? $page + 1 : $total_pages;
		$back_page = ( $page > 1 ) ? $page - 1 : $start_page;

		$current_page = $start_page;

		$get_params = isset( $params['getParams'] ) ? $params['getParams'] : null;

		if ( defined( 'TWITTER_BOOTSTRAP' ) ) {
			$output = '<div class="pagination pagination-centered"><ul>';

			if ( $page > 1 ) {
				$output .= "<li class=''><a href='" . $this->view->url( array( 'controller' => $controller, 'action' => $action, 'page' => 1 ), null, TRUE ) . "$get_params' title='Primeiro'>&laquo;</a></li>";
				$output .= "<li class=''><a href='" . $this->view->url( array( 'controller' => $controller, 'action' => $action, 'page' => $back_page ), null, TRUE ) . "$get_params' title='Anterior'>&lt;</a></li>";
			} else {
				$output .= "<li class='disabled'><a href='#'>&laquo;</a></li>";
				$output .= "<li class='disabled'><a href='#'>&lt;</a></li>";
			}

			while ( $current_page <= $end_page ) {
				if ( $current_page != $page ) {
					$output .= "<li class=''><a href='" . $this->view->url( array( 'controller' => $controller, 'action' => $action, 'page' => $current_page ), null, TRUE ) . "$get_params'>$current_page</a></li>";
				} else {
					$output .= "<li class='active'><a href='#'>$current_page</a></li>";
				}
				$current_page++;
			}

			if ( $page != $total_pages ) {
				$output .= "<li class=''><a href='" . $this->view->url( array( 'controller' => $controller, 'action' => $action, 'page' => $next_page ), null, TRUE ) . "$get_params' title='Próximo'>&gt;</a></li>";
				$output .= "<li class=''><a href='" . $this->view->url( array( 'controller' => $controller, 'action' => $action, 'page' => $total_pages ), null, TRUE ) . "$get_params' title='Último'>&raquo;</a></li>";
			} else {
				$output .= "<li class='disabled'><a href='#'>&gt;</a></li>";
				$output .= "<li class='disabled'><a href='#'>&raquo;</a></li>";
			}

			$output .= '</ul></div>';
		} else {
			$output = '<div id="pagination">';

			if ( $page > 1 ) {
				$output .= "<a href='" . $this->view->url( array( 'controller' => $controller, 'action' => $action, 'page' => 1 ), null, TRUE ) . "$get_params' title='Primeiro'><img width='14' src='" . INCLUDE_PATH . "/img/first.png'/></a>" . " ";
				$output .= "<a href='" . $this->view->url( array( 'controller' => $controller, 'action' => $action, 'page' => $back_page ), null, TRUE ) . "$get_params' title='Anterior'><img width='16' src='" . INCLUDE_PATH . "/img/previous.png'/></a>" . " ";
			}

			while ( $current_page <= $end_page ) {
				if ( $current_page != $page ) {
					$output .= "<a href='" . $this->view->url( array( 'controller' => $controller, 'action' => $action, 'page' => $current_page ), null, TRUE ) . "$get_params'>$current_page</a>" . " ";
				} else {
					$output .= "<strong>[" . $page . "]</strong> ";
				}

				$current_page++;
			}

			if ( $page != $total_pages ) {
				$output .= "<a href='" . $this->view->url( array( 'controller' => $controller, 'action' => $action, 'page' => $next_page ), null, TRUE ) . "$get_params' title='Próximo'><img width='16' src='" . INCLUDE_PATH . "/img/next.png'/></a>" . " ";
				$output .= "<a href='" . $this->view->url( array( 'controller' => $controller, 'action' => $action, 'page' => $total_pages ), null, TRUE ) . "$get_params' title='Último'><img width='14' src='" . INCLUDE_PATH . "/img/last.png'/></a>" . " ";
			}

			$output .= '</div>';
		}

		return $output;
	}

}

?>
