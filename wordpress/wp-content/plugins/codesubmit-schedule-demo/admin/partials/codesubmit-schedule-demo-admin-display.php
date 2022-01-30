<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://codesubmit.io
 * @since      1.0.0
 *
 * @package    Codesubmit_Schedule_Demo
 * @subpackage Codesubmit_Schedule_Demo/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div>
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <form action="options.php" method="post">
        <?php
            settings_fields('codesubmit_schedule_group');
            do_settings_sections('codesubmit_schedule_page1');
            submit_button('Save');
        ?>
    </form>
</div>