<?php

/***************************  Custom Gutenberg Blocks **********************************/

function sk_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "blocks" folder
	if( file_exists( get_theme_file_path("/blocks/{$slug}.php") ) ) {
		include( get_theme_file_path("/blocks/{$slug}.php") );
	}
}

/*** Hero Block ***/

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check acf function exists
	if( function_exists('acf_register_block') ) {
		
		acf_register_block(array(
			'name'				=> 'hero',
			'title'				=> __('Hero Block'),
			'description'		=> __('The hero block for the top of the page'),
			'render_callback'	=> 'sk_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> 'laptop',
			'mode'				=> 'edit', // start in edit mode
			'keywords'			=> array( 'hero', 'image' ),
		));

		acf_register_block(array(
			'name'				=> 'diensten',
			'title'				=> __('Diensten Slider'),
			'description'		=> __('Slider met diensten blokjes'),
			'render_callback'	=> 'sk_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> 'laptop',
			'mode'				=> 'edit', // start in edit mode
			'keywords'			=> array( 'diensten'),
		));

		acf_register_block(array(
			'name'				=> 'persoon',
			'title'				=> __('Persoon Block'),
			'description'		=> __('Block met contact gegevens'),
			'render_callback'	=> 'sk_acf_block_render_callback',
			'category'			=> 'common',
			'icon'				=> 'laptop',
			'mode'				=> 'edit', // start in edit mode
			'keywords'			=> array( 'contact', 'persoon'),
		));

	}
}


