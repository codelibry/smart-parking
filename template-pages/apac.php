<?php
/*
 * Template Name: APAC
 */

get_header();

get_template_part('blocks/breadcrumbs');

get_template_part('blocks/centered-hero');

get_template_part('blocks/content', null, [
  'content' => get_field('intro-content_content')
]);

get_template_part('blocks/content-list');

get_template_part('blocks/content', null, [
  'content' => get_field('main-content_content')
]);

get_template_part('blocks/contact-form');

get_template_part('blocks/faq-secondary');

get_footer(); 
