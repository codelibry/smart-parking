<?php
/*
 * Default Page Template
 */
?>

<?php get_header(); ?>

<?php
  if (have_rows('content__page')) :
    while (have_rows('content__page')) : the_row();
      get_template_part('blocks/' . get_row_layout());
    endwhile;
  endif;
?>

<?php get_footer(); ?>
