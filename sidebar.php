<aside class="w-1/4 bg-white dark:bg-gray-800 p-4 shadow rounded">
  <h2 class="text-lg font-bold mb-4">Sidebar</h2>

  <div class="mb-6">
    <h3 class="text-base font-bold mb-2">Categories</h3>
    <ul class="list-disc list-inside">
      <?php wp_list_categories('title_li='); ?>
    </ul>
  </div>

  <div class="mb-6">
    <h3 class="text-base font-bold mb-2">Tags</h3>
    <?php wp_tag_cloud('smallest=10&largest=10&unit=px&number=10'); ?>
  </div>

  <div>
    <h3 class="text-base font-bold mb-2">Archives</h3>
    <ul class="list-disc list-inside">
      <?php wp_get_archives('type=monthly'); ?>
    </ul>
  </div>
</aside>