<?php
$slide_urls = [];
for ($index = 1; $index <= 3; $index++) {
  $slide_urls[] =  get_template_directory_uri() . "/assets/img/slide-welcome/Slide_0$index.jpg";
}
?>

<div class="swiper slide-welcome">
  <div class="swiper-wrapper">
    <?php foreach ($slide_urls as $slide_url) : ?>
      <div class="swiper-slide">
        <img src="<?= $slide_url ?>" alt="" class="aspect-video md:aspect-[16/5] object-cover object-center">
      </div>
    <?php endforeach; ?>
  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-pagination"></div>
</div>