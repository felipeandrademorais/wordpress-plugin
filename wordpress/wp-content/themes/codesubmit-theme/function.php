<?php

/********************************************
    All configurations of theme is here.
*********************************************/


/********* IMPORT ALL SCRIPTS AND STYLES ***********/

function  load_styles_and_scripts() {
    wp_enqueue_style( 'main',  get_template_directory_uri().'/assets/css/main.css', array(), null, 'all');
}

add_action('wp_enqueue_scripts', 'load_styles_and_scripts');


/********* ADD THEME SUPPORT **************/

if ( ! function_exists( 'load_theme_support' ) ) {
    
    function load_theme_support() {
        add_theme_support( 'menus' );

        register_nav_menus( 
            array( 
                'main_menu' => _('Main Menu', 'codesubmit'),
            )
        );
    }
    add_action( 'after_setup_theme','load_theme_support' );
}

