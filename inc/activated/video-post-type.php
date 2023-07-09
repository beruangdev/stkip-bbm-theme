<?php

function register_video_post_type()
{
  $labels = array(
    'name'               => 'Videos',
    'singular_name'      => 'Video',
    'menu_name'          => 'Videos',
    'name_admin_bar'     => 'Video',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Video',
    'new_item'           => 'New Video',
    'edit_item'          => 'Edit Video',
    'view_item'          => 'View Video',
    'all_items'          => 'All Videos',
    'search_items'       => 'Search Videos',
    'parent_item_colon'  => 'Parent Video:',
    'not_found'          => 'No videos found.',
    'not_found_in_trash' => 'No videos found in Trash.',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'videos'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-format-video',
    'supports'           => ['title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats'],
    'show_in_rest'       => true,
    'taxonomies'         => array('category', 'post_tag'),
  );

  register_post_type('video', $args);
}
add_action('init', 'register_video_post_type');
