<?php
/*
 * Template Name: Policy
 */

get_header();

get_template_part('blocks/breadcrumbs');

get_template_part('blocks/centered-hero', null, [
  'title' => get_the_title(),
  'description' => get_field('policy__description'),
  'country_buttons' => get_field('policy__country-buttons'),
  'show_scroller' => true,
]);

if(get_field('policy__show-image')):
  get_template_part('blocks/full-image', null, [
    'image' => [
      'alt' => get_the_title(),
      'title' => get_the_title(),
      'url' => get_the_post_thumbnail_url(),
    ]
  ]);
endif;

get_template_part('blocks/content');

get_template_part('blocks/faq-secondary');

get_footer(); 
