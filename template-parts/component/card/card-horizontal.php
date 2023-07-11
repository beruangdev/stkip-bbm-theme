<div class="flex gap-3 relative hover:scale-[1.02] hover:translate-y-[-0.5rem] duration-300">
  <?php if (is_user_logged_in() && current_user_can('edit_post', get_the_ID())) : ?>
    <div class="p-2 bg-primary-600 border-2 border-white rounded-full absolute left-0 top-0 -translate-x-1/2 -translate-y-1/2">
      <a href="<?= esc_url(get_edit_post_link(get_the_ID())) ?>">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-white">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
        </svg>
      </a>
    </div>
  <?php endif; ?>

  <div class="post-thumbnail">
    <a href="<?= esc_url(get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
      <?php if (has_post_thumbnail()) : ?>
        <?= get_the_post_thumbnail(get_the_ID(), 'medium', ['class' => 'rounded-lg w-28 md:w-40 aspect-[16/12] object-cover object-center']); ?>
      <?php else : ?>
        <img src="https://via.placeholder.com/150" class="rounded-lg w-28 md:w-40 aspect-[16/12] object-cover object-center" alt="Placeholder Image">
      <?php endif; ?>
    </a>
  </div>
  <div class="flex-1 flex flex-col justify-between">
    <div>
      <?php if (has_category()) : ?>
        <div class="flex gap-2 items-center">
          <?php $categories = get_the_category(); ?>
          <?php foreach ($categories as $key => $category) : ?>
            <?php if ($key + 1 <= 3) : ?>
              <a href="<?= esc_url(get_category_link($category->term_id)); ?>" class="text-sm" title="<?= esc_html($category->name); ?>"><?= esc_html($category->name); ?></a>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <a href="<?= esc_url(get_permalink()); ?>" class="no-underline" title="<?php the_title_attribute(); ?>">
        <h6 class="mb-2"><?= get_the_title(); ?></h6>
      </a>
    </div>
    <div class="text-sm text-gray-500 dark:text-gray-400 flex flex-wrap gap-2">
      <span class="flex items-center gap-0.5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
        </svg>
        <?= get_the_author(); ?>
      </span>

      <span class="flex items-center gap-0.5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <p><?= human_time_diff(get_the_time('U'), current_time('timestamp')); ?></p>
      </span>
      <?php if (has_tag()) : ?>
        <?php
        $tags = get_the_tags();
        if ($tags) {
          $tag_count = count($tags);
          $max_tags = 3;
          $tags = array_slice($tags, 0, $max_tags);
        }
        ?>
        <div>
          #
          <?php foreach ($tags as $tag) : ?>
            <a href="<?= get_tag_link($tag->term_id); ?>"> <?= $tag->name; ?></a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>