<?php

/**
 * Add stylesheets and scripts
 */
function asset_files() {

    wp_enqueue_script('main_js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true); // NULL -> dependencies, '1.0' -> version, true -> load at the end
    
    wp_enqueue_style('google_fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('main_styles', get_stylesheet_uri());

}
add_action('wp_enqueue_scripts','asset_files');

/**
 * Features
 */
function features() {
    register_nav_menu('headerMenu', 'Header');
    register_nav_menu('footerMenuOne', 'Footer 1');
    register_nav_menu('footerMenuTwo', 'Footer 2');
    add_theme_support('title-tag');
}
add_action('after_setup_theme','features');

/**
 * Remove the Admin Toolbar
 */
add_filter('show_admin_bar', '__return_false');