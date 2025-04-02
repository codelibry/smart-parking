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
get_template_part('blocks/systems');

if (have_rows('testimonials-repeater')) :
    while (have_rows('testimonials-repeater')) : the_row();

        get_template_part('blocks/testimonial', null, [
            'image' => get_sub_field('testimonial__image'),
            'quote' => get_sub_field('testimonial__quote'),
            'position' => get_sub_field('testimonial__position'),
            'company' => get_sub_field('testimonial__company'),
        ]);

    endwhile;
endif;

get_template_part('blocks/related-posts');

get_footer();
