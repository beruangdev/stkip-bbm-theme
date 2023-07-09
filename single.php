<?php get_header() ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <?php
    while (have_posts()) :
      the_post();
    ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <h1 class="entry-title"><?php the_title(); ?></h1>
          <div class="entry-meta">
            <span class="posted-on">
              <time class="entry-date published" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>
            </span>
            <span class="byline">
              <?php
              printf(
                esc_html__('By %s', 'text-domain'),
                '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
              );
              ?>
            </span>
          </div><!-- .entry-meta -->
        </header><!-- .entry-header -->

        <div class="entry-content">
          <?php
          the_content();

          wp_link_pages(
            array(
              'before' => '<div class="page-links">' . esc_html__('Pages:', 'text-domain'),
              'after'  => '</div>',
            )
          );
          ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
          <?php
          if (has_category()) {
            echo '<div class="cat-links">' . esc_html__('Categories: ', 'text-domain');
            the_category(', ');
            echo '</div>';
          }

          if (has_tag()) {
            echo '<div class="tag-links">' . esc_html__('Tags: ', 'text-domain');
            the_tags('', ', ');
            echo '</div>';
          }
          ?>
        </footer><!-- .entry-footer -->
      </article><!-- #post-<?php the_ID(); ?> -->

      <side>
        <? get_sidebar() ?>
      </side>

    <?php endwhile; ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer() ?>