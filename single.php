<?php if (wp_is_mobile()) : ?>
  <?= get_template_part("single-mobile") ?>
  <?php else : ?>
    <?= get_template_part("single-desktop") ?>
<?php endif; ?>