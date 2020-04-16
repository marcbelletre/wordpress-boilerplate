<?php

// // Add ACF options pages
if (function_exists('acf_add_options_page')) {
    // acf_add_options_page();
}

/**
 * Register Google Maps API key
 *
 * @param  array $api
 * @return array
 */
function THEME_DOMAIN_acf_google_map_api( $api )
{
    $api['key'] = getenv('GMAPS_API_KEY');
    return $api;
}
add_filter( 'acf/fields/google_map/api', 'THEME_DOMAIN_acf_google_map_api' );
