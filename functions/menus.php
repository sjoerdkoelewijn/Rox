<?php 
/*************************** Register menus **********************************/

register_nav_menus( array(
	'main-navigation' => __( 'Main Navigation', 'hashmuseum' ),	
	'footer-links' => __( 'Footer Links', 'hashmuseum' ),
	'social-menu' => __( 'Social Menu', 'hashmuseum' ),
) );


/*************************** Custom Menu Walker **********************************/

class Social_Menu_Walker extends Walker_Nav_Menu {

	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {

		$title = $item->title;
		$permalink = $item->url;
		$socialIcon = file_get_contents(get_template_directory() . "/images/svg/$title.svg");

		$output .= "<div class='" . $title . implode(" ", $item->classes) . "'>";
		$output .= '<a title="' . $title . '" href="' . $permalink . '">';
		$output .= '<span class="icon">' . $socialIcon . '</span>';  
		$output .= '</a>';
		$output .= '</div>';

	}

}