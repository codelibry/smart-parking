<?php

function latest_category_taxonomy() {

	$labels = [
		'name'                  => 'Latest Category',
		'singular_name'         => 'Latest Category',
		'menu_name'             => 'Latest Categories',
		'all_items'             => 'Latest Categories',
	];

	$args = [
		'labels'                => $labels,
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'show_in_nav_menus'     => true,
		'show_tagcloud'         => true,
	];

	register_taxonomy( 'latest-category', ['latest'], $args );
}

add_action( 'init', 'latest_category_taxonomy' );
