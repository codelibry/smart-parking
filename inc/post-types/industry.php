<?php

function codelibry_industry_post_type() {

  $labels = [
    'name'                  => 'Industry',
    'singular_name'         => 'Industry',
    'menu_name'             => 'Industries',
    'name_admin_bar'        => 'Industries',
    'add_new_item'          => 'Add New Industry',
  ];

  $args = [
    'labels'                => $labels,
    'label'                 => 'Industry',
    'supports'              => ['title'],
    'menu_position'         => 5,
    'public'                => true,
    'has_archive'           => false,
    'menu_icon'             => 'dashicons-admin-site',
    'capability_type'       => 'page',
    'rewrite'               => [
      'slug' => 'industries',
      'with_front' => false
    ]
  ];

  register_post_type('industry', $args);
}

add_action('init', 'codelibry_industry_post_type', 0);
