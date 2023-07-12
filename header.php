<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.3/dist/cdn.min.js"></script>
    <!-- <script defer src="https://unpkg.com/alpinejs"></script> -->
</head>

<body <?php body_class('flex flex-col') ?>>
    <?php wp_body_open(); ?>
    <nav class="top-navbar fixed w-full z-20 top-0 left-0" style="background: linear-gradient(0deg, rgb(15 20 31 / 0%) 0%, rgb(15 20 31 / 6%) 14%, rgb(15 20 31 / 30%) 100%);">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center logo">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
                ?>
                <?php if (has_custom_logo()) : ?>
                    <img src="<?= esc_url($logo_image[0]) ?>" class="h-8 mr-3" alt="<?= get_bloginfo('name') ?>">
                <?php else : ?>
                    <img src="<?= esc_url(get_template_directory_uri()) ?>/images/logo.svg" alt="<?= get_bloginfo('name') ?>" class="h-8 mr-3">
                <?php endif; ?>
            </a>
            <div class="items-center justify-between gap-2 flex md:w-auto md:order-1">
                <div class="hidden md:flex">
                    <?php echo wp_nav_menu([
                        'menu' => 'Primary Menu',
                    ]) ?>
                </div>




                <select id="language" class="skiptranslate bg-background-50 border border-background-300 text-background-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-background-900 dark:border-background-600 dark:placeholder-background-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 max-w-[5.5rem]">
                    <option value="id" selected>IDN</option>
                    <option value="en">ENG</option>
                    <option value="ar">ARB</option>
                    <option value="fr">FRA</option>
                    <option value="de">GER</option>
                </select>




                <button type="button" class="theme-toggle hover:bg-gray-800 p-2 rounded-md">
                    <span class="dark:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </span>

                    <span class="hidden dark:inline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>

                    </span>
                </button>
            </div>
        </div>
    </nav>


    <main class="flex-grow w-full">