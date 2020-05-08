<?php
/**
 * Register post types and taxonomies
 */
function THEME_PREFIX_register_post_types()
{
    // $labels = array(
    //     'name'               => __( 'Items', 'THEME_DOMAIN' ),
    //     'singular_name'      => __( 'Item', 'THEME_DOMAIN' ),
    //     'menu_name'          => __( 'Items', 'THEME_DOMAIN' ),
    //     'name_admin_bar'     => __( 'Items', 'THEME_DOMAIN' ),
    //     'add_new'            => __( 'Add new', 'THEME_DOMAIN' ),
    //     'add_new_item'       => __( 'Add new item', 'THEME_DOMAIN' ),
    //     'new_item'           => __( 'New item', 'THEME_DOMAIN' ),
    //     'edit_item'          => __( 'Edit item', 'THEME_DOMAIN' ),
    //     'view_item'          => __( 'View item', 'THEME_DOMAIN' ),
    //     'all_items'          => __( 'All items', 'THEME_DOMAIN' ),
    //     'search_items'       => __( 'Search items', 'THEME_DOMAIN' ),
    //     'parent_item_colon'  => __( 'Parent item:', 'THEME_DOMAIN' ),
    //     'not_found'          => __( 'No items found.', 'THEME_DOMAIN' ),
    //     'not_found_in_trash' => __( 'No items found in trash.', 'THEME_DOMAIN' ),
    // );
    //
    // $args = array(
    //     'labels'             => $labels,
    //     'description'        => __( 'Description.', 'THEME_DOMAIN' ),
    //     'public'             => true,
    //     'publicly_queryable' => true,
    //     'show_ui'            => true,
    //     'show_in_menu'       => true,
    //     'query_var'          => true,
    //     'rewrite'            => array( 'slug' => 'items' ),
    //     'capability_type'    => 'post',
    //     'has_archive'        => true,
    //     'hierarchical'       => false,
    //     'menu_position'      => 5,
    //     'menu_icon'          => 'dashicons-admin-post',
    //     'supports'           => array( 'title', 'thumbnail' ),
    // );
    //
    // register_post_type( 'item', $args );
}
add_action( 'init', 'THEME_PREFIX_register_post_types' );

/**
 * Remove default post type page
 */
function THEME_PREFIX_remove_default_post_type()
{
    remove_menu_page( 'edit.php' );
}
// add_action( 'admin_menu', 'THEME_PREFIX_remove_default_post_type' );

/**
 * Remove default post type link from admin sidebar
 */
function THEME_PREFIX_remove_default_post_type_menu_bar( $wp_admin_bar )
{
    $wp_admin_bar->remove_node( 'new-post' );
}
// add_action( 'admin_bar_menu', 'THEME_PREFIX_remove_default_post_type_menu_bar', 999 );
