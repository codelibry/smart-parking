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
 * Custom favicon
 * =================================================================
 */
function my_custom_favicon() {
    echo '<link rel="icon" href="' . get_img_src('favicon/favicon.ico') .'" type="image/x-icon">';
}
add_action( 'wp_head', 'my_custom_favicon' );


/**
 * =================================================================
 * Rewrite 'latest' CPT url
 * =================================================================
 */
function custom_latest_rewrite_rules() {
    $langs = [
        'uk' => 'latest',
        'ua' => 'latest',
        'au' => 'latest',
        'nz' => 'latest',
        'dk' => 'senest',
        'de' => 'news-und-fallstudien',
        'ch-de' => 'news-und-fallstudien',
        'ch-it' => 'news-e-casi-di-studio',
        'ch-fr' => 'actualites',
    ];

    foreach ($langs as $code => $base) {
        add_rewrite_rule(
            "^{$base}/([0-9]{4})/([a-zA-Z]+)/([^/]+)/?$",
            'index.php?post_type=latest&name=$matches[3]',
            'top'
        );
    }
}
add_action('init', 'custom_latest_rewrite_rules');

function custom_latest_post_permalink($permalink, $post) {
    $langs = [
        'uk' => 'latest',
        'ua' => 'latest',
        'au' => 'latest',
        'nz' => 'latest',
        'dk' => 'senest',
        'de' => 'news-und-fallstudien',
        'ch-de' => 'news-und-fallstudien',
        'ch-it' => 'news-e-casi-di-studio',
        'ch-fr' => 'actualites',
    ];

    if ($post->post_type === 'latest') {
        $language = apply_filters('wpml_current_language', null) ?: 'uk'; // Fallback to 'uk' if no language
        $base = isset($langs[$language]) ? $langs[$language] : $langs['uk'];
        $year = get_the_date('Y', $post);
		
        do_action('wpml_switch_language', 'uk');
        $month = strtolower(get_the_date('F', $post));
        do_action('wpml_switch_language', $language);
		
        $title = $post->post_name;

        $permalink = home_url("/{$base}/{$year}/{$month}/{$title}/");
    }

    return $permalink;
}
add_filter('post_type_link', 'custom_latest_post_permalink', 10, 2);


/**
 * =================================================================
 * Rewrite 'career' CPT url
 * =================================================================
 */
function custom_career_rewrite_rules() {
    $langs = [
        'uk' => 'careers',
        'ua' => 'careers',
        'au' => 'careers',
        'nz' => 'careers',
        'dk' => 'karriere',
        'de' => 'karriere',
        'ch-de' => 'karriere',
        'ch-it' => 'carriera',
        'ch-fr' => 'carriere',
    ];

    foreach ($langs as $code => $base) {
        add_rewrite_rule(
            "^{$base}/([^/]+)/?$",
            'index.php?post_type=career&name=$matches[1]',
            'top'
        );
    }
}
add_action('init', 'custom_career_rewrite_rules');

function custom_career_post_permalink($permalink, $post) {
    $langs = [
        'uk' => 'careers',
        'ua' => 'careers',
        'au' => 'careers',
        'nz' => 'careers',
        'dk' => 'karriere',
        'de' => 'karriere',
        'ch-de' => 'karriere',
        'ch-it' => 'carriera',
        'ch-fr' => 'carriere',
    ];

    if ($post->post_type === 'career') {
        $language = apply_filters('wpml_current_language', null) ?: 'uk'; // Fallback to 'uk' if no language
        $base = isset($langs[$language]) ? $langs[$language] : $langs['uk'];
        $title = $post->post_name;

        $permalink = home_url("/{$base}/{$title}/");
    }

    return $permalink;
}
add_filter('post_type_link', 'custom_career_post_permalink', 10, 2);


/**
 * =================================================================
 * get the excerpt only if it exists
 * =================================================================
 */
add_filter('get_the_excerpt', function ($excerpt, $post) {
    if (empty($post->post_excerpt)) {
        return '';
    }
    return $excerpt;
}, 10, 2);


/**
 * =================================================================
 * Force robots.txt point at the specific sitemap.xml
 * =================================================================
 */
add_filter('robots_txt', function($output, $public) {

    // Remove everything after the last "Disallow:" line
    $lines = explode("\n", $output);
    $new_output = array();
    
    foreach ($lines as $line) {
        // Skip any sitemap lines
        if (stripos($line, 'Sitemap:') === false) {
            $new_output[] = $line;
        }
    }

    $sitemap = "https://www.smartparking.com/sitemap_index.xml";
    
    // Add our single sitemap
    $result = implode("\n", $new_output);
    $result = rtrim($result) . "\n\nSitemap: $sitemap\n";
    
    return $result;

}, PHP_INT_MAX, 2);


/**
 * =================================================================
 * Fix 'latest' post-type sitemap
 * =================================================================
 */
function custom_yoast_sitemap_entry($url, $type, $post) {
    if ($type === 'post' && $post->post_type === 'latest') {
        $langs = [
            'uk' => 'latest',
            'ua' => 'latest',
            'au' => 'latest',
            'nz' => 'latest',
            'dk' => 'senest',
            'de' => 'news-und-fallstudien',
            'ch-de' => 'news-und-fallstudien',
            'ch-it' => 'news-e-casi-di-studio',
            'ch-fr' => 'actualites',
        ];

        // Get the post's language
        $language_info = wpml_get_language_information(null, $post->ID);
        $language = !empty($language_info['language_code']) ? $language_info['language_code'] : 'uk';

        // Get the base slug
        $base = isset($langs[$language]) ? $langs[$language] : $langs['uk'];

        do_action('wpml_switch_language', 'uk');
        $month = strtolower(get_the_date('F', $post));
        do_action('wpml_switch_language', 'uk');

        $year = get_the_date('Y', $post);
        $title = $post->post_name;

        $site_url = get_site_url();

        // Update the sitemap URL
        $url['loc'] = "{$site_url}/{$language}/{$base}/{$year}/{$month}/{$title}/";
    }

    return $url;
}
add_filter('wpseo_sitemap_entry', 'custom_yoast_sitemap_entry', 10, 3);


/**
 * =================================================================
 * Filter out /en pages
 * =================================================================
 */
add_filter('wpseo_sitemap_entry', function($url) {
    // Remove all /en/ URLs
    if (strpos($url['loc'], '/en/') !== false) {
        return false; // this removes it from the sitemap
    }
    return $url;
});
