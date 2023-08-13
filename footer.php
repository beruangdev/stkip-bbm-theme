    </main>


    <footer class="mt-8 bg-background-150/50 dark:bg-background-975">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center mb-4 sm:mb-0">
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
                <ul class="flex flex-wrap items-center text-sm font-medium text-background-700 dark:text-background-400">
                    <li>
                        <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                    </li>
                    <li>
                        <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="mr-4 hover:underline md:mr-6 ">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-3 border-background-200 sm:mx-auto dark:border-background-700 lg:my-4" />

            <span class="block text-sm text-background-700 sm:text-center dark:text-background-400">© 2023 <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:underline"><?= get_bloginfo('name') ?>™</a>. All Rights Reserved.</span>
        </div>
    </footer>


    <?php wp_footer() ?>

    </body>

    </html>