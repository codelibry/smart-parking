<?php

function codelibry_system_post_type() {

  $labels = [
    'name'                  => 'System',
    'singular_name'         => 'System',
    'menu_name'             => 'Systems',
    'name_admin_bar'        => 'Systems',
    'add_new_item'          => 'Add New System',
  ];

  $args = [
    'labels'                => $labels,
    'label'                 => 'System',
    'supports'              => ['title'],
    'menu_position'         => 5,
    'public'                => true,
    'has_archive'           => false,
    'menu_icon'             => 'dashicons-admin-site-alt',
    'capability_type'       => 'page',
    'rewrite'               => [
      'slug' => 'our-system',
      'with_front' => false
    ]
  ];

  register_post_type('system', $args);
}

add_action('init', 'codelibry_system_post_type', 0);
