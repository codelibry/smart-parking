<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width initial-scale=1">
  <?php 
    wp_head();

    echo get_field('header_scripts', 'option'); 
  ?>
</head>
<body <?php body_class(); ?>>

<?php 

  echo get_field('body_scripts_top', 'option');

  function_exists('wp_body_open') ? wp_body_open() : do_action( 'wp_body_open' ); 

  get_template_part('template-parts/header/header');
  get_template_part('template-parts/header/mobile-menu');

?>
