<?php
    /*
    Plugin Name: Editor
    Plugin URI: http://www.agileinfoways.com
    Description: This Plugin is used to Add Custom Editor on Front End.
    Version: 0.1
    Author: Anurag Acharya
    Author URI: http://www.agileinfoways.com/
    License: GPL2
    */

    add_action("admin_menu", "addMenu");


    function addMenu() {
        add_menu_page('My Editor', 'My Editor', 'manage_options', 'editor/my_editor.php','admin_interface');
    }
    add_filter('admin_head','ShowTinyMCE');
    function ShowTinyMCE() {
        // conditions here
        wp_enqueue_script( 'common' );
        wp_enqueue_script( 'jquery-color' );
        wp_print_scripts('editor');
        if (function_exists('add_thickbox')) add_thickbox();
        wp_print_scripts('media-upload');
        if (function_exists('wp_tiny_mce')) wp_tiny_mce();
        wp_admin_css();
        wp_enqueue_script('utils');
        do_action("admin_print_styles-post-php");
        do_action('admin_print_styles');
    }
    function admin_interface()
    {
    ?>
    <div class="wrap">
        <div class="icon32" id="icon-options-general"><br /></div>
        <h2>My Editor</h2>
        <h3><?php _e( 'Code to insert', 'wp-editor' ); ?></h3>
        <p><?php _e( 'Custom Editor is used to set This Editor any where on the Front end.', 'wp-editor' ); ?></p>
        <p><?php _e( 'You can use Below function to Show Editor on Front End.', 'wp-editor' ); ?></p>
        <code>
              the_editor($content, 'content');
        </code>
    </div>
    <?php
}