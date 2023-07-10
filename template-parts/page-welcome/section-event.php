<?php
$args = array(
  'post_type' => 'event',
  'posts_per_page' => 5
);
$events_query = new WP_Query($args);
?>

<div class="container relative z-10">
  <div class="flex justify-between items-center mb-1">
    <h3>Event Kampus</h3>

    <a href="<?php echo esc_url(get_post_type_archive_link('event')); ?>" class="group flex items-center gap-2 duration-200  hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg px-5 py-2 dark:hover:bg-background-950/30 focus:outline-none dark:focus:ring-background-800 no-underline">
      <h5 class="group-hover:text-white text-primary-950">Lainnya</h5>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 group-hover:text-white text-primary-950 dark:text-white">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
      </svg>
    </a>
  </div>

  <?php if ($events_query->have_posts()) : ?>
    <div class="swiper freemode" data-slides-per-view="1.15" data-breakpoints='{"640": {"slidesPerView": 2.2}}'>
      <div class="swiper-wrapper">
        <?php while ($events_query->have_posts()) :
          $events_query->the_post();
          $event_date = get_the_date('d');
          $event_month = get_the_date('M');
          $event_location = get_post_meta(get_the_ID(), 'event_location', true);
        ?>
          <div class="swiper-slide">
            <div class="flex gap-2">
              <div class="aspect-square w-[116px] max-w-[116px] min-w-[116px] h-fit bg-primary-700 dark:bg-primary-900  text-white text-center flex flex-col items-center justify-center rounded-md overflow-hidden relative group">
                <div class="absolute inset-0 h-full opacity-10 group-hover:opacity-100 duration-300 ">
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="no-underline">
                    <?php if (has_post_thumbnail()) : ?>
                      <?= get_the_post_thumbnail(get_the_ID(), 'medium', ['class' => 'rounded-lg object-cover object-top inset-0 h-full w-full']); ?>
                    <?php else : ?>
                      <img src="https://via.placeholder.com/150" class="rounded-lg object-cover object-top inset-0 h-full w-full" alt="Placeholder Image">
                    <?php endif; ?>
                  </a>
                </div>
                <span class="text-sm text-white"><?php echo get_the_date('l'); ?></span>
                <h5 class="text-white"><?php echo $event_date; ?> <?php echo $event_month; ?></h5>
              </div>
              <div class="flex flex-col justify-between">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="no-underline">
                  <h5><?php the_title(); ?></h5>
                </a>
                <div class="flex items-center gap-1">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                  </svg>
                  <p class="text-sm mt-1"><?php echo $event_location; ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  <?php else : ?>
    <h3>No events found.</h3>
  <?php endif; ?>

</div>

<?php wp_reset_postdata(); ?>