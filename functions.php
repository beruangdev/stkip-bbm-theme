<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

// funtions.php is empty so you can easily track what code is needed in order to Vite + Tailwind JIT run well


// Main switch to get fontend assets from a Vite dev server OR from production built folder
// it is recommeded to move it into wp-config.php
define('IS_VITE_DEVELOPMENT', false);

add_theme_support('custom-logo');
add_theme_support('post-formats');
add_theme_support('post-thumbnails');


if (IS_VITE_DEVELOPMENT) {
    add_action('after_setup_theme', function () {
        show_admin_bar(false);
    });
}


include "inc/inc.vite.php";
