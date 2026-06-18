<?php

function mota_theme() {

    wp_enqueue_style(
        'mota-theme-style',
        get_stylesheet_uri(),
        array(),
        filemtime(get_stylesheet_directory() . '/style.css')
    );

}

add_action('wp_enqueue_scripts', 'mota_theme');