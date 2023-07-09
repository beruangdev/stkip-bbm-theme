<?php get_header(); ?>

<div class="container mx-auto py-12">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
          <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
              <img class="w-full h-56 object-cover object-center" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <?php else : ?>
              <div class="w-full h-56 bg-gray-300"></div>
            <?php endif; ?>
          </a>
          <div class="p-4">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <p class="text-gray-600 dark:text-gray-400"><?php the_excerpt(); ?></p>
          </div>
        </div>
      <?php endwhile;
    else : ?>
      <p><?php _e('No posts found.'); ?></p>
    <?php endif; ?>
  </div>

  <?php the_posts_pagination(array(
    'mid_size'  => 5,
    'prev_text' => '&laquo; Previous',
    'next_text' => 'Next &raquo;',
  )); ?>
</div>

<?php get_footer(); ?>