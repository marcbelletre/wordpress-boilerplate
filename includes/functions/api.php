<?php

/**
 * Disable REST API
 */
add_filter( 'rest_authentication_errors', function ($result) {
    if (! empty($result)) {
        return $result;
    }

    if (! is_user_logged_in()) {
        return new WP_Error( 'rest_not_logged_in', 'Unauthorized.', array('status' => 401) );
    }

    return $result;
} );
