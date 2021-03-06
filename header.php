<!DOCTYPE html>

<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->

<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0" />

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">

        <link rel="preconnect" href="http://fonts.googleapis.com" />
        <link rel="dns-prefetch" href="//fonts.googleapis.com" />
       
        <?php wp_head(); ?>

        <?php if ( has_post_thumbnail() ) {
            $attachment_image = wp_get_attachment_url( get_post_thumbnail_id(), 'medium' );
            echo '<link rel="preload" as="image" href="' . esc_attr( $attachment_image ) . '">';  
        } ?>

    </head>

    <body <?php if (is_front_page() && has_post_thumbnail() ) { body_class('has_hero'); } else { body_class(); } ?> >

        <?php if ( is_front_page() && has_post_thumbnail() ) { 
            
            echo '<img alt="Roxtar Online Marketing Bureau Amsterdam" class="bg_hero_img" src="'. esc_attr( $attachment_image ) .'" />';
            
        } ?>

        <header class="top_header">

            <a title="<?php bloginfo( 'name' ); ?>" aria-label="Visit the Homepage" class="logo" href="/">
                
            <?php if ( is_front_page() && has_post_thumbnail() ) { 
            
                echo file_get_contents(get_template_directory() . "/images/svg/logo-white.svg"); 
        
                } else {

                    echo file_get_contents(get_template_directory() . "/images/svg/logo.svg");

                }
                            
            ?>

            </a>

            <?php include('parts/main-menu.php'); ?>
           
        </header>

        