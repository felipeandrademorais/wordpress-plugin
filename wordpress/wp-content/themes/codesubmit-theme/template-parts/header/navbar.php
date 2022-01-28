<nav>
    <div class="logo">
        <?php
            //Get logo from de Custumizer of Wordpress. 
            if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
            }
        ?>
    </div>
    <div class="menu">
        <?php 
            /**
            * Below is a function to create a menu;
            * I don't use nav_walker functions bacause it is not necessary;
            */            
            wp_nav_menu(
                array(
                    'theme_location'    => 'main_menu',
                )
            );
        ?>  
    </div>
</nav>