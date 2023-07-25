<?php
$folder_path = get_template_directory() . "/assets/img/slide-welcome/";
$slide_photos = array_filter(scandir($folder_path), function ($file) {
  return in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']);
});

$slide_urls = [];
foreach ($slide_photos as $slide_photo) {
  $slide_urls[] = get_template_directory_uri() . "/assets/img/slide-welcome-abb/$slide_photo";
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