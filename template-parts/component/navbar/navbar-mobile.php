<?php
function get_menu_items_recursive($menu_items, $parent_id = 0)
{
  $menu_array = array();

  foreach ($menu_items as $menu_item) {
    if ($menu_item->menu_item_parent == $parent_id) {
      $children = get_menu_items_recursive($menu_items, $menu_item->ID);

      $menu_array[] = array(
        'ID' => $menu_item->ID,
        'title' => $menu_item->title,
        'url' => $menu_item->url,
        'children' => $children,
      );
    }
  }

  return $menu_array;
}

$menu_name = 'Primary Menu'; // Ganti dengan nama menu yang ingin Anda ambil
$menu_items = wp_get_nav_menu_items($menu_name);
$menus = get_menu_items_recursive($menu_items);
?>


<nav class="top-navbar fixed w-full z-20 top-0 left-0" x-data="{ show :  false }" x-cloak>
  <div class="max-w-screen-xl flex flex-wrap items-center mx-auto px-2">
    <button data-collapse-toggle="navbar-default" type="button" class="mr-1 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false" x-data @click="show = !show">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>

    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center logo">
      <?php
      $custom_logo_id = get_theme_mod('custom_logo');
      $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
      ?>
      <?php if (has_custom_logo()) : ?>
        <img src="<?= esc_url($logo_image[0]) ?>" class="h-10 w-auto mr-3" alt="<?= get_bloginfo('name') ?>">
      <?php else : ?>
        <img src="<?= esc_url(get_template_directory_uri()) ?>/images/logo.svg" alt="<?= get_bloginfo('name') ?>" class="h-8 mr-3">
      <?php endif; ?>
    </a>


    <select id="language" class="order-2 ml-auto md:ml-3 skiptranslate bg-background-50 border border-background-300 text-background-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-background-900 dark:border-background-600 dark:placeholder-background-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 max-w-[5.5rem]">
      <option value="id" selected>IDN</option>
      <option value="en">ENG</option>
      <option value="ar">ARB</option>
      <option value="fr">FRA</option>
      <option value="de">GER</option>
    </select>

    <button type="button" class="order-3 theme-toggle ml-2 text-white hover:bg-primary-950 w-11 rounded-md aspect-square flex items-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="dark:hidden w-5 h-5 -m-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
      </svg>

      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden dark:inline w-5 h-5 -m-1">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
      </svg>
    </button>


  </div>


  <div x-data x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="show = false" class="bg-black/30 backdrop-blur-sm w-full h-full fixed inset-0 z-[-1]" x-cloak></div>

  <aside class="fixed inset-0 z-[-1] w-80" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-x-full" x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 -translate-x-full" x-cloak>

    <div class="mt-20 pl-6 pt-6 pr-4 rounded-tr-lg  h-full bg-background-100 dark:bg-background-925 overflow-y-auto">
      <div class="text-lg text-medium divide-y-[3px] divide-background-100 dark:divide-background-600 flex flex-col">
        <?php foreach ($menus as $index => $menu) : ?>
          <?php if (count($menu['children']) === 0) : ?>
            <a href="<?= $menu['url'] ?>" class="py-2 px-2"><?= $menu['title'] ?></a>
          <?php else : ?>
            <div x-data="{
              show: false
              }" class="py-2 px-2">
              <button class="flex items-center justify-between w-full" @click="show = !show">
                <?= $menu['title'] ?>
                <svg class="w-2.5 h-2.5 ml-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
              </button>

              <div x-data x-cloak x-show="show" class="flex flex-col dropdown-border">
                <?php foreach ($menu["children"] as $child) : ?>
                  <?php if (count($child["children"]) === 0) : ?>
                    <a href="<?= $child['url'] ?>" class="py-1 pl-4 pr-2"><?= $child['title'] ?></a>

                  <?php else : ?>

                    <div x-data="{
              show: false
              }" class="py-1 pl-4">
                      <button class="flex items-center justify-between w-full" @click="show = !show">
                        <?= $child['title'] ?>
                        <svg class="w-2.5 h-2.5 ml-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                      </button>

                      <div x-data x-cloak x-show="show" class="flex flex-col dropdown-border">
                        <?php foreach ($child["children"] as $gc) : ?>
                          <a href="<?= $gc["url"] ?>" class="py-1 pl-4 pr-2"><?= $gc['title'] ?></a>
                        <?php endforeach; ?>
                      </div>
                    </div>

                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </aside>
</nav>