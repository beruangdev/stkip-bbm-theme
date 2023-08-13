<div class="mt-6 flex justify-between items-center gap-3">
  <?php if (get_previous_posts_link()) : ?>
    <div>
      <?php previous_posts_link('<span class="px-3 py-2 rounded-md text-gray-700 hover:bg-gray-300 dark:text-white dark:border dark:hover:bg-background-1000 dark:hover:border-background-1000 no-underline">' . __('Previous', 'textdomain') . '</span>'); ?>
    </div>
  <?php endif; ?>

  <div class="flex gap-3">
    <?php
    global $wp_query;

    $total_pages = $wp_query->max_num_pages;
    $current_page = max(1, get_query_var('paged'));

    $prev_page = max(1, $current_page - 1);
    $next_page = min($total_pages, $current_page + 1);

    $show_pages = 3;
    $start_page = max(1, $current_page - floor($show_pages / 2));
    $end_page = min($total_pages, $start_page + $show_pages - 1);

    if ($start_page > 1) {
      echo '<a href="' . get_pagenum_link(1) . '" class="px-3 py-1 rounded-md text-gray-700 hover:bg-gray-300 dark:hover:bg-background-950 no-underline">' . 1 . '</a>';
    }

    for ($i = $start_page; $i <= $end_page; $i++) {
      $class = $i === $current_page ? 'bg-primary-700 hover:bg-primary-900 text-white' : 'text-gray-700 dark:text-white/50 hover:bg-gray-300 dark:hover:bg-background-950';
      echo '<a href="' . get_pagenum_link($i) . '" class="px-3 py-1 rounded-md no-underline ' . $class . '">' . $i . '</a>';
    }

    if ($end_page < $total_pages) {
      echo '<a href="' . get_pagenum_link($total_pages) . '" class="px-3 py-1 rounded-md text-gray-700 dark:text-white/50 hover:bg-gray-300 dark:hover:bg-background-950 no-underline">' . $total_pages . '</a>';
    }
    ?>
  </div>

  <?php if (get_next_posts_link()) : ?>
    <div>
      <?php next_posts_link('<span class="px-3 py-2 rounded-md text-gray-700 dark:text-white  hover:bg-gray-300 dark:border dark:hover:bg-background-1000 dark:hover:border-background-1000 ">' . __('Next', 'textdomain') . '</span>'); ?>
    </div>
  <?php endif; ?>
</div>