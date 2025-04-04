<?php

$posts_title = __('Related Case Studies & News', 'spt');

$posts_list = get_latest_posts(
  $post_type = 'latest', 
  $count = 3 
);

?>

<div class="pt-100 pb-100 light-grey news-block">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="xxlarge-12 flex align-center space-between mb-50 cell">
                <?php if ($posts_title) : ?>
                    <h2 class="mb-0">
                        <?php echo esc_html($posts_title); ?>
                    </h2>
                <?php endif; ?>
            </div>

            <div class="xxlarge-12 cell">
                <div class="article-grid">
                    <div class="column">
                        <?php foreach ($posts_list as $post):
                            get_template_part('template-parts/components/post-card', null, [
                                'link' => get_permalink($post->ID),
                                'title' => get_the_title($post->ID),
                                'date' => get_the_date('d M Y', $post->ID),
                                'image' => get_the_post_thumbnail_url($post->ID),
                                'tags' => get_the_terms($post->ID, 'latest-category'),
                            ]);
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
