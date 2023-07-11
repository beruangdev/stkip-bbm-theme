<?php get_header(); ?>
<?php
function get_event_date_range($event_id)
{
  $start_datetime = get_post_meta($event_id, 'event_start_datetime', true);
  $end_datetime = get_post_meta($event_id, 'event_end_datetime', true);

  if (!empty($start_datetime) && !empty($end_datetime)) {
    $start_datetime = new DateTime($start_datetime);
    $end_datetime = new DateTime($end_datetime);

    $start_date = $start_datetime->format('j F Y');
    $start_time = $start_datetime->format('H:i');
    $duration = '';
    $datetimetext = "";

    if ($start_datetime->format('Y-m-d') === $end_datetime->format('Y-m-d')) {
      $datetimetext .= $start_date . ' - ' . $end_datetime->format('H:i');
    } else {
      $datetimetext .= $start_date;
      $datetimetext .= ' (' . $start_time . ')';
      $datetimetext .= ' - ' . $end_datetime->format('j F Y');
      $datetimetext .= ' (' . $end_datetime->format('H:i') . ')';
    }

    $interval = $start_datetime->diff($end_datetime);

    if ($interval->d > 0) {
      $duration = $interval->d . ' day' . ($interval->d > 1 ? 's ' : ' ');
    }

    if ($interval->h > 0) {
      $duration .= $interval->h . ' hour' . ($interval->h > 1 ? 's ' : ' ');
    }

    if ($interval->d == 0 && $interval->i > 0) {
      $duration .= $interval->i . ' minute' . ($interval->i > 1 ? 's ' : ' ');
    }

    return $datetimetext . ' - Duration: ' . $duration;
  } elseif (!empty($start_datetime)) {
    $start_datetime = new DateTime($start_datetime);
    return $start_datetime->format('F j, Y');
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

<div class="container mt-20 flex flex-col gap-3">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h1 class="text-3xl font-bold"><?php the_title(); ?></h1>
      <div class="flex flex-col gap-1">
        <?php if (has_category()) : ?>
          <span class="category">
            <?php esc_html_e('Category:', 'your-theme'); ?> <?php the_category(', '); ?>
          </span>
        <?php endif; ?>

        <p class="flex gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
          </svg>
          <?php echo get_event_date_range(get_the_ID()); ?>
        </p>
        <p class="flex gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
          </svg>
          <?php echo get_event_location(get_the_ID()); ?>
        </p>
      </div>

      <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail mb-3">
          <?php the_post_thumbnail('large', ['class' => 'w-full']); ?>
        </div>
      <?php endif; ?>

      <div>
        <?php the_content(); ?>
      </div>

      <?php if (has_tag()) : ?>
        <span class="tags">
          <?php esc_html_e('Tags:', 'your-theme'); ?> <?php the_tags('', ', '); ?>
        </span>
      <?php endif; ?>
  <?php endwhile;
  endif; ?>
</div>

<?php get_footer(); ?>