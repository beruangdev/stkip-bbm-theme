<?php get_header(); ?>

<div class="container mt-20 flex flex-col gap-3">
  <?php if (have_posts()) : the_post(); ?>
    <h1 class="text-xl"><?php the_title(); ?></h1>
    <div class="mb-4 flex flex-col">
      <div>
        <p class="date">
          <?php esc_html_e('Published on', 'your-theme'); ?> <?php the_date(); ?>
        </p>

        <p class="author">
          <?php esc_html_e('By', 'your-theme'); ?> <?php the_author(); ?>
        </p>
      </div>
      <?php if (has_category()) : ?>
        <p class="category">
          <?php esc_html_e('Category:', 'your-theme'); ?> <?php the_category(', '); ?>
        </p>
      <?php endif; ?>
    </div>

    <div>
      <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail mb-8">
          <?php the_post_thumbnail('large', ['class' => 'w-full']); ?>
        </div>
      <?php endif; ?>

      <div class="content mb-4">
        <?php the_content(); ?>
      </div>

      <?php if (has_tag()) : ?>
        <p class="tags">
          <?php esc_html_e('Tags:', 'your-theme'); ?> <?php the_tags('', ', '); ?>
        </p>
      <?php endif; ?>
    </div>
  <?php else : ?>
    <p><?php esc_html_e('No content found.', 'your-theme'); ?></p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>