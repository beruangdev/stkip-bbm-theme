<?php get_header(); ?>
<?php
function get_event_date_range($event_id)
{
  $start_date = get_post_meta($event_id, 'event_start_date', true);
  $end_date = get_post_meta($event_id, 'event_end_date', true);

  if (!empty($start_date) && !empty($end_date)) {
    return date('F j, Y', strtotime($start_date)) . ' - ' . date('F j, Y', strtotime($end_date));
  } elseif (!empty($start_date)) {
    return date('F j, Y', strtotime($start_date));
  }

  return '';
}

// Fungsi untuk mendapatkan lokasi acara
function get_event_location($event_id)
{
  $location = get_post_meta($event_id, 'event_location', true);
  return $location;
}
?>

<div class="container py-6">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h1 class="text-3xl font-bold mb-6"><?php the_title(); ?></h1>

      <p class="text-gray-600 dark:text-gray-400"><?php echo get_event_date_range(get_the_ID()); ?></p>
      <p class="text-gray-600 dark:text-gray-400"><?php echo get_event_location(get_the_ID()); ?></p>

      <div class="mt-6">
        <?php the_content(); ?>
      </div>
  <?php endwhile;
  endif; ?>
</div>

<?php get_footer(); ?>