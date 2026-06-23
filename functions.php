<?php

function register_my_menus() {
    register_nav_menus(
        array(
            'main-menu' => __('Menu principal', 'mota-theme'),
            'footer-menu' => __('Menu du footer', 'mota-theme'),
        )
    );
}

add_action('after_setup_theme', 'register_my_menus');

function mota_theme() {

    wp_enqueue_style(
        'mota-theme-style',
        get_stylesheet_directory_uri() . '/assets/css/theme.css',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/css/theme.css')
    );

    wp_enqueue_script(
        'mota-menu-mobile',
        get_stylesheet_directory_uri() . '/assets/js/menu-mobile.js',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/js/menu-mobile.js'),
        true
    );

}

add_action('wp_enqueue_scripts', 'mota_theme');

