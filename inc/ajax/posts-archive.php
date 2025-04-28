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
  $page = isset($_GET['pageIndex']) ? $_GET['pageIndex'] : 1;

  $tax_query = array('relation' => 'AND');

  if (!empty($category)) {
    $tax_query[] = [
      'taxonomy' => 'latest-category',
      'field'    => 'slug',
      'terms'    => $category,
    ];
  }

  $args = [
    'post_type' => 'latest',
    'post_status' => 'publish',
    'posts_per_page' => $posts_per_page,
    'tax_query' => $tax_query,
    'paged' => (int) $page,
  ];

  $query = new WP_Query($args);

  $max_pages = ceil($query->found_posts / $posts_per_page);

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
              <?php if ($query->have_posts()) {
                  while ($query->have_posts()) {
                      $query->the_post();

                      get_template_part('template-parts/components/post-card', null, [
                          'link' => get_permalink(get_the_ID()),
                          'title' => get_the_title(get_the_ID()),
                          'date' => get_the_date('d M Y', get_the_ID()),
                          'image' => get_the_post_thumbnail_url(get_the_ID()),
                          'tags' => get_the_terms(get_the_ID(), 'latest-category'),
                          'summary' => get_the_excerpt(get_the_ID()),
                      ]);
                  }
              }; wp_reset_postdata(); ?>
          </div>

          <?php if($max_pages > 1): ?>
              <div class="grid-x grid-padding-x filters paging pt-50 pb-50">
                  <div class="large-12 cell flex align-center justify-center | paginate-links">
                      <?php
                          echo paginate_links([
                            'current' => $page,
                            'total'   => $max_pages,
                            'base' => site_url() . '/latest' . '%_%',
                            'format' => '?pageIndex=%#%',
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
