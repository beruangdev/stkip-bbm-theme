import { getLS, setLS } from "../local-storage.js";

window.fetchChild = fetchChild;
function fetchChild({ slug }) {
  return {
    posts: [],
    baseUrl: `https://stkipbbm.ac.id/${slug}`,
    async init() {
      setLS(`posts:news:${slug}`, [], 60 * 3);
      let posts = getLS(`posts:news:${slug}`);
      if (!posts || posts.length === 0) {
        posts = await this.fetchPost();
        setLS(`posts:news:${slug}`, posts, 60 * 3);
      }
      this.posts = posts;
    },
    async fetchPost() {
      return await new Promise((resolve, reject) => {
        let url = `${this.baseUrl}/wp-json/wp/v2/posts?per_page=5&_embed&fields=id,title,link,date,categories,_embedded.wp:featuredmedia.source_url,_embedded.wp:featuredmedia.media_details.sizes`;
        fetch(url)
          .then((response) => response.json())
          .then((data) => {
            let posts = data.map((item) => {
              // console.log("🚀 ~ file: fetch-child.js:24 ~ posts ~ item:", item);

              let img = "https://via.placeholder.com/150";
              let imgsrcset = "";
              try {
                img = item._embedded["wp:featuredmedia"][0].source_url;
                const sizes =
                  item._embedded["wp:featuredmedia"][0].media_details.sizes;
                const srcset = Object.values(sizes)
                  .map((size) => `${size.source_url} ${size.width}w`)
                  .join(", ");

                imgsrcset = srcset;
              } catch (error) {}

              let post = {
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
                img,
                imgsrcset,
              };
              return post;
            });
            console.log("🚀 ~ file: fetch-child.js:48 ~ .then ~ posts:", posts);
            resolve(posts);
          });
      });
    },
    getCategory(categoryId, item) {
      const categoryIndex = item._links["wp:term"].findIndex(
        (item) => item.taxonomy === "category",
      );
      if (categoryIndex !== -1) {
        const category = item._embedded["wp:term"][categoryIndex].find(
          (item) => item.id === categoryId,
        );
        if (category) {
          return category;
        }
      }
      return {};
    },
    getTag(tagId, item) {
      const tagIndex = item._links["wp:term"].findIndex(
        (item) => item.taxonomy === "post_tag",
      );
      if (tagIndex !== -1) {
        const tag = item._embedded["wp:term"][tagIndex].find(
          (item) => item.id === tagId,
        );
        if (tag) {
          return tag;
        }
      }
      return {};
    },
  };
}
