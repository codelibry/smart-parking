<?php

get_header();

get_template_part('blocks/breadcrumbs', null, [
    'links' => [
        [
            'title' => __('Industries', 'spt'),
            'url' => get_permalink(298)
        ]
    ]
]);

get_template_part('blocks/single-hero');
get_template_part('blocks/full-image');
get_template_part('blocks/content-list');
get_template_part('blocks/cta-bar');

get_template_part('blocks/content-list', null, [
  'image_lg' => get_field('secondary-content-list_content-list__image-lg'),
  'image_sm' => get_field('secondary-content-list_content-list__image-sm'),
  'title' => get_field('secondary-content-list_content-list__title'),
  'description' => get_field('secondary-content-list_content-list__description'),
  'subtitle' => get_field('secondary-content-list_content-list__subtitle'),
  'list' => get_field('secondary-content-list_content-list__list'),
  'moretext' => get_field('secondary-content-list_content-list__moretext'),
  'button_1' => get_field('secondary-content-list_content-list__button-1'),
  'button_2' => get_field('secondary-content-list_content-list__button-2'),
  'additional_classes' => get_field('secondary-content-list_content-list__additional-classes'),
  'is_content_left' => get_field('secondary-content-list_content-list__is-content-left'),
]);

get_template_part('blocks/systems');

if (have_rows('testimonials-repeater')) :
    while (have_rows('testimonials-repeater')) : the_row();

        get_template_part('blocks/testimonial', null, [
            'image' => get_sub_field('testimonial__image'),
            'quote' => get_sub_field('testimonial__quote'),
            'position' => get_sub_field('testimonial__position'),
            'company' => get_sub_field('testimonial__company'),
            'additional_classes' => get_sub_field('testimonial__additional-classes'),
        ]);

    endwhile;
endif;

get_template_part('blocks/related-posts');

get_footer();
