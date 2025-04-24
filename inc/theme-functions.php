<?php

/*
 * Theme Functions
 */


/*
=====================
  Header nav menu
=====================
*/
function filter_walker_nav_menu_start_el($item_output, $item, $depth, $args) {
  if ((in_array('menu-item-has-children', $item->classes))) {
    return '<div class="menu-item__parent">' . $item_output . '</div>';
  }
  
  return $item_output;
}

add_filter('walker_nav_menu_start_el', 'filter_walker_nav_menu_start_el', 10, 4);


/*
======================
 Move Yoast to bottom
======================
*/
function yoasttobottom() {
  return 'low';
}

add_filter('wpseo_metabox_prio', 'yoasttobottom');


/*
=================================================================
 Remove Gutenberg Block Library CSS from loading on the frontend
=================================================================
*/
function smartwp_remove_wp_block_library_css() {
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');
}

add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css');


/**
 * =================================================================
 * Check if WooCommerce is activated
 * =================================================================
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}


/**
 * =================================================================
 * Rewrite 'latest' CPT url
 * =================================================================
 */
function custom_latest_rewrite_rules() {
    add_rewrite_rule(
        '^latest/([0-9]{4})/([a-z]+)/([^/]+)/?$',
        'index.php?post_type=latest&name=$matches[3]',
        'top'
    );
}
add_action('init', 'custom_latest_rewrite_rules');

function custom_latest_post_link($post_link, $post) {
    if ($post->post_type === 'latest') {
        $current_locale = get_locale();


        $post_type = __('latest', 'spt');
        $year = get_the_date('Y', $post);

        switch_to_locale('en_US');
        $month = strtolower(get_the_date('F', $post));
        switch_to_locale($current_locale);

        return home_url("/$post_type/$year/$month/{$post->post_name}/");
    }
    return $post_link;
}
add_filter('post_type_link', 'custom_latest_post_link', 10, 2);


function my_custom_favicon() {
    echo '<link rel="icon" href="' . get_img_src('favicon/favicon.ico') .'" type="image/x-icon">';
}
add_action( 'wp_head', 'my_custom_favicon' );
