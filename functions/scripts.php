<?php
/**
 * Enqueue scripts and stylesheets
 */
function THEME_PREFIX_theme_scripts()
{
    wp_enqueue_style( 'main-css', get_template_directory_uri(). '/build/css/bundle.css', array(), '1.0' );
    wp_enqueue_script( 'main-js', get_template_directory_uri(). '/build/js/bundle.js', array('jquery'), '1.0', true );
    // wp_enqueue_script( 'svgxuse-js', get_template_directory_uri() . '/build/js/svgxuse.min.js', array(), '1.2.6', true );
    wp_localize_script( 'main-js', 'ajaxurl', admin_url('admin-ajax.php') );
    wp_localize_script( 'main-js', 'templateurl', get_template_directory_uri() );
}
add_action( 'wp_enqueue_scripts', 'THEME_PREFIX_theme_scripts' );
