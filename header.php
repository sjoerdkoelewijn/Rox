<!DOCTYPE html>

<!--[if IE 9]>
<html class="ie ie9" <?php language_attributes(); ?>>
<![endif]-->

<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- Google Tag Manager -->
            <script defer>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-KCPKGSW');</script>
        <!-- End Google Tag Manager -->

        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
       

        <?php wp_head(); ?>

        <?php if ( has_post_thumbnail() ) {
            $attachment_image = wp_get_attachment_url( get_post_thumbnail_id(), 'medium' );
            echo '<link rel="preload" as="image" href="' . esc_attr( $attachment_image ) . '">';  
        } ?>

    </head>

    <?php if ( is_front_page() && has_post_thumbnail() ) { 
        
        $hero = 'style="background-image:url('. esc_attr( $attachment_image ) .');" ';
        
    } ?>

    <body <?php if (is_front_page() && has_post_thumbnail() ) {  echo $hero . body_class('hero_image'); } else { body_class(); } ?> >

        <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KCPKGSW" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

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

        