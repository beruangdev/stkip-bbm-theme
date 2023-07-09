<?php get_header(); ?>

<div class="container py-6">
  <h1 class="text-3xl font-bold mb-6">Videos</h1>

  <div class="grid grid-cols-3 gap-6">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="bg-white dark:bg-gray-800 p-4 shadow rounded">
        <h2 class="text-xl font-bold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="text-gray-600 dark:text-gray-400"><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="inline-block mt-2 text-blue-500">Watch Video</a>
      </div>
    <?php endwhile; else : ?>
      <p><?php _e('No videos found.', 'textdomain'); ?></p>
    <?php endif; ?>
  </div>

  <div class="mt-6">
    <?php the_posts_pagination(); ?>
  </div>
</div>

<?php get_footer(); ?>
