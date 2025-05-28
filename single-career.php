<?php

get_header();

get_template_part('blocks/breadcrumbs', null, [
    'links' => [
        [
            'title' => __('Careers', 'spt'),
            'url' => get_permalink(9250)
        ]
    ]
]);

get_template_part('blocks/career-hero');

get_template_part('blocks/content-career');

get_template_part('blocks/contact-form', null, [
  'title' => __('Apply for this role', 'spt'),
  'form_id' => '050616e'
]);

get_footer();
