<?php

/**
 * Wordpress intitialization
 *
 * @return  void
 */
function THEME_PREFIX_init()
{
    // Update image sizes
    update_option( 'thumbnail_size_w', 600 );
    update_option( 'thumbnail_size_h', 600 );

    update_option( 'medium_size_w', 1024 );
    update_option( 'medium_size_h', 1024 );

    update_option( 'large_size_w', 1920 );
    update_option( 'large_size_h', 1920 );

    // Disable emojis
    add_filter( 'option_use_smilies', '__return_false' );
}
add_action( 'init', 'THEME_PREFIX_init' );

/**
 * Theme setup
 *
 * @return void
 */
function THEME_PREFIX_theme_setup()
{
    // Add support for post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Add support for custom logo
    add_theme_support( 'custom-logo' );

    // Register menus
    register_nav_menus([
        'main-menu' => __( 'Main menu', 'THEME_DOMAIN' ),
    ]);

    // Disable Gutenberg editor functions
    add_theme_support( 'editor-font-sizes' );
    add_theme_support( 'disable-custom-font-sizes' );
    add_theme_support( 'disable-custom-colors' );
    add_theme_support( 'align-wide' );

    // Customize color palette
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => 'Black',
            'slug' => 'black',
            'color' => '#000000',
        ),
        array(
            'name' => 'White',
            'slug' => 'white',
            'color' => '#ffffff',
        ),
    ) );
}
add_action( 'after_setup_theme', 'THEME_PREFIX_theme_setup' );

/**
 * Load custom Gutenberg stylesheet
 *
 * @return void
 */
function THEME_PREFIX_add_gutenberg_stylesheet()
{
	wp_enqueue_style( 'THEME_PREFIX-gutenberg', get_theme_file_uri( '/build/css/editor.css' ), false );
}
add_action( 'enqueue_block_editor_assets', 'THEME_PREFIX_add_gutenberg_stylesheet' );

/**
 * Disable emojis
 *
 * @return void
 */
function THEME_PREFIX_disable_emojis()
{
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	// Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'THEME_PREFIX_disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'THEME_PREFIX_disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'THEME_PREFIX_disable_emojis' );

/**
 * Filter out the tinymce emoji plugin.
 *
 * @param  array $plugins
 * @return array
 */
function THEME_PREFIX_disable_emojis_tinymce( $plugins )
{
	if (is_array( $plugins) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Removing emoji CDN hostname from DNS prefetching hints.
 *
 * @param  array $urls URLs to print for resource hints.
 * @param  string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function THEME_PREFIX_disable_emojis_remove_dns_prefetch( $urls, $relation_type )
{
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }

    return $urls;
}
