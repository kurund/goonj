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
