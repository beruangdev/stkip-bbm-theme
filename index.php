<?php get_header() ?>
<?php if (str_starts_with($_SERVER['REQUEST_URI'], '/articles')) : ?>
  <div class="mt-28">
    <?php get_template_part('archive-post'); ?>
  </div>

<?php elseif (str_starts_with($_SERVER['REQUEST_URI'], '/')) : ?>

  <?php get_template_part('template-parts/component/slide/slide-welcome'); ?>
  <?php get_template_part('template-parts/page-welcome/section-after-slide'); ?>
  <?php get_template_part('template-parts/page-welcome/section-fitur-campus'); ?>
  <?php get_template_part('template-parts/page-welcome/section-event'); ?>
  <div class="container">
    <hr class="h-px my-4 md:my-8 bg-gray-200 border-0 dark:bg-gray-700">
  </div>
  <?php get_template_part('template-parts/page-welcome/section-post-list'); ?>
  <div class="container">
    <hr class="h-px my-4 md:my-8 bg-gray-200 border-0 dark:bg-gray-700">
  </div>
  <div class="container grid grid-cols-1 md:grid-cols-2 gap-4">
    <?php get_template_part('template-parts/page-welcome/section-biologi'); ?>
    <?php get_template_part('template-parts/page-welcome/section-mtk'); ?>
    <?php get_template_part('template-parts/page-welcome/section-pgsd'); ?>
  </div>

<?php endif; ?>



<?php get_footer() ?>