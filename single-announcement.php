<?php get_header(); ?>

<div class="container py-6">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h1 class="text-3xl font-bold mb-6"><?php the_title(); ?></h1>

      <div class="mt-6">
        <?php the_content(); ?>
      </div>
  <?php endwhile;
  endif; ?>
</div>

<?php get_footer(); ?>