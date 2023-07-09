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

function get_event_location($event_id)
{
  $location = get_post_meta($event_id, 'event_location', true);
  return $location;
}
?>

<div class="container py-6">
  <h1 class="text-3xl font-bold mb-6">Events</h1>

  <div class="grid grid-cols-3 gap-6">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="bg-white dark:bg-gray-800 p-4 shadow rounded">
          <h2 class="text-xl font-bold mb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <p class="text-gray-600 dark:text-gray-400"><?php echo get_event_date_range(get_the_ID()); ?></p>
          <p class="text-gray-600 dark:text-gray-400"><?php echo get_event_location(get_the_ID()); ?></p>
          <a href="<?php the_permalink(); ?>" class="inline-block mt-2 text-blue-500">View Event</a>
        </div>
      <?php endwhile;
    else : ?>
      <p><?php _e('No events found.', 'textdomain'); ?></p>
    <?php endif; ?>
  </div>

  <div class="mt-6">
    <?php the_posts_pagination(); ?>
  </div>
</div>

<?php get_footer(); ?>