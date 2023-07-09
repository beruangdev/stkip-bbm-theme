<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
  <label for="search-input" class="hidden"><?php echo _x('Search for:', 'label', 'textdomain'); ?></label>
  <div class="relative flex items-center">
    <input type="search" id="search-input" class="search-input form-input rounded-full px-4 py-2 text-gray-800 dark:text-white bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'textdomain'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit" class="search-submit ml-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
      <span class="hidden"><?php echo _x('Search', 'submit button', 'textdomain'); ?></span>
      <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M12.707 11.293a1 1 0 010 1.414l-2 2a1 1 0 01-1.414-1.414l2-2a1 1 0 011.414 0zm-4.66-3.768a5 5 0 116.363 6.364l4.472 4.472a1 1 0 01-1.414 1.414l-4.472-4.472a5 5 0 11-6.363-6.364zm-2.828 2.828a7 7 0 109.9 9.9l-1.414-1.414a1 1 0 01-1.414 1.414l1.414 1.414a7 7 0 00-9.9-9.9z" clip-rule="evenodd" />
      </svg>
    </button>
  </div>
</form>