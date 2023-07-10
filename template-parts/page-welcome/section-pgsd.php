<div class="" x-data="sectionpgsd" x-init="initSectionpgsd">
  <div class="flex justify-between items-center mb-3">
    <h3>Berita Prodi PGSD</h3>

    <a :href="baseUrl" class="group flex items-center gap-2 duration-200  hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg px-5 py-2 dark:hover:bg-background-950/30 focus:outline-none dark:focus:ring-background-800 no-underline">
      <h5 class="group-hover:text-white text-primary-950">Lainnya</h5>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 group-hover:text-white text-primary-950 dark:text-white">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
      </svg>
    </a>
  </div>

  <div class="gap-2 flex flex-col">
    <template x-for="post in posts" :key="post.id">
      <?= get_template_part("template-parts/component/card/card-child-horizontal") ?>
    </template>
    <template x-if="posts.length === 0">
      <h3>No posts found.</h3>
    </template>
  </div>
</div>

<script>
  function sectionpgsd() {
    return {
      posts: [],
      baseUrl: "https://stkipbbm.ac.id/pgsd",
      async initSectionpgsd() {
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