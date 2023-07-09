<?php get_header(); ?>

<div class="container py-12">
  <h1 class="text-3xl font-bold mb-6"><?php single_tag_title(); ?></h1>

  <div class="grid grid-cols-3 gap-6">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="bg-white dark:bg-gray-800 p-4 shadow rounded">
        <h2 class="text-xl font-bold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="text-gray-600 dark:text-gray-400"><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="inline-block mt-2 text-blue-500">Read More</a>
      </div>
    <?php endwhile; else : ?>
      <p><?php _e('No posts found.', 'textdomain'); ?></p>
    <?php endif; ?>
  </div>

  <div class="mt-6">
    <?php
      global $wp_query;

      $big = 999999999; // Nomor besar agar selalu ada halaman berikutnya
      $paginate_args = array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => __('Previous', 'textdomain'),
        'next_text' => __('Next', 'textdomain'),
        'mid_size' => 5 // Jumlah tombol nomor yang ditampilkan (termasuk halaman saat ini)
      );

      $paginate_links = paginate_links($paginate_args);

      // Tambahkan logika disable dan active element
      $paginate_links = str_replace('page-numbers', 'border border-gray-300 dark:border-gray-700 px-3 py-1 rounded-full mr-2 hover:bg-blue-500 hover:text-white transition-colors duration-200', $paginate_links);
      $paginate_links = str_replace('prev page-numbers', 'border border-gray-300 dark:border-gray-700 px-3 py-1 rounded-full mr-2 hover:bg-blue-500 hover:text-white transition-colors duration-200', $paginate_links);
      $paginate_links = str_replace('next page-numbers', 'border border-gray-300 dark:border-gray-700 px-3 py-1 rounded-full mr-2 hover:bg-blue-500 hover:text-white transition-colors duration-200', $paginate_links);
      $paginate_links = str_replace('current page-numbers', 'bg-blue-500 text-white border border-blue-500 px-3 py-1 rounded-full mr-2', $paginate_links);

      echo '<div class="flex justify-center">';
      echo $paginate_links;
      echo '</div>';
    ?>
  </div>
</div>

<?php get_footer(); ?>
