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

            <nav class="social">
                <?php
                wp_nav_menu(array(
                    'theme_location'  => 'social-menu',
                    'fallback_cb'     => false,
                    'container'       => false,
                    'items_wrap'      => '%3$s',
                    'walker'          => new Social_Menu_Walker()
                ));
                ?>
            </nav>        


    </div>



