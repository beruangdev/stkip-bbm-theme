<?php
$features = [
  [
    "label" => "Sipenmaru",
    "link" => "/sipenmaru",
    "description" => "Penerimaan mahasiswa baru 2023",
  ],
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
];
?>

<div class="container relative z-10 mb-6">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
    <?php foreach ($features as $feature) : ?>
      <a href="<?= $feature['link'] ?>" class="group border-2 duration-300 hover:border-blue-600 rounded-md p-5 no-underline shadow-xl">
        <div class="w-full h-full flex flex-col gap-2">
          <h5 class="group-hover:scale-105 group-hover:-translate-y-1 group-hover:translate-x-1 duration-300 group-hover:text-blue-600">
            <?= $feature['label'] ?>
          </h5>
          <p class="text-sm group-hover:text-blue-600"><?= $feature['description'] ?></p>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</div>