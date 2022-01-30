<?php

/********************************************
    All configurations of theme is here.
*********************************************/


/********* IMPORT ALL SCRIPTS AND STYLES ***********/

function  load_styles_and_scripts() {
    wp_enqueue_style( 'main',  get_template_directory_uri().'/assets/css/main.css', array(), null, 'all');
	wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'load_styles_and_scripts');


/********* ADD MENU THEME **************/

if ( ! function_exists( 'codesubmit_menus' ) ) {
    
    function codesubmit_menus() {
        register_nav_menu('main-menu',__( 'Main Menu'));
    }

    add_action( 'init','codesubmit_menus' );
}


/********* ADD THEME SUPPORT **************/

add_theme_support(
    'custom-logo',
    [
        'height'      => 35,
        'width'       => 35,
        'flex-height' => true,
        'flex-width'  => true,
    ]
);






