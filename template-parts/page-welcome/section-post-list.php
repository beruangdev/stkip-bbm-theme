<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$query = new WP_Query(array(
  'post_type' => 'post',
  'posts_per_page' => 10,
  'paged' => $paged
));
?>

<div class="flex container">
  <div class="post-list md:w-7/12 flex flex-col gap-4">
    <?php if ($query->have_posts()) : ?>
      <?php while ($query->have_posts()) : $query->the_post(); ?>
        <?php get_template_part('template-parts/component/card/card-horizontal'); ?>
      <?php endwhile; ?>
      <div class="mt-6">
        <?php
        $paginate_args = array(
          'format' => '?paged=%#%',
          'current' => max(1, get_query_var('paged')),
          'total' => $query->max_num_pages,
          'prev_text' => __('Previous', 'textdomain'),
          'next_text' => __('Next', 'textdomain'),
          'mid_size' => 1
        );

        $paginate_links = paginate_links($paginate_args);

        // Tambahkan logika disable dan active element
        $paginate_links = str_replace('page-numbers', 'px-3 py-1 rounded-lg mr-2 hover:bg-blue-400 hover:text-white transition-colors duration-200', $paginate_links);
        $paginate_links = str_replace('dots', 'hidden', $paginate_links);
        $paginate_links = str_replace('prev page-numbers', 'border border-gray-300 dark:border-gray-700 px-3 py-1 rounded-lg mr-2 hover:bg-blue-500 hover:text-white transition-colors duration-200', $paginate_links);
        $paginate_links = str_replace('next page-numbers', 'border border-gray-300 dark:border-gray-700 px-3 py-1 rounded-lg mr-2 hover:bg-blue-500 hover:text-white transition-colors duration-200', $paginate_links);
        $paginate_links = str_replace('current', 'bg-blue-500 text-white border border-blue-500 px-3 py-1 rounded-lg mr-2', $paginate_links);
        ?>
      </div>
      <div class="flex justify-center flex-wrap"><?= $paginate_links  ?></div>
    <?php endif; ?>
  </div>
  <div class="md:w-3/12"></div>
</div>

<?php wp_reset_postdata(); ?>