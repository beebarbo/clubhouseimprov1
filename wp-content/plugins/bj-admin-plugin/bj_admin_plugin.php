<?php

/*
Plugin Name: BJ’s admin theme
plugin URI: http://www.clubhouseimprov.com/admin_theme
Description: BJ’s WordPress Admin Theme - Upload and activate.
Author: BJ Emery
Version:1.0
Author URI: http://www.bjemery.com
*/

function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/wp-admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');
?>