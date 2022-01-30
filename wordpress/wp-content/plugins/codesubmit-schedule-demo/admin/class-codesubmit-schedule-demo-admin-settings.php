<?php

/**
 * This class define the fields that is used 
 * in the section into the admin page.
 *  
 */

if( !class_exists('Codesubmit_Schedule_Demo_Admin_Settings')) {
    class Codesubmit_Schedule_Demo_Admin_Settings{
        
        public static $options;
        public $days_of_week = array(
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday', 
            'saturday',
            'sunday'
        );

        public function __construct() {
            self::$options = get_option('codesubmit_schedule_options');
            add_action('admin_init', array($this, 'admin_init'));
        }


        /**
         * This function create the section and page 
         * in the admin painel.
         */
        public function admin_init(){
            register_setting(
                'codesubmit_schedule_group', 
                'codesubmit_schedule_options',
                array($this, 'codesubmit_schedule_validate'),
            );

            /**
             * Create Sections
             */

            //First Section
            add_settings_section(
                'codesubmit_schedule_main_section',
                'How does it work?',
                null,
                'codesubmit_schedule_page1',   
            );

            //Second Section
            add_settings_section(
                'codesubmit_schedule_second_section',
                'Availabilty Days',
                null,
                'codesubmit_schedule_page1', 
            );

            //Third Section
            add_settings_section(
                'codesubmit_schedule_third_section',
                'Availabilty Hours',
                null,
                'codesubmit_schedule_page1',    
            );


            /**
             * Create Fields
             */
            add_settings_field(
                'codesubmit_schedule_shortcode',
                'Shortcode',
                array($this, 'codesubmit_schedule_shortcode_callback'),
                'codesubmit_schedule_page1',
                'codesubmit_schedule_main_section',
            );

            add_settings_field(
                'codesubmit_schedule_availabilty_day_init',
                'From',
                array($this, 'codesubmit_schedule_availabilty_day_init_callback'),
                'codesubmit_schedule_page1',
                'codesubmit_schedule_second_section',
                array(
                    'items' =>  $this->days_of_week,
                    'label_for' => 'codesubmit_schedule_availabilty_day_init',
                ),
            );

            add_settings_field(
                'codesubmit_schedule_availabilty_day_finish',
                'to',
                array($this, 'codesubmit_schedule_availabilty_day_finish_callback'),
                'codesubmit_schedule_page1',
                'codesubmit_schedule_second_section',
                array(
                    'items' =>  $this->days_of_week,
                    'label_for' => 'codesubmit_schedule_availabilty_day_finish',
                ),
            );

            add_settings_field(
                'codesubmit_schedule_availabilty_hour_init',
                'From',
                array($this, 'codesubmit_schedule_availabilty_hour_init_callback'),
                'codesubmit_schedule_page1',
                'codesubmit_schedule_third_section',
                array(
                    'label_for' => 'codesubmit_schedule_availabilty_hour_init'
                ),
            );

            add_settings_field(
                'codesubmit_schedule_availabilty_hour_finish',
                'to',
                array($this, 'codesubmit_schedule_availabilty_hour_finish_callback'),
                'codesubmit_schedule_page1',
                'codesubmit_schedule_third_section',
                array(
                    'label_for' => 'codesubmit_schedule_availabilty_hour_finish'
                ),
            );
        }

        /**
         * Show message 'How to use this plugin'.
         */
        public function codesubmit_schedule_shortcode_callback() {
            ?>
                <span>Use the shorcode  [codesubmit_schedule] to display the button</span>
            <?php
        }

        /**
         * Field to configure availabilty days Starts.
         */
        public function codesubmit_schedule_availabilty_day_init_callback($args) {
            ?>
                <select 
                    id="codesubmit_schedule_availabilty_day_init"
                    name="codesubmit_schedule_options[codesubmit_schedule_availabilty_day_init]" 
                >
                    <?php foreach ($args['items'] as $item):?>
                        <option
                            value="<?php echo esc_attr( $item ); ?>"
                            <?php isset(self::$options['codesubmit_schedule_availabilty_day_init']) ? selected($item, self::$options['codesubmit_schedule_availabilty_day_init'], true) : '';?>
                        >
                            <?php echo esc_html(ucfirst( $item )); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php
        }

         /**
         * Field to configure availabilty days finish.
         */
        public function codesubmit_schedule_availabilty_day_finish_callback($args) {
            ?>
                <select 
                    id="codesubmit_schedule_availabilty_day_finish"
                    name="codesubmit_schedule_options[codesubmit_schedule_availabilty_day_finish]" 
                >
                    <?php foreach ($args['items'] as $item):?>
                        <option
                            value="<?php echo esc_attr( $item ); ?>"
                            <?php isset(self::$options['codesubmit_schedule_availabilty_day_finish']) ? selected($item, self::$options['codesubmit_schedule_availabilty_day_finish'], true) : '';?>
                        >
                            <?php echo esc_html(ucfirst( $item )); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php
        }

         /**
         * Field to configure availabilty Hour starts.
         */
        public function codesubmit_schedule_availabilty_hour_init_callback() {
            ?>
                <input
                    type="time"
                    name="codesubmit_schedule_options[codesubmit_schedule_availabilty_hour_init]"
                    id="codesubmit_schedule_availabilty_hour_init"
                    value="<?php echo isset(self::$options['codesubmit_schedule_availabilty_hour_init']) ? esc_attr(self::$options['codesubmit_schedule_availabilty_hour_init']) : ''; ?>"
                >
            <?php
        }

        /**
         * Field to configure availabilty Hour finish.
         */
        public function codesubmit_schedule_availabilty_hour_finish_callback() {
            ?>
                <input
                    type="time"
                    name="codesubmit_schedule_options[codesubmit_schedule_availabilty_hour_finish]"
                    id="codesubmit_schedule_availabilty_hour_finish"
                    value="<?php echo isset(self::$options['codesubmit_schedule_availabilty_hour_finish']) ? esc_attr(self::$options['codesubmit_schedule_availabilty_hour_finish']) : ''; ?>"
                >
            <?php
        }


        /**
         * This function validate inputs of the form
         */
        public function codesubmit_schedule_validate($input) {
            $new_input = array();
            foreach ($input as $key => $value){
                //Sanitize Input
                $new_input[$key] = sanitize_text_field($value);

                //if empty show the error message
                if(empty($value)){
                    add_settings_error(
                        'codesubmit_schedule_options', 
                        'codesubmit_schedule_message', 
                        'The field "availabilty hours" can not be empty', 
                        'error'
                    );
                }
            }
            return $new_input;
        }
    }
}

