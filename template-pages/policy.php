<?php
/*
 * Template Name: Policy
 */

get_header();

get_template_part('blocks/breadcrumbs');

get_template_part('blocks/centered-hero', null, [
  'title' => get_the_title(),
  'description' => get_field('policy__description')
]);

get_template_part('blocks/full-image', null, [
  'image' => [
    'alt' => get_the_title(),
    'title' => get_the_title(),
    'url' => get_the_post_thumbnail_url(),
  ]
]);

get_template_part('blocks/content');

get_footer(); 
