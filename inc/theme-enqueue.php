<?php

/*
==============================
    Add Styles And Scripts
==============================
*/


function codelibry_enqueue () {

  $CSS = get_template_directory_uri() . '/css';
  $JS = get_template_directory_uri() . '/js';
  $LIB = get_template_directory_uri() . '/lib';


  /*
   * Fonts CDN
   */
  wp_enqueue_style( 'museo-slab', "https://use.typekit.net/rxl4azz.css", array(), '1.0', 'all' );
  wp_enqueue_style( 'metropolis', "https://fonts.cdnfonts.com/css/metropolis", array(), '1.0', 'all' );


  /*
   * Styles
   */
  wp_enqueue_style( 'app', "{$CSS}/app.css", array(), '1.0', 'all' );
  wp_enqueue_style( 'custom', "{$CSS}/custom.css", array(), '1.0', 'all' );
  wp_enqueue_style( 'additional', "{$CSS}/additional.css", array(), '1.0', 'all' );
  wp_enqueue_style( 'fancybox', "https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css", array(), '1.0', 'all' );


  /* JavaScript */
  wp_enqueue_script('custom-jquery', "$JS/jquery-3.7.1.min.js", array(), '3.7.1', true);
  wp_enqueue_script('what-input', "$JS/what-input.js", array('custom-jquery'), '1.0', true);
  wp_enqueue_script('jquery-validate', "$LIB/jquery-validate/jquery.validate.min.js", array('custom-jquery'), '1.0', true);
  wp_enqueue_script('jquery-validation-unobtrusive', "$LIB/jquery-validation-unobtrusive/jquery.validate.unobtrusive.min.js", array('custom-jquery', 'jquery-validate'), '1.0', true);
  wp_enqueue_script('foundation', "$JS/foundation.js", array('custom-jquery'), '1.0', true);
  wp_enqueue_script('owl-carousel', "$JS/owl.carousel.min.js", array('custom-jquery'), '1.0', true);
  wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/releases/v5.0.8/js/all.js', array(), '5.0.8', true);
  wp_enqueue_script('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', array('jquery'), '3.5.7', true);

  wp_enqueue_script('app', "$JS/app.js", array('custom-jquery', 'foundation'), '1.0', true);
  wp_enqueue_script('main', "$JS/main.js", array('app'), '1.0', true);

  wp_enqueue_script('posts-ajax', "$JS/posts-ajax.js", array('app'), '1.0', true);
  

  /* Passing PHP variables to JavaScript */
  wp_localize_script( 'main', 'codelibry',
    array( 
      'ajax_url' => admin_url( 'admin-ajax.php' ),
      'ajax_nonce' => wp_create_nonce( "secure_nonce_name" ),
      'site_url' => get_site_url(),
      'theme_url' => get_template_directory_uri()
    )
  );

}

add_action('wp_enqueue_scripts', 'codelibry_enqueue');
