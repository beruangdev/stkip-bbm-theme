<?php
$args = array(
  'post_type' => 'announcement',
  'posts_per_page' => 3
);
$announcements_query = new WP_Query($args);
?>

<div class="bg-primary-600 dark:bg-primary-950 w-full rounded-md shadow-lg flex flex-col gap-1 px-2 pt-3 pb-4">
  <div class="flex justify-between items-center mb-1 px-2">
    <h4 class="flex items-center gap-2 text-white">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
      </svg>
      Pengumuman
    </h4>

    <a href="<?php echo esc_url(get_post_type_archive_link('announcement')); ?>" class="flex items-center gap-2 duration-200  hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg px-3 py-1 dark:hover:bg-background-950/30 focus:outline-none dark:focus:ring-background-800 no-underline">
      <h5 class="text-white">Lainnya</h5>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 text-white">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
      </svg>
    </a>
  </div>

  <?php if ($announcements_query->have_posts()) : ?>
    <?php while ($announcements_query->have_posts()) : $announcements_query->the_post(); ?>
      <div class="relative flex md:flex-row space-x-2 p-2 rounded-md hover:bg-primary-700 hover:dark:bg-primary-900">
        <a href="<?= esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>" class="w-1/4 max-w-[7rem] pt-3 md:pt-0">
          <?php if (has_post_thumbnail()) : ?>
            <?= the_post_thumbnail('medium', ['class' => 'rounded-lg w-full aspect-square object-cover object-center']); ?>
          <?php else : ?>
            <img src="https://via.placeholder.com/150" class="rounded-lg w-full aspect-square object-cover object-center" alt="Placeholder Image">
          <?php endif; ?>
        </a>
        <div class="w-3/4 flex flex-col justify-between">
          <a href="<?= esc_url(get_permalink()); ?>" class="no-underline">
            <h6 class="text-white"><?php the_title(); ?></h6>
          </a>
          <div class="flex gap-2 items-center">
            <span class="flex items-center gap-0.5 text-white text-sm">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <?= human_time_diff(get_the_time('U'), current_time('timestamp')); ?>
            </span>
            <?php $categories = get_the_category(); ?>
            <?php if ($categories) : ?>
              <p class="text-white text-xs"> - </p>
              <?php $categories = array_slice($categories, 0, 3); ?>
              <?php foreach ($categories as $category) : ?>
                <a href="<?= esc_url(get_category_link($category->term_id)); ?>" class="text-white text-sm"><?= esc_html($category->name); ?></a>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  <?php else : ?>
    <h3 class="text-white">No announcements found.</h3>
  <?php endif; ?>


</div>
<?php wp_reset_postdata(); ?>