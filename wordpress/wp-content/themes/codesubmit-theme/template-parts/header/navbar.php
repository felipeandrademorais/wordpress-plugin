<nav class="nav_menu">
    <div class="logo">
        <?php
            //Get logo from de Custumizer of Wordpress. 
            if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
            }
        ?>
    </div>
    <div class="mobile_menu">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-hamburger.svg' ?>" alt="">
    </div>
    <div class="close">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-close.svg' ?>" alt="">
    </div>
    <div class="menu">
        <?php 
            /**
            * Below is a function to create a menu;
            * I don't use nav_walker functions bacause it is not necessary;
            */            
            wp_nav_menu(
                array(
                    'theme_location'  => 'main-menu',
                    'container_class' => 'menu_div',
                    'menu_class'      => 'menu_container',
                )
            );
        ?>  
    </div>
</nav>