<?php get_header(); ?>

<div class="grid grid-cols-12 container mt-20 gap-x-8">
  <div class="col-span-12 md:col-span-8">
    <?php if (have_posts()) : the_post(); ?>

      <div class="flex opacity-80">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="<?= get_home_url() ?>" class="inline-flex items-center font-medium">
              <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
              </svg>
              Home
            </a>
          </li>
          <li>
            <div class="flex items-center">
              <svg class="w-3 h-3 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
              </svg>
              <?php if (get_post_type() === "post") : ?>
                <a href="<?= get_home_url() ?>/news" class="ml-1">News</a>
              <?php else : ?>
                <a href="<?= esc_url(get_post_type_archive_link(get_post_type())); ?>" class="ml-1 capitalize"><?= get_post_type(); ?></a>
              <?php endif; ?>
            </div>
          </li>

        </ol>
      </div>

      <h1 class="text-2xl md:text-4xl w-full text-center mt-6 mb-4 md:mt-8 md:mb-6 font-bold"><?php the_title(); ?></h1>
      <div class="flex justify-center gap-2 opacity-75 text-sm md:text-base">
        <p class="author">
          <?php esc_html_e('By', 'your-theme'); ?> <?php the_author(); ?>
        </p>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4.5" stroke="currentColor" class="w-2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
        </svg>

        <?php if (has_category()) : ?>
          <p class="category">
            <?php the_category(', '); ?>
          </p>
        <?php endif; ?>
      </div>


      <p class="date text-center opacity-70 mb-6 text-sm md:text-base">
        <?php esc_html_e('Published on', 'your-theme'); ?> <?php the_date(); ?>
      </p>

      <div>
        <?php if (has_post_thumbnail()) : ?>
          <div class="post-thumbnail mb-8">
            <?php the_post_thumbnail('large', ['class' => 'w-full']); ?>
          </div>
        <?php endif; ?>

        <div class="content mb-4">
          <?php the_content(); ?>
        </div>

        <?php if (has_tag()) : ?>
          <p class="tags">
            <?php esc_html_e('Tags:', 'your-theme'); ?> <?php the_tags('', ', '); ?>
          </p>
        <?php endif; ?>
      </div>
    <?php else : ?>
      <p><?php esc_html_e('No content found.', 'your-theme'); ?></p>
    <?php endif; ?>
  </div>

  <div class="hidden md:block md:col-span-4">
    <div class="flex flex-col">
      <div class="h-56 w-full"></div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.5358632840225!2d96.18828927462576!3d4.1143651958594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303ec3c16fe3fbb5%3A0x6b3af3b761e996e!2sSTKIP%20Bina%20Bangsa%20Meulaboh!5e0!3m2!1sid!2sid!4v1688943402086!5m2!1sid!2sid" class="aspect-square w-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</div>
<?php get_footer(); ?>