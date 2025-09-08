<?php

function get_latest_posts($post_type = 'latest', $count = 3) {

    // First: sticky posts
    $sticky = get_posts([
        'post_type'      => $post_type,
        'post_status'    => 'publish',
        'posts_per_page' => $count,
        'meta_key'       => 'sticky_post',
        'meta_value'     => '1',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'suppress_filters' => false,
    ]);

    // If we need more, fetch normal posts
    if (count($sticky) < $count) {
        $exclude_ids = wp_list_pluck($sticky, 'ID');
        $normal = get_posts([
            'post_type'      => $post_type,
            'post_status'    => 'publish',
            'posts_per_page' => $count - count($sticky),
            'post__not_in'   => $exclude_ids,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'suppress_filters' => false,
        ]);
        $sticky = array_merge($sticky, $normal);
    }

    return $sticky;
}
