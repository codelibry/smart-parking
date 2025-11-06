<?php
/*
 * Template Name: Industries
 */

get_header();

get_template_part('blocks/breadcrumbs');

get_template_part('blocks/centered-hero');

if (have_rows('industries-repeater')) :
    while (have_rows('industries-repeater')) : the_row();
        get_template_part('blocks/content-image');
    endwhile;
endif;

get_template_part('blocks/faq-secondary');

get_footer();
