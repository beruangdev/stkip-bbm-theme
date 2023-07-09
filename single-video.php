<?php get_header(); ?>
<?php
function get_youtube_video_id($url)
{
  $pattern = '/(?:youtube(?:-nocookie)?\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/|vimeo\.com\/(?:.*#|.*?clip_id=|video\/|.*?\/videos\/)?|dai\.ly\/|player\.vimeo\.com\/video\/)([a-zA-Z0-9_-]{6,11})/';
  preg_match($pattern, $url, $matches);
  if (isset($matches[1])) {
    return $matches[1];
  }
  return false;
}

?>
<div class="container py-6">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h1 class="text-3xl font-bold mb-6"><?php the_title(); ?></h1>

      <div class="video-embed">
        <?php
        $video_url = get_post_meta(get_the_ID(), 'video_youtube_url', true);
        if ($video_url) {
          $embed_url = 'https://www.youtube.com/embed/' . esc_html(get_youtube_video_id($video_url));
        ?>
          <iframe width="560" height="315" src="<?php echo esc_url($embed_url); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <?php } ?>
      </div>

      <div class="mt-6">
        <?php the_content(); ?>
      </div>
  <?php endwhile;
  endif; ?>
</div>

<?php get_footer(); ?>