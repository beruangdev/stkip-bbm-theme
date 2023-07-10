<?php
$slide_urls = [];
for ($index = 1; $index <= 3; $index++) {
  $slide_urls[] =  get_template_directory_uri() . "/assets/img/slide-welcome/Slide_0$index.jpg";
}
?>

<div class="swiper slide-welcome">
  <div class="swiper-wrapper">
    <?php foreach ($slide_urls as $slide_url) : ?>
      <div class="swiper-slide relative">
        <img src="<?= $slide_url ?>" alt="" class="aspect-[14/16] md:aspect-[16/7] object-cover object-center">
        <!-- <div class="absolute w-full h-[40%] bottom-0 left-0 bg-gradient-to-b from-transparent to-white dark:from-transparent dark:to-background-900/100"></div> -->
        <div class="absolute w-full h-[40%] bottom-0 left-0 bg-gradient-to-b from-transparent via-white/90 to-white/100 dark:via-gray-900/90  dark:to-gray-900/100"></div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-pagination"></div>
</div>