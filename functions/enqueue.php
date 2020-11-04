<?php

/*************************** Dequeue Default Block Styles **********************************/

function sk_dequeue_block_styles(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
   }

   if (!is_admin()) {
   	add_action( 'wp_enqueue_scripts', 'sk_dequeue_block_styles', 99 );
   }

/*************************** Dequeue WP Embed **********************************/

function sk_deregister_embed(){
		wp_dequeue_script( 'wp-embed' );
	}

add_action( 'wp_footer', 'sk_deregister_embed' );   

/*************************** Enqueue Styles **********************************/

function roxstar_styles() {

	$filename = get_stylesheet_directory() . '/src/css/style.min.css';
	$timestamp = filemtime($filename);

	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', NULL, NULL, 'all' );

	wp_enqueue_style('roxstar-styles', get_template_directory_uri() . '/src/css/style.min.css', NULL, $timestamp, 'all' );

}
add_action( 'wp_enqueue_scripts', 'roxstar_styles', 99 );


function admin_styles() {

	$filename = get_stylesheet_directory() . '/src/css/admin.min.css';
	$timestamp = filemtime($filename);
	wp_enqueue_style('admin-styles', get_template_directory_uri() . '/src/css/admin.min.css', NULL, $timestamp, 'all' );

}
add_action('admin_enqueue_scripts', 'admin_styles');



/*************************** Enqueue Scripts **********************************/

function roxstar_scripts() {

	$filename = get_stylesheet_directory() . '/src/js/app.min.js';
	$timestamp = filemtime($filename);

	if (!is_admin()) {
		//wp_deregister_script('jquery');
	}

	wp_enqueue_script('roxstar-app', get_template_directory_uri() . '/src/js/app.min.js', NULL, $timestamp, TRUE);

}
add_action( 'wp_enqueue_scripts', 'roxstar_scripts', 99 );