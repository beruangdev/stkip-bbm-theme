<?php
$features = [
  [
    "label" => "E-Learning",
    "link" => "https://elearning.stkipbbm.ac.id/login/index.php",
    "description" => "Aplikasi E-Learning untuk belajar secara online",
  ],
  [
    "label" => "E-Journal",
    "link" => "https://ejournal.stkipbbm.ac.id/",
    "description" => "Jurnal Ilmiah dengan berbagai topik menarik",
  ],
  [
    "label" => "Sipenmaru",
    "link" => "#sipenmaru",
    "description" => "",
  ],
];
?>

<div class="container relative z-10 mb-6">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
    <?php foreach ($features as $feature) : ?>
      <a href="<?= $feature['link'] ?>" class="border rounded-md p-5 no-underline shadow-xl">
        <div class="group w-full h-full flex flex-col gap-2">
          <h5 class="group-hover:scale-105 group-hover:-translate-y-1 group-hover:translate-x-1 duration-300">
            <?= $feature['label'] ?>
          </h5>
          <p class="text-sm"><?= $feature['description'] ?></p>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</div>