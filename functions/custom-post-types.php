<?php

function cpt_kennisbank() {

	$labels = array(
		'name' => __( 'Kennisbank Items', 'sjoerd' ),
		'singular_name' => __( 'Kennisbank Item', 'sjoerd' ),
		'menu_name' => __( 'Kennisbank', 'sjoerd' ),
		'all_items' => __( 'Alle Kennisbank Items', 'sjoerd' ),
		'add_new' => __( 'Nieuwe toevoegen', 'sjoerd' ),
		'add_new_item' => __( 'Nieuwe Kennisbank Item toevoegen', 'sjoerd' ),
		'edit_item' => __( 'Bewerk Kennisbank Item', 'sjoerd' ),
		'new_item' => __( 'Nieuw Kennisbank Item', 'sjoerd' ),
		'view_item' => __( 'Bekijk Kennisbank Item', 'sjoerd' ),
		'view_items' => __( 'Bekijk Kennisbank Items', 'sjoerd' ),
		'search_items' => __( 'Zoek Kennisbank Items', 'sjoerd' ),
		'not_found' => __( 'Geen Kennisbank Items gevonden', 'sjoerd' ),
		'not_found_in_trash' => __( 'Geen Kennisbank Items gevonden in prullenbak', 'sjoerd' ),
		'parent' => __( 'Hoofd Kennisbank Item:', 'sjoerd' ),
		'featured_image' => __( 'Uitgelichte afbeelding voor deze Kennisbank Item', 'sjoerd' ),
		'set_featured_image' => __( 'Uitgelichte afbeelding instellen voor deze Kennisbank Item', 'sjoerd' ),
		'remove_featured_image' => __( 'Uitgelichte afbeelding voor deze Kennisbank Item verwijderen', 'sjoerd' ),
		'use_featured_image' => __( 'Gebruiken als uitgelichte afbeelding voor deze Kennisbank Item', 'sjoerd' ),
		'archives' => __( 'Kennisbank Item archieven', 'sjoerd' ),
		'insert_into_item' => __( 'Invoegen in Kennisbank Item', 'sjoerd' ),
		'uploaded_to_this_item' => __( 'Upload naar deze Kennisbank Item', 'sjoerd' ),
		'filter_items_list' => __( 'Filter Kennisbank Items lijst', 'sjoerd' ),
		'items_list_navigation' => __( 'Kennisbank Items lijstnavigatie', 'sjoerd' ),
		'items_list' => __( 'Kennisbank Items lijst', 'sjoerd' ),
		'attributes' => __( 'Kennisbank Items attributen', 'sjoerd' ),
		'name_admin_bar' => __( 'Kennisbank Item', 'sjoerd' ),
		'item_published' => __( 'Kennisbank Item gepubliceerd', 'sjoerd' ),
		'item_published_privately' => __( 'Kennisbank Item privé gepubliceerd.', 'sjoerd' ),
		'item_reverted_to_draft' => __( 'Kennisbank Item omgezet naar concept.', 'sjoerd' ),
		'item_scheduled' => __( 'Kennisbank Item ingepland', 'sjoerd' ),
		'item_updated' => __( 'Kennisbank Item bijgewerkt.', 'sjoerd' ),
		'parent_item_colon' => __( 'Hoofd Kennisbank Item:', 'sjoerd' ),
    );

    
	$rewrite = array(
			'slug'                  => __( 'kennisbank', 'sjoerd' ) . '/' . '%kennisbank_categories%',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => false,
	);
	$args = array(
			'label'                 => __( 'Kennisbank', 'sjoerd' ),
			'description'           => __( 'Online Marketing Kennisbank', 'sjoerd' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
			//'taxonomies'            => array( 'kennisbank' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 3,
			'menu_icon'             => 'dashicons-images-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => __( 'kennisbank', 'sjoerd' ),
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'post',
			'show_in_rest'          => true,
	);
	register_post_type( 'kennisbank', $args );

}

add_action( 'init', 'cpt_kennisbank', 0 );


function cpt_kennisbank_taxonomy() { 
 
	  $labels = array(
		'name' => _x( 'Kennisbank Categorieën', 'taxonomy general name', 'sjoerd' ),
		'singular_name' => _x( 'Kennisbank Categorie', 'taxonomy singular name', 'sjoerd' ),
		'search_items' =>  __( 'Zoek Categorie', 'sjoerd' ),
		'all_items' => __( 'Alle Categorieën', 'sjoerd' ),
		'parent_item' => __( 'Parent Categorie', 'sjoerd' ),
		'parent_item_colon' => __( 'Parent Categorie:', 'sjoerd' ),
		'edit_item' => __( 'Edit Categorie', 'sjoerd' ), 
		'update_item' => __( 'Update Categorie', 'sjoerd' ),
		'add_new_item' => __( 'Add New Categorie', 'sjoerd' ),
		'new_item_name' => __( 'New Categorie Name', 'sjoerd' ),
		'menu_name' => __( 'Categorieën', 'sjoerd' ),
	  );    
	  
	  register_taxonomy('kennisbank_categories', array('kennisbank'), array(
		'hierarchical' 		=> true,
		'public'        	=> true,
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_admin_column' => true,
		'query_var' 		=> true,
		'show_in_rest'      => true,
		'rewrite' 			=> array( 'slug' => __( 'kennisbank', 'sjoerd' ) ),
	  ));
	 
}
add_action( 'init', 'cpt_kennisbank_taxonomy', 0 );



// Adds the current category in the URL.

add_filter('post_type_link', 'sk_update_permalink_structure', 10, 2);

function sk_update_permalink_structure( $post_link, $post )
{
    if ( false !== strpos( $post_link, '%kennisbank_categories%' ) ) {

		$taxonomy_terms = get_the_terms( $post->ID, 'kennisbank_categories' );
		
        foreach ((array) $taxonomy_terms as $term ) { 
            if ( ! $term->parent ) {
                $post_link = str_replace( '%kennisbank_categories%', $term->slug, $post_link );
            }
        } 
	}
	
    return $post_link;
}



function generate_taxonomy_rewrite_rules( $wp_rewrite ) {

    $rules = array();

    $post_types = get_post_types( array( 'public' => true, '_builtin' => false ), 'objects' );
    $taxonomies = get_taxonomies( array( 'public' => true, '_builtin' => false ), 'objects' );

    foreach ( $post_types as $post_type ) {
        $post_type_name = $post_type->name;
        $post_type_slug = $post_type->rewrite['slug'];

        foreach ( $taxonomies as $taxonomy ) {
            if ( $taxonomy->object_type[0] == $post_type_name ) {
                $terms = get_categories( array( 'type' => $post_type_name, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0 ) );
                foreach ( $terms as $term ) {
                    $rules[$post_type_slug . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
                    $rules[$post_type_slug . '/' . $term->slug . '/page/?([0-9]{1,})/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug . '&paged=' . $wp_rewrite->preg_index( 1 );
                }
            }
        }
    }

    $wp_rewrite->rules = $rules + $wp_rewrite->rules;

}

add_action('generate_rewrite_rules', 'generate_taxonomy_rewrite_rules');