<?php

/*
 * Ajax Handler
 */
function handle_posts_ajax_request() {
  get_filtered_posts();
  wp_die();
}
add_action('wp_ajax_get_filtered_posts', 'handle_posts_ajax_request');
add_action('wp_ajax_nopriv_get_filtered_posts', 'handle_posts_ajax_request');


/*
 * Add Active Class For Selected Filter
 */
function active($query_value, $filter_value) {
  echo $query_value == $filter_value ? 'selected' : 'hollow';
}


/*
 * Get Filtered Posts
 */
function get_filtered_posts(){
  $posts_per_page = 9;
  $category = isset($_GET['c']) ? $_GET['c'] : '';
  $page = isset($_GET['pageIndex']) ? (int)$_GET['pageIndex'] : 1;

  $tax_query = ['relation' => 'AND'];

  if (!empty($category)) {
    $tax_query[] = [
      'taxonomy' => 'latest-category',
      'field'    => 'slug',
      'terms'    => $category,
    ];
  }

  $all_sticky_post_ids = get_posts([
    'post_type'      => 'latest',
    'posts_per_page' => -1,
    'fields'         => 'ids',
    'meta_query'     => [
        [
            'key'     => 'sticky_post',
            'value'   => '1',
            'compare' => '=',
        ]
    ],
  ]);

  // Sticky posts first
  $sticky_args = [
    'post_type'      => 'latest',
    'post_status'    => 'publish',
    'posts_per_page' => $posts_per_page,
    'tax_query'      => $tax_query,
    'meta_key'       => 'sticky_post',
    'meta_value'     => '1',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'paged'          => $page,
  ];
  $sticky_query = new WP_Query($sticky_args);

  $sticky_posts = $sticky_query->posts;

  // If sticky < per_page, fill with others
  $remaining = $posts_per_page - count($sticky_posts);
  $normal_posts = [];

  if ($remaining > 0) {
    $normal_args = [
      'post_type'      => 'latest',
      'post_status'    => 'publish',
      'posts_per_page' => $remaining,
      'tax_query'      => $tax_query,
      'post__not_in'   => $all_sticky_post_ids,
      'orderby'        => 'date',
      'order'          => 'DESC',
      'paged'          => $page,
    ];
    $normal_query = new WP_Query($normal_args);
    $normal_posts = $normal_query->posts;
  }

  // Merge sticky + normal
  $posts = array_merge($sticky_posts, $normal_posts);

  // Calculate pagination (approximate, since sticky + normal combined)
  $total_posts = $sticky_query->found_posts + (isset($normal_query) ? $normal_query->found_posts : 0);
  $max_pages = ceil($total_posts / $posts_per_page);

  // Get Filters
  $tags = get_terms([
    'taxonomy' => 'latest-category'
  ]);
  ?>

  <div class="xxlarge-12 mb-100 filters flex align-center justify-center cell">
      <a href="#" class="button | js-filter <?php active($category, '') ?>" data-c="">
          <?php _e('All', 'spt') ?>
      </a>

      <?php foreach ($tags as $tag): ?>
          <a href="#" class="button | js-filter <?php active($category, $tag->slug) ?>" data-c="<?php echo $tag->slug ?>">
              <?php echo $tag->name ?>
          </a>
      <?php endforeach; ?>
  </div>

  <div class="xxlarge-12 cell">
      <div class="article-grid">
          <div class="column">
              <?php 
              if (!empty($posts)) {
                  foreach ($posts as $post) {
                      setup_postdata($post);

                      get_template_part('template-parts/components/post-card', null, [
                          'link'   => get_permalink($post->ID),
                          'title'  => get_the_title($post->ID),
                          'date'   => get_the_date('d M Y', $post->ID),
                          'image'  => get_the_post_thumbnail_url($post->ID),
                          'tags'   => get_the_terms($post->ID, 'latest-category'),
                          'summary'=> get_the_excerpt($post->ID),
                          'is_sticky' => get_field('sticky_post', $post->ID),
                      ]);
                  }
                  wp_reset_postdata();
              }
              ?>
          </div>

          <?php if($max_pages > 1): ?>
              <div class="grid-x grid-padding-x filters paging pt-50 pb-50">
                  <div class="large-12 cell flex align-center justify-center | paginate-links">
                      <?php
                          echo paginate_links([
                            'current' => $page,
                            'total'   => $max_pages,
                            'base'    => site_url() . '/latest' . '%_%',
                            'format'  => '?pageIndex=%#%',
                            'prev_next' => false
                          ]);
                      ?>
                  </div>
              </div>
          <?php endif; ?>
      </div>
  </div>

  <?php
}
