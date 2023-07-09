<?php get_header(); ?>

<div class="container py-12">
  <h1 class="text-3xl font-bold mb-6"><?php single_cat_title(); ?></h1>

  <div class="grid grid-cols-3 gap-6">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="bg-white p-4 shadow rounded">
        <h2 class="text-xl font-bold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="text-gray-600"><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="inline-block mt-2 text-blue-500">Read More</a>
      </div>
    <?php endwhile; else : ?>
      <p>No posts found.</p>
    <?php endif; ?>
  </div>

  <div class="mt-6">
    <?php
      // Pagination
      the_posts_pagination(array(
        'prev_text' => __('Previous', 'textdomain'),
        'next_text' => __('Next', 'textdomain'),
      ));
    ?>
  </div>
</div>

<?php get_footer(); ?>
