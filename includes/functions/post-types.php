<?php
/**
 * Register post types and taxonomies
 */
function pp_register_post_types()
{
    $labels = array(
        'name'               => __( 'Items', 'theme_domain' ),
        'singular_name'      => __( 'Item', 'theme_domain' ),
        'menu_name'          => __( 'Items', 'theme_domain' ),
        'name_admin_bar'     => __( 'Items', 'theme_domain' ),
        'add_new'            => __( 'Add new', 'theme_domain' ),
        'add_new_item'       => __( 'Add new item', 'theme_domain' ),
        'new_item'           => __( 'New item', 'theme_domain' ),
        'edit_item'          => __( 'Edit item', 'theme_domain' ),
        'view_item'          => __( 'View item', 'theme_domain' ),
        'all_items'          => __( 'All items', 'theme_domain' ),
        'search_items'       => __( 'Search items', 'theme_domain' ),
        'parent_item_colon'  => __( 'Parent item:', 'theme_domain' ),
        'not_found'          => __( 'No items found.', 'theme_domain' ),
        'not_found_in_trash' => __( 'No items found in trash.', 'theme_domain' ),
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'theme_domain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'items' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-admin-post',
        'supports'           => array( 'title', 'thumbnail' ),
    );

    register_post_type( 'item', $args );
}
add_action( 'init', 'pp_register_post_types' );

/**
 * Remove default post type page
 */
function pp_remove_default_post_type()
{
    remove_menu_page( 'edit.php' );
}
// add_action( 'admin_menu', 'pp_remove_default_post_type' );

/**
 * Remove default post type link from admin sidebar
 */
function pp_remove_default_post_type_menu_bar( $wp_admin_bar )
{
    $wp_admin_bar->remove_node( 'new-post' );
}
// add_action( 'admin_bar_menu', 'pp_remove_default_post_type_menu_bar', 999 );
