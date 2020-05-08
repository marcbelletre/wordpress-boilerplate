<?php

class Bulma_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $output .= "<div class=\"navbar-dropdown\">";
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        global $post;

        $item->classes[] = 'navbar-item';

        $hasChildren = in_array('menu-item-has-children', $item->classes);

        if ($hasChildren) {
            $item->classes[] = 'has-dropdown';
        }

        // Handle active state for current item
        if ($item->current && ! $hasChildren) {
            $item->classes[] = 'is-active';
        }
        // Handle active state for archive pages
        elseif (isset($post) && $item->type === 'post_type_archive' && $item->object === $post->post_type) {
            $item->classes[] = 'is-active';
        }
        // Handle active state for blog page
        elseif (isset($post) && $post->post_type === 'post' && $item->object_id === get_option( 'page_for_posts' )) {
            $item->classes[] = 'is-active';
        }
        // Handle active state for search results page
        elseif ($item->type === 'custom' && in_array('search', $item->classes) && isset($_GET['s'])) {
            $item->classes[] = 'is-active';
        }

        if ($item->type === 'custom' && $item->target === '_blank') {
            $item->classes[] = 'is-external-link';
        }

        $classes = implode(' ', $item->classes);

        if ($hasChildren) {
            $output .= "<div class=\"{$classes} is-hoverable\">";
            $output .= "\n<a class=\"navbar-link\">{$item->title}</a>";
        } else {
            $output .= "<a class=\"{$classes}\" href=\"{$item->url}\" target=\"{$item->target}\">{$item->title}";
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        if (in_array('has-dropdown', $item->classes)) {
            $output .= "</div>";
        }

        $output .= "</a>";
    }

    public function end_lvl(&$output, $depth = 0, $args = array())
    {
        $output .= "</div>";
    }
}
