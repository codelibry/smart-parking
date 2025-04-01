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

get_footer();
