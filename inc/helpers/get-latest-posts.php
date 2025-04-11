<?php

function get_latest_posts($post_type = 'post', $count = 3) {
    return get_posts([
      'post_type' => $post_type,
      'post_status' => 'publish',
      'posts_per_page' => $count,
      'order_by' => 'date',
      'order' => 'DESC',
      'suppress_filters' => false
  ]);
}
