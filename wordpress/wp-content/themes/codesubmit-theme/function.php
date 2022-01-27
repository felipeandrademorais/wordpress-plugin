<?php

/**
 * 
 * Description: Functions and Definitions of the codesubmit-theme.
 * Author: Felipe Andrade de Morais
 * 
 */


/**
 * Load all styles and scripts.
 */
function  load_styles_and_scripts() {
    //Load Styles
    wp_enqueue_style( 'main',  get_template_directory_uri().'/assets/css/main.css', array(), null, 'all');
}

add_action('wp_enqueue_scripts', 'load_styles_and_scripts');