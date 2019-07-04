<?php
/**
 * Enqueue scripts and stylesheets
 */
function pp_theme_scripts()
{
    wp_enqueue_style( 'main-css', get_template_directory_uri(). '/assets/css/bundle.css', array(), '1.0' );
    wp_enqueue_script( 'main-js', get_template_directory_uri(). '/assets/js/bundle.js', array('jquery'), '1.0', true );
    wp_localize_script( 'main-js', 'ajaxurl', admin_url('admin-ajax.php') );
    wp_localize_script( 'main-js', 'templateurl', get_template_directory_uri() );
}
add_action( 'wp_enqueue_scripts', 'pp_theme_scripts' );