<?php
function register_announcement_post_type()
{
  $labels = array(
    'name'               => 'Announcements',
    'singular_name'      => 'Announcement',
    'menu_name'          => 'Announcements',
    'name_admin_bar'     => 'Announcement',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Announcement',
    'new_item'           => 'New Announcement',
    'edit_item'          => 'Edit Announcement',
    'view_item'          => 'View Announcement',
    'all_items'          => 'All Announcements',
    'search_items'       => 'Search Announcements',
    'parent_item_colon'  => 'Parent Announcement:',
    'not_found'          => 'No announcements found.',
    'not_found_in_trash' => 'No announcements found in Trash.',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'announcements'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => ['title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats'],
    'show_in_rest'       => true,
    'taxonomies'         => array('category', 'post_tag'),
    'menu_icon'          => 'dashicons-megaphone',
  );

  register_post_type('announcement', $args);
}
add_action('init', 'register_announcement_post_type');