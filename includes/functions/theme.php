<?php
/**
 * Theme
 */
function THEME_DOMAIN_theme_setup()
{
    // Add support for post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Register menus
    register_nav_menus([
        'main-menu'      => __( 'Main menu', 'theme_domain' ),
        'secondary-menu' => __( 'Secondary menu', 'theme_domain' ),
        'footer-menu'    => __( 'Footer', 'theme_domain' ),
    ]);
}
add_action( 'after_setup_theme', 'THEME_DOMAIN_theme_setup' );
