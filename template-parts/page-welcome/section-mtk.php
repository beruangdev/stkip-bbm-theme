<div class="" x-data="fetchChild({slug: 'mtk'})" x-init="this.init">
  <div class="flex justify-between items-center mb-3">
    <h4>Berita Prodi Matematika</h4>
    <?php get_template_part('template-parts/component/button/button-lainnya'); ?>
  </div>
  <div class="gap-2 flex flex-col">
    <template x-for="post in posts" :key="post.id">
      <?= get_template_part("template-parts/component/card/card-child-horizontal") ?>
    </template>
    <template x-if="posts.length === 0">
      <h5>Belum ada berita</h5>
    </template>
  </div>
</div>