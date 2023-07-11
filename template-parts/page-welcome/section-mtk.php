<div class="" x-data="sectionmtk" x-init="initSectionmtk">
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

<script>
  function sectionmtk() {
    return {
      posts: [],
      baseUrl: "https://stkipbbm.ac.id/mtk",
      async initSectionmtk() {
        await this.fetchPost()
      },
      async fetchPost() {
        return await new Promise((resolve, reject) => {
          let url = `${this.baseUrl}/wp-json/wp/v2/posts?per_page=5&_embed&fields=id,title,link,date,categories,_embedded.wp:featuredmedia.source_url`
          fetch(url)
            .then(response => response.json())
            .then(data => {

              this.posts = data.map(item => {
                let thumbnail = "https://via.placeholder.com/150"
                try {
                  thumbnail = item._embedded['wp:featuredmedia'][0].source_url
                } catch (error) {}
                if (!thumbnail) thumbnail = "https://via.placeholder.com/150"

                return {
                  id: item.id,
                  title: item.title.rendered,
                  link: item.link,
                  date: item.date,
                  author: item._embedded?.author,
                  categories: item.categories.map(categoryId => ({
                    id: categoryId,
                    ...this.getCategory(categoryId, item)
                  })),
                  tags: item.tags.map(tagId => ({
                    id: tagId,
                    ...this.getTag(tagId, item)
                  })),
                  thumbnail
                }
              });
            });
        })
      },
      getCategory(categoryId, item) {
        const categoryIndex = item._links["wp:term"].findIndex(item => item.taxonomy === "category");
        if (categoryIndex !== -1) {
          const category = item._embedded["wp:term"][categoryIndex].find(item => item.id === categoryId);
          if (category) {
            return category;
          }
        }
        return {};
      },
      getTag(tagId, item) {
        const tagIndex = item._links["wp:term"].findIndex(item => item.taxonomy === "post_tag");
        if (tagIndex !== -1) {
          const tag = item._embedded["wp:term"][tagIndex].find(item => item.id === tagId);
          if (tag) {
            return tag;
          }
        }
        return {};
      }
    }
  }
</script>