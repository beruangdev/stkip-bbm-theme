<div class="relative flex items-start space-x-2 hover:scale-[1.02] hover:translate-y-[-0.15rem] duration-300">
  <a :href="post.link" class="w-1/4 max-w-[7rem] pt-3 md:pt-0 h-full">
    <img :src="post.thumbnail" alt="Post Thumbnail" class="rounded-md w-full object-cover object-center aspect-square" />
  </a>
  <div class="w-3/4 flex flex-col justify-between">
    <a :href="post.link" class="no-underline">
      <h6 x-text="post.title"></h6>
    </a>
    <div class="flex flex-col md:flex-row w-full gap-2 gap-y-0 md:justify-between md:items-start">
      <span class="flex items-center gap-0.5 text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <p x-text="humanReadableTime(post.date)">
        </p>
      </span>
      <div x-data class="flex flex-col">
        <!-- <template x-if="post.categories.length > 0">
          <p class="text-xs hidden md:inline-block"> - </p>
        </template> -->
        <template x-for="category in post.categories">
          <a :href="category.link" class="text-sm" x-text="'&#9737; '+category.name"></a>
        </template>
      </div>

    </div>
  </div>
</div>