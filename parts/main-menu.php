    <div class="main_menu_wrap">

        <nav id="main-navigation" class="main_navigation" role="navigation">
            <?php
            wp_nav_menu(array(
                'theme_location'  => 'main-navigation',
                'fallback_cb'     => false,
                'container'       => false,
                'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
            ));
            ?>
        </nav>
        
        <button class="mobile_menu_toggle" data-main-menu-toggle>
            <span>
                Menu
            </span>

            <?php if ( is_front_page() && has_post_thumbnail() ) { 
            
                echo file_get_contents(get_template_directory() . "/images/svg/hamburgerIconWhite.svg");
    
            } else {

                echo file_get_contents(get_template_directory() . "/images/svg/hamburgerIcon.svg");

            }
                        
            ?>

        </button>

    </div>

    <div class="mobile_menu hidden" data-main-menu>

        <a title="<?php bloginfo( 'name' ); ?>" aria-label="Visit the Homepage" class="logo" href="/">
            <?php echo file_get_contents(get_template_directory() . "/images/svg/logo.svg"); ?>
        </a>

        <button class="menu_close" data-main-close>
            <?php echo file_get_contents(get_template_directory() . "/images/svg/closeIcon.svg"); ?>
        </button>
        
        <nav id="main-navigation" class="mobile_main_navigation" role="navigation">
            <?php
            wp_nav_menu(array(
                'theme_location'  => 'main-navigation',
                'fallback_cb'     => false,
                'container'       => false,
                'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
            ));
            ?>
        </nav>

    </div>

    <div class="mobile_menu_background hidden" data-main-close></div>