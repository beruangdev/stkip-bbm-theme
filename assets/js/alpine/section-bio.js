window.sectionbio = sectionbio;
function sectionbio() {
  return {
    posts: [],
    baseUrl: "https://stkipbbm.ac.id/bio",
    async initSectionbio() {
      await this.fetchPost();
    },
    async fetchPost() {
      return await new Promise((resolve, reject) => {
        let url = `${this.baseUrl}/wp-json/wp/v2/posts?per_page=5&_embed&fields=id,title,link,date,categories,_embedded.wp:featuredmedia.source_url`;
        fetch(url)
          .then((response) => response.json())
          .then((data) => {
            this.posts = data.map((item) => {
              let thumbnail = "https://via.placeholder.com/150";
              try {
                thumbnail = item._embedded["wp:featuredmedia"][0].source_url;
              } catch (error) {}
              if (!thumbnail) thumbnail = "https://via.placeholder.com/150";

              return {
                id: item.id,
                title: item.title.rendered,
                link: item.link,
                date: item.date,
                author: item._embedded?.author,
                categories: item.categories.map((categoryId) => ({
                  id: categoryId,
                  ...this.getCategory(categoryId, item),
                })),
                tags: item.tags.map((tagId) => ({
                  id: tagId,
                  ...this.getTag(tagId, item),
                })),
                thumbnail,
              };
            });
          });
      });
    },
    getCategory(categoryId, item) {
      const categoryIndex = item._links["wp:term"].findIndex(
        (item) => item.taxonomy === "category"
      );
      if (categoryIndex !== -1) {
        const category = item._embedded["wp:term"][categoryIndex].find(
          (item) => item.id === categoryId
        );
        if (category) {
          return category;
        }
      }
      return {};
    },
    getTag(tagId, item) {
      const tagIndex = item._links["wp:term"].findIndex(
        (item) => item.taxonomy === "post_tag"
      );
      if (tagIndex !== -1) {
        const tag = item._embedded["wp:term"][tagIndex].find(
          (item) => item.id === tagId
        );
        if (tag) {
          return tag;
        }
      }
      return {};
    },
  };
}
