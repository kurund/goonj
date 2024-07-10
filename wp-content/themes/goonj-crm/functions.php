<?php

function goonj_enqueue_scripts() {
    wp_enqueue_style(
        'goonj-style',
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'goonj_enqueue_scripts');

function goonj_theme_setup() {
    add_editor_style('style.css');
}
add_action('after_setup_theme', 'goonj_theme_setup');

# Redirecting to civi dashboard if already logged in
function redirect_logged_in_user_to_civi_dashboard() {
    if (is_user_logged_in() && is_front_page()) {
        wp_redirect(home_url('/wp-admin/admin.php?page=CiviCRM'));
        exit();
    }
}
add_action('template_redirect', 'redirect_logged_in_user_to_civi_dashboard');
