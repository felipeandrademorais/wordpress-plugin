<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://codesubmit.io
 * @since      1.0.0
 *
 * @package    Codesubmit_Schedule_Demo
 * @subpackage Codesubmit_Schedule_Demo/public/partials
 */
?>

<!-- Bellow the php code and html of Shortcode  -->


<?php 
    /**
     * This function convert day of the week to number
     * of 0 to 6 
     */
    function convertDayOfWeekToNumber($dayOfWeek) {
        return date('w', strtotime($dayOfWeek));
    }

    /**
     * This function verify if currently day of week 
     * is between the initial day and the final day 
     */
    function dayAvailability($dayInit, $dayFinish) {
        $dayInitNum =  convertDayOfWeekToNumber($dayInit);
        $dayFinishNum =  convertDayOfWeekToNumber($dayFinish); 

        $dateNow = date('Y-m-d');
        $dayNowNum = date('w', strtotime($dateNow));

        if(($dayNowNum >= $dayInitNum) && ($dayNowNum <= $dayFinishNum)) {
            return true;
        }

        return false;
    }

    /**
     * This function verify if currently timestamp 
     * is between the Initial Hour and the Final Hour 
     */
    function hourAvailability($hourInit, $hourFinish) {
        //Get the currently hour
        $local_time  = current_datetime();
        $current_time = $local_time->getTimestamp() + $local_time->getOffset(); 

        //Convert Hour to Timestamp
        $hourInitTimestamp = strtotime($hourInit);
        $hourFinishTimestamp = strtotime($hourFinish);

        //Logic of the function
        if(($current_time >= $hourInitTimestamp) &&  ($current_time <= $hourFinishTimestamp)){
            return true;
        }

        return false;
    }

    /**
     * This function get all options and call the functions
     * for show or not the phone number.
     * 
     * If not show phone number, the function returns a simple message.
     */
    function showOrNotShowPhoneNumber($options){
        $day_init = $options['codesubmit_schedule_availabilty_day_init'];
        $day_finish = $options['codesubmit_schedule_availabilty_day_finish'];
        $hour_init = $options['codesubmit_schedule_availabilty_hour_init'];
        $hour_finish = $options['codesubmit_schedule_availabilty_hour_finish'];
        $phone_number = $options['codesubmit_schedule_phone_number'];

        $html = '<div class="modal-message">';

        if(
            dayAvailability($day_init, $day_finish) &&
            hourAvailability($hour_init, $hour_finish)
        ){
            $html .= '<h1> Phone Number ' .$phone_number . '</h1>';
        } else {
            $html .= '<h2>Hi, I am currently unavailable, but you can contact me at the date and time below.</h2>';
            $html .= '<br><span><strong>Day: </strong>' . ucfirst($day_init) . ' </span><br><span><strong>Hour: </strong>' . $hour_init . ' </span>';
        }

        $html .= '</div>';

        return $html;
    }
?>


<!-- This is a HTML of Shortcode -->

<button id="shortcode-action-button" class="action">SCHEDULE A DEMO</button>

<div class="modal">
    <div class="content">
        <div class="close-modal">
            <img src="<?php echo get_template_directory_uri() . '/assets/images/icon-close.svg' ?>" alt="">
        </div>
        <?php 
            $options = Codesubmit_Schedule_Demo_Admin_Settings::$options;
            $days_of_week = Codesubmit_Schedule_Demo_Admin_Settings::$days_of_week;

            echo showOrNotShowPhoneNumber($options);     
        ?>
    </div>
</div>