<?php

function codelibry_career_post_type() {

  $labels = [
    'name'                  => 'Career',
    'singular_name'         => 'Career',
    'menu_name'             => 'Careers',
    'name_admin_bar'        => 'Careers',
    'add_new_item'          => 'Add New Career',
  ];

  $args = [
    'labels'                => $labels,
    'label'                 => 'Careers',
    'supports'              => ['title', 'editor', 'thumbnail', 'excerpt'],
    'menu_position'         => 5,
    'public'                => true,
    'has_archive'           => false,
    'menu_icon'             => 'dashicons-admin-site',
    'capability_type'       => 'page',
  ];

  register_post_type('career', $args);
}

add_action('init', 'codelibry_career_post_type', 0);
