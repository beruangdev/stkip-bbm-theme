<?php get_header() ?>

<?php get_template_part('template-parts/component/slide/slide-welcome'); ?>
<?php get_template_part('template-parts/page-welcome/section-after-slide'); ?>
<?php get_template_part('template-parts/page-welcome/section-event'); ?>
<?php get_template_part('template-parts/page-welcome/section-fitur-campus'); ?>
<div class="container">
  <hr class="h-px my-4 md:my-8 border-0">
</div>
<?php get_template_part('template-parts/page-welcome/section-post-list'); ?>
<div class="container">
  <hr class="h-px my-4 md:my-8 border-0">
</div>
<div class="container grid grid-cols-1 md:grid-cols-2 gap-4">
  <?php get_template_part('template-parts/page-welcome/section-biologi'); ?>
  <?php get_template_part('template-parts/page-welcome/section-mtk'); ?>
  <?php get_template_part('template-parts/page-welcome/section-pgsd'); ?>
</div>

<?php get_footer() ?>