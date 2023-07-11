<!-- file: archive.php -->
<?php get_header(); ?>
<div class="container mt-20">
  <div class="mb-6">
    <?php if (is_post_type_archive("post")) : ?>
      <h1><?php post_type_archive_title(); ?></h1>
    <?php elseif (is_post_type_archive('announcement')) : ?>
      <h1><?php post_type_archive_title(); ?></h1>
    <?php elseif (is_post_type_archive('video')) : ?>
      <h1><?php post_type_archive_title(); ?></h1>
    <?php elseif (is_post_type_archive('event')) : ?>
      <h1><?php post_type_archive_title(); ?></h1>
    <?php elseif (is_category()) : ?>
      <h1><?php single_cat_title(); ?></h1>
    <?php elseif (is_tag()) : ?>
      <h1><?php single_tag_title(); ?></h1>
    <?php else : ?>
      <h1>Archive.php</h1>
    <?php endif; ?>
  </div>

  <div class="flex flex-col gap-4">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/component/card/card-horizontal'); ?>
      <?php endwhile ?>
    <?php else : ?>
      <p><?= post_type_archive_title() ?> is empty</p>
    <?php endif ?>
  </div>

  <div class="mx-auto w-fit">
    <?php get_template_part('template-parts/component/pagination'); ?>
  </div>

</div>

<?php get_footer(); ?>