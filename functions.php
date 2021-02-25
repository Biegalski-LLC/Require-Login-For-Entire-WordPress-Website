<?php

/**
 * @desc Require Login For Entire WordPress Website
 * @author Biegalski LLC
 * @authorUrl https://biegal.ski/snippets/require-login-for-entire-wordpress-website
 * @return bool|void
 */
function require_login_for_entire_wordpress_website()
{
    /**
     * @desc If request is an AJAX, Cron or WP-Cli request, skip forcing login
     */
    if ( wp_doing_ajax() || wp_doing_cron() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
        return;
    }

    /**
     * @desc If user isn't logged in
     */
    if ( ! is_user_logged_in() ) {
        nocache_headers();
        wp_safe_redirect( wp_login_url( get_permalink() ), 302 );
    }
}

add_action( 'template_redirect', 'require_login_for_entire_wordpress_website' );
