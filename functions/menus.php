<?php 
/*************************** Register menus **********************************/

register_nav_menus( array(
	'main-navigation' => __( 'Main Navigation', 'hashmuseum' ),	
	'footer-services' => __( 'Footer Services', 'hashmuseum' ),
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

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
	
	// loop
	foreach( $items as &$item ) {
		
		// vars
		$custom_style = get_field('custom_style', $item);
		$cta = get_field('cta', $item);
		
		// append icon
		if( $custom_style != 'none' ) {

			if( $custom_style === 'text' ) {
				$item->title .= '<span class="button">'.$cta.'</span>';				
			}

			if( $custom_style === 'image' ) {
				$item->title .= '<span class="link">'.$cta.'</span>';
			}

		}		
		
	}
		
	// return
	return $items;
	
}