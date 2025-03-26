<?php

/*
==============================
    Add Styles And Scripts
==============================
*/


function codelibry_enqueue () {

  $CSS = get_template_directory_uri() . '/css';


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


  /* JavaScript */


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
