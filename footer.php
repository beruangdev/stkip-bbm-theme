    </main>


    <footer class="rounded-lg mt-6">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
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
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium">
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
            <hr class="my-3 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-3" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:underline"><?= get_bloginfo('name') ?>™</a>. All Rights Reserved.</span>
        </div>
    </footer>



    <?php wp_footer() ?>

    </body>

    </html>