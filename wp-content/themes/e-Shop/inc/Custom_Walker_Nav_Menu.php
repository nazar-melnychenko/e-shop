<?php

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$html = "";
		if ( $depth == 0 ) {
			$html .= "\n<li";
			if ( $args->walker->has_children ) {
				$html .= ' class="arrow-plus"';
			}
			$html .= "><a href=\"%s\">%s" . '</a><div ';
			if ( $args->walker->has_children ) {
				$html .= 'class="cat-left-drop-menu"';
			}
			$html   .= '>';
			$output .= sprintf( $html, $item->url, $item->title );
		} elseif ( $depth == 1 ) {
			$output .= '<div class="cat-left-drop-menu-left"><a class="menu-item-heading" href="' . $item->url . '">' . $item->title . '</a><ul>';
		} elseif ( $depth == 2 ) {
			$output .= '<li><a href="' . $item->url . '">' . $item->title . '</a></li>';
		}
	}
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		if ( $depth == 0 ) {
			$output .= "</div></li>";
		} elseif ( $depth == 1 ) {
			$output .= '</ul></div>';
		}
	}
}

?>
