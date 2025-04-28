<?php

function codelibry_latest_post_type() {

  $labels = [
    'name'                  => 'Latest',
    'singular_name'         => 'Latest',
    'menu_name'             => 'Latest',
    'name_admin_bar'        => 'Latest',
    'add_new_item'          => 'Add New Latest',
  ];

  $args = [
    'labels'                => $labels,
    'label'                 => 'Latest',
    'supports'              => ['title', 'editor', 'thumbnail', 'excerpt'],
    'menu_position'         => 5,
    'query_var'             => true,
    'public'                => true,
    'has_archive'           => false,
    'menu_icon'             => 'dashicons-admin-site',
    'capability_type'       => 'page',
  ];

  register_post_type('latest', $args);
}

add_action('init', 'codelibry_latest_post_type', 0);
