<?php
function register_event_taxonomy()
{
  $labels = array(
    'name'                       => 'Event Categories',
    'singular_name'              => 'Event Category',
    'search_items'               => 'Search Event Categories',
    'all_items'                  => 'All Event Categories',
    'parent_item'                => 'Parent Event Category',
    'parent_item_colon'          => 'Parent Event Category:',
    'edit_item'                  => 'Edit Event Category',
    'update_item'                => 'Update Event Category',
    'add_new_item'               => 'Add New Event Category',
    'new_item_name'              => 'New Event Category Name',
    'menu_name'                  => 'Event Categories',
    'not_found'                  => 'No event categories found.',
    'no_terms'                   => 'No event categories',
    'items_list_navigation'      => 'Event categories list navigation',
    'items_list'                 => 'Event categories list',
    'most_used'                  => 'Most Used',
    'back_to_items'              => '← Back to Event Categories',
    'menu_name'                  => 'Event Categories',
  );

  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'query_var'                  => true,
    'rewrite'                    => array('slug' => 'event-category'),
    'show_in_rest'               => true,
  );

  register_taxonomy('event_category', 'event', $args);
}
add_action('init', 'register_event_taxonomy', 0);
