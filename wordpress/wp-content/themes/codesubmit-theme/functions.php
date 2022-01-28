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

if ( ! function_exists( 'codesubmit_menus' ) ) {
    
    function codesubmit_menus() {

        add_theme_support('menu');

        register_nav_menu('main-menu',__( 'Main Menu'));
    }

    add_action( 'init','codesubmit_menus' );
}

