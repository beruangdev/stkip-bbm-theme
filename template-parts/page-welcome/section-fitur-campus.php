<?php
$features = [
  [
    "label" => "E-Learning",
    "link" => "https://elearning.stkipbbm.ac.id/login/index.php",
    "description" => "Aplikasi E-Learning untuk belajar secara online",
  ],
  [
    "label" => "Jurnal Genta Mulia",
    "link" => "https://ejournal.stkipbbm.ac.id/index.php/gm",
    "description" => "Jurnal Ilmiah Pendidikan dengan berbagai topik menarik",
  ],
  [
    "label" => "Jurnal Bionatural",
    "link" => "https://ejournal.stkipbbm.ac.id/index.php/bio",
    "description" => "Jurnal Ilmiah Pendidikan Biologi untuk penelitian dan referensi",
  ],
  [
    "label" => "Jurnal Binagogik",
    "link" => "https://ejournal.stkipbbm.ac.id/index.php/pgsd",
    "description" => "Jurnal Ilmiah Pendidikan Guru Sekolah Dasar dengan beragam artikel inspiratif",
  ],
  [
    "label" => "Jurnal MAJU",
    "link" => "https://ejournal.stkipbbm.ac.id/index.php/mtk",
    "description" => "Jurnal Ilmiah Pendidikan Matematika yang memperluas wawasan",
  ],
  [
    "label" => "Perpustakaan",
    "link" => "https://stkipbbm.ac.id/pustaka/",
    "description" => "Sumber daya yang kaya dan lengkap untuk pengetahuan dan penelitian",
  ],
];
?>

<div class="container relative z-10 mb-6">
  <div class="grid grid-cols-1 md:grid-cols-6 gap-2">
    <?php foreach ($features as $feature) : ?>
      <a href="<?= $feature['link'] ?>" class="border rounded-md py-3 px-3 no-underline">
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