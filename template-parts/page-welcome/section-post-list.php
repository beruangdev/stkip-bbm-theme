<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$query = new WP_Query(array(
  'post_type' => 'post',
  'posts_per_page' => 6,
  'paged' => $paged
));
?>

<div class="container flex flex-col md:flex-row md:gap-6">
  <div class="md:basis-8/12 flex flex-col gap-4 mb-4 md:mb-0">
    <div class="flex justify-between items-center mb-3">
      <h3>Berita</h3>

      <a href="/articles" class="group flex items-center gap-2 duration-200  hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg px-3 py-1 dark:hover:bg-background-950/30 focus:outline-none dark:focus:ring-background-800 no-underline ">
        <h5 class="group-hover:text-white text-primary-950 dark:text-white dark:group-hover:text-white/60">Lainnya</h5>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 group-hover:text-white text-primary-950 dark:text-white dark:group-hover:text-white/60">
          <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
        </svg>
      </a>
    </div>

    <?php if ($query->have_posts()) : ?>
      <?php while ($query->have_posts()) : $query->the_post(); ?>
        <?php get_template_part('template-parts/component/card/card-horizontal'); ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <div class="md:basis-4/12 flex flex-col gap-4">
    <?= get_template_part('template-parts/page-welcome/section-announcement'); ?>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.5358632840225!2d96.18828927462576!3d4.1143651958594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303ec3c16fe3fbb5%3A0x6b3af3b761e996e!2sSTKIP%20Bina%20Bangsa%20Meulaboh!5e0!3m2!1sid!2sid!4v1688943402086!5m2!1sid!2sid" class="aspect-square w-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>

<?php wp_reset_postdata(); ?>