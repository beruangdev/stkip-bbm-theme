<?php
function edit_custom_post_type_asdqwqfw()
{
  $obj = get_post_type_object('post');
  $obj->rewrite['slug'] = 'articles';
  $obj->has_archive = true;
  register_post_type('post', $obj);
}
add_action('init', 'edit_custom_post_type_asdqwqfw', 0);

// function flush_rewrite_rules_on_post_type_registration()
// {
//   custom_post_type();
//   flush_rewrite_rules();
// }
// add_action('after_switch_theme', 'flush_rewrite_rules_on_post_type_registration');
