<?php
/*
 * Template Name: ESG
 */

get_header();

get_template_part('blocks/breadcrumbs');
get_template_part('blocks/single-hero');

get_template_part('blocks/content', null, [
  'content' => get_field('intro-content_content')
]);

if (have_rows('content-list-repeater')) :
    while (have_rows('content-list-repeater')) : the_row();

        get_template_part('blocks/content-list-dup', null, [
            'image_lg' => get_sub_field('content-list__image-lg'),
            'image_sm' => get_sub_field('content-list__image-sm'),
            'title' => get_sub_field('content-list__title'),
            'description' => get_sub_field('content-list__description'),
            'subtitle' => get_sub_field('content-list__subtitle'),
            'list' => get_sub_field('content-list__list'),
            'moretext' => get_sub_field('content-list__moretext'),
            'button_1' => get_sub_field('content-list__button-1'),
            'button_2' => get_sub_field('content-list__button-2'),
            'additional_classes' => get_sub_field('content-list__additional-classes')
        ]);

    endwhile;
endif;

get_template_part('blocks/content', null, [
  'content' => get_field('main-content_content')
]);

get_template_part('blocks/faq');

get_footer();
