<div class="" x-data="sectionbio" x-init="initSectionbio">
  <div class="flex justify-between items-center mb-3">
    <h3>Berita Prodi Biologi</h3>

    <a :href="baseUrl" class="group flex items-center gap-2 duration-200  hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg px-5 py-2 dark:hover:bg-background-950/30 focus:outline-none dark:focus:ring-background-800 no-underline">
      <h5 class="group-hover:text-white text-primary-950">Lainnya</h5>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 group-hover:text-white text-primary-950 dark:text-white">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
      </svg>
    </a>
  </div>

  <div class="gap-2 flex flex-col">
    <template x-for="post in posts" :key="post.id">
      <div class="relative flex md:flex-row space-x-2 hover:scale-[1.02] hover:translate-y-[-0.5rem] duration-300">
        <a :href="post.link" class="w-1/4 grid place-items-center">
          <img :src="post.thumbnail" alt="Post Thumbnail" class="rounded-md w-full h-full object-cover object-center aspect-[16/12]" />
        </a>
        <div class="w-3/4 flex flex-col justify-between">
          <a :href="post.link" class="no-underline">
            <h6 x-text="post.title"></h6>
          </a>
          <div class="flex gap-2 items-center">
            <span class="flex items-center gap-0.5  text-sm">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span x-text="humanReadableTime(post.date)"></span>
            </span>
            <template x-if="post.categories.length > 0">
              <p class="text-xs"> - </p>
              <template x-for="category in post.categories">
                <a :href="category.link" class="text-sm" x-text="category.name"></a>
              </template>
            </template>
          </div>
        </div>
      </div>
    </template>
    <template x-if="posts.length === 0">
      <h3>No posts found.</h3>
    </template>
  </div>
</div>

<script>
  function sectionbio() {
    return {
      posts: [],
      baseUrl: "https://stkipbbm.ac.id/bio",
      async initSectionbio() {
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

  function humanReadableTime(dateString) {
    const formatter = new Intl.RelativeTimeFormat(getPreferredLanguage(), {
      numeric: 'auto',
      style: 'long',
      localeMatcher: 'best fit'
    });

    const olderDate = new Date(dateString);
    const currentDate = new Date();
    const diff = olderDate - currentDate;

    let timeUnit = "second";
    let time = 0
    const minutes = Math.floor(diff / 1000 / 60);
    const hours = Math.floor(minutes / 60);
    const days = Math.floor(hours / 24);
    const weeks = Math.floor(days / 7);
    const months = Math.floor(days / 30);
    const years = Math.floor(days / 365);

    if (years < 1) {
      timeUnit = "year";
      time = years;
    } else if (months < 1) {
      timeUnit = "month";
      time = months;
    } else if (weeks < 1) {
      timeUnit = "week";
      time = weeks;
    } else if (days < 1) {
      timeUnit = "day";
      time = days;
    } else if (hours < 1) {
      timeUnit = "hour";
      time = hours;
    } else if (minutes < 1) {
      timeUnit = "minute";
      time = minutes;
    } else {
      timeUnit = "second";
      time = diff;
    }
    time++
    if (typeof time === "number" && !isNaN(time)) {
      return formatter.format(time, timeUnit)
    }
    return "0000"
  }

  async function getPreferredLanguage() {
    let userLanguage = localStorage.getItem("userLocation")
    if (userLanguage) {
      userLanguage = JSON.parse(userLanguage)
      userLanguage = userLanguage.country_code
    } else {
      userLanguage = navigator.language || navigator.userLanguage;
    }
    return userLanguage;
  }
</script>