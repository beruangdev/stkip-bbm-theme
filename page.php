<?php get_header(); ?>

<div class="container mt-20">
    <?php if (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div class="mt-4">
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail mb-8">
                    <?php the_post_thumbnail('large', ["class" => "w-full"]); ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>
    <?php else : ?>
        <p><?php esc_html_e('No content found.', 'your-theme'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>