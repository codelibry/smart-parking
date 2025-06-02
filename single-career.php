<?php

get_header();

get_template_part('blocks/breadcrumbs', null, [
    'links' => [
        [
            'title' => __('Careers', 'spt'),
            'url' => get_permalink(9866)
        ]
    ]
]);

get_template_part('blocks/career-hero');

get_template_part('blocks/content-career');

get_template_part('blocks/contact-form', null, [
  'title' => get_field('single-career__form-title', 'option'),
  'form_id' => get_field('single-career__form-id', 'option')
]);

get_footer();
