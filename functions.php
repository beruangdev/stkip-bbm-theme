<?php

if (!defined('ABSPATH'))
    exit;

add_theme_support('custom-logo');
add_theme_support('post-formats');
add_theme_support('post-thumbnails');

function custom_post_type_archive_route($wp_rewrite) {
    $rules = array(
        'articles/?$' => 'index.php?post_type=post'
    );
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}

add_action('generate_rewrite_rules', 'custom_post_type_archive_route');

include "inc/inc.vite.php";
