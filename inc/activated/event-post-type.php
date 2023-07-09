<?php
function register_event_post_type()
{
  $labels = array(
    'name'               => 'Events',
    'singular_name'      => 'Event',
    'menu_name'          => 'Events',
    'name_admin_bar'     => 'Event',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Event',
    'new_item'           => 'New Event',
    'edit_item'          => 'Edit Event',
    'view_item'          => 'View Event',
    'all_items'          => 'All Events',
    'search_items'       => 'Search Events',
    'parent_item_colon'  => 'Parent Event:',
    'not_found'          => 'No events found.',
    'not_found_in_trash' => 'No events found in Trash.',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'events'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => ['title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats'],
    'show_in_rest'       => true,
    'taxonomies'         => array('post_tag'),
    'menu_icon'          => 'dashicons-tickets-alt', 
  );

  register_post_type('event', $args);
}
add_action('init', 'register_event_post_type');
