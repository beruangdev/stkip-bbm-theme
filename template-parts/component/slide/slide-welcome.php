<?php
$slide_photo = [
  'foto-1.jpg',
  'foto-2.jpg',
  'foto-3.jpg',
  'foto-4.jpg',
  'foto-5.jpg',
  'foto-6.jpg',
];
$slide_urls = [];
for ($index = 1; $index <= 7; $index++) {
  $slide_urls[] =  get_template_directory_uri() . "/assets/img/slide-welcome/foto-$index.jpg";
}
?>

<div class="swiper slide-welcome">
  <div class="swiper-wrapper">
    <?php foreach ($slide_urls as $slide_url) : ?>
      <div class="swiper-slide relative">
        <img src="<?= $slide_url ?>" alt="" class="aspect-[14/16] md:aspect-[16/7] object-cover object-center w-full h-full">
        <!-- <div class="absolute w-full h-[40%] bottom-0 left-0 bg-gradient-to-b from-transparent to-white dark:from-transparent dark:to-background-900/100"></div> -->
        <div class="absolute w-full h-[40%] bottom-0 left-0 bg-gradient-to-b from-transparent via-background-75/90 to-background-75 dark:via-background-900/90  dark:to-background-900/100"></div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-pagination"></div>
</div>