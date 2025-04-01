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
get_template_part('blocks/testimonial');

get_footer();
