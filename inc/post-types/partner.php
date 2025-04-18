<?php

function codelibry_partner_post_type() {

  $labels = [
    'name'                  => 'Partner',
    'singular_name'         => 'Partner',
    'menu_name'             => 'Partners',
    'name_admin_bar'        => 'Partners',
    'add_new_item'          => 'Add New Partner',
  ];

  $args = [
    'labels'                => $labels,
    'label'                 => 'Partner',
    'supports'              => ['title'],
    'menu_position'         => 5,
    'public'                => true,
    'has_archive'           => false,
    'menu_icon'             => 'dashicons-admin-site',
    'capability_type'       => 'page',
  ];

  register_post_type('partner', $args);
}

add_action('init', 'codelibry_partner_post_type', 0);
