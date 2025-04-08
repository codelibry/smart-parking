<?php

get_header();

get_template_part('blocks/breadcrumbs', null, [
    'links' => [
        [
            'title' => __('Latest', 'spt'),
            'url' => get_permalink(460)
        ]
    ]
]);

get_template_part('blocks/latest-hero');

get_template_part('blocks/content-latest');

echo '<div style="max-width:1017px;margin-inline:auto;">';

get_template_part('blocks/full-image', null, [
  'image' => [
    'url' => get_the_post_thumbnail_url(),
    'title' => get_the_title(),
    'alt' => get_the_title(),
  ]
]);

echo '</div>';

get_template_part('blocks/testimonial', null, [
  'additional_classes' => 'pb-100'
]);

get_template_part('blocks/related-posts');

get_footer();
