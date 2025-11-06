<?php
/*
 * Template Name: Our System
 */

get_header();

get_template_part('blocks/breadcrumbs');
get_template_part('blocks/centered-hero');
get_template_part('blocks/full-image');

if (have_rows('content-system-repeater')) :
    while (have_rows('content-system-repeater')) : the_row();

        get_template_part('blocks/content-system', null, [
            'image' => get_sub_field('content-system__image'),
            'title' => get_sub_field('content-system__title'),
            'description' => get_sub_field('content-system__description'),
            'systems' => get_sub_field('content-system__systems'),
            'is_content_left' => get_sub_field('content-system__content-left'),
        ]);

    endwhile;
endif;

get_template_part('blocks/testimonial');
get_template_part('blocks/systems');
get_template_part('blocks/related-posts');
get_template_part('blocks/faq-secondary');

get_footer();
