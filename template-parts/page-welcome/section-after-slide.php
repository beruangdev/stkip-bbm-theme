<?php
$contents = [
  [
    "title" => "Mengapa STKIP BBM?",
    "description" => "STKIP Bina Bangsa Meulaboh berdiri Sejak tahun 2009 berdasarkan surat keputusan Direktorat Jenderal Pendidikan Tinggi Departemen Pendidikan Nasional Republik Indonesia Nomor: 165/D/O/2009 tanggal 14 Oktober 2009.",
  ],
  [
    "title" => "Prodi",
    "description" => "Pada awal pendiriannya terdapat 3 (tiga) program studi yang diselenggarakan yaitu program studi Pendidikan Guru Sekolah Dasar (PGSD) jenjang diploma S1, Pendidikan Biologi jenjang S1, dan Pendidikan Matematika jenjang S1",
  ],
  [
    "title" => "Visi Kami",
    "description" => "Menjadi salah satu Lembaga Pendidikan Tenaga Kependidikan (LPTK) yang unggul, berkarakter, dan berdaya saing, serta berperan aktif mendukung kemajuan masyarakat Aceh pada tahun 2025.",
  ],
];
?>
<div class="relative grid grid-cols-1 md:grid-cols-3  gap-1 container -mt-[17rem] z-10 mb-8">
  <?php foreach ($contents as $key => $content) : ?>
    <div class="flex flex-col w-full bg-blue-700 shadow-lg rounded-md">
      <div class="py-6 pb-2 text-center">
        <h3 class="font-semibold text-white text-lg"><?= $content['title'] ?></h3>
      </div>
      <div class="text-sm text-white p-6 pt-0">
        <p class="text-white"><?= $content['description'] ?></p>
      </div>
    </div>
  <?php endforeach; ?>
</div>