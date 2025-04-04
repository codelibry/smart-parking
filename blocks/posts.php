<?php

$posts_title = get_field('posts__title');
$posts_button = get_field('posts__button');

$posts_list = get_latest_posts(
  $post_type = 'latest', 
  $count = 6 
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

                <?php if ($posts_button) : ?>
                    <a <?php acf_link_attrs($posts_button); ?> class="button">
                        <?php echo $posts_button['title'] ?>
                    </a>
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
