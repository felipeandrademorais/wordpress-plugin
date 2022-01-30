<?php 
/**
 * Register the shortcode;
 *
 * @link       https://codesubmit.io
 * @since      1.0.0
 *
 * @package    Codesubmit_Schedule_Demo
 * @subpackage Codesubmit_Schedule_Demo/includes
 */

/**
 * Register the shortcode.
 *
 * The class responsible for generate the shortcodes of the plugin.
 *
 * @package    Codesubmit_Schedule_Demo
 * @subpackage Codesubmit_Schedule_Demo/includes
 * @author     Felipe Morais <flpiandrade@gmail.com>
 */

if(! class_exists('Codesubmit_Schedule_Demo_Shortcode')) {
    class Codesubmit_Schedule_Demo_Shortcode {
        public function __construct(){
            add_shortcode('codesubmit_schedule', array($this, 'add_shortcode'));
        }

       
        public function add_shortcode() {

            //Send de html only when this function is called;
            ob_start();
            require(plugin_dir_path( __FILE__ ) . '../public/partials/codesubmit-schedule-demo-public-display.php');
            return ob_get_clean();
        }
    }

}