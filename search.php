<?php get_header(); ?>

<div class="container py-12">
  <h1 class="text-3xl font-bold mb-6"><?php printf(__('Search Results for: %s', 'textdomain'), '<span class="text-blue-500">' . get_search_query() . '</span>'); ?></h1>

  <div class="grid grid-cols-3 gap-6">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="bg-white dark:bg-gray-800 p-4 shadow rounded">
        <h2 class="text-xl font-bold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="text-gray-600 dark:text-gray-400"><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="inline-block mt-2 text-blue-500">Read More</a>
      </div>
    <?php endwhile; else : ?>
      <p><?php _e('No results found.', 'textdomain'); ?></p>
    <?php endif; ?>
  </div>

  <div class="mt-6">
    <?php
      // Pagination
      the_posts_pagination(array(
        'prev_text' => __('Previous', 'textdomain'),
        'next_text' => __('Next', 'textdomain'),
        'before_page_number' => '<span class="border border-gray-300 dark:border-gray-700 px-3 py-1 rounded-full mr-2 hover:bg-blue-500 hover:text-white transition-colors duration-200">',
        'after_page_number' => '</span>',
      ));
    ?>
  </div>
</div>

<?php get_footer(); ?>
