<?php

$careers_title = get_field('careers__title');
$careers_button = get_field('careers__button');

$posts_list = get_latest_posts(
  $post_type = 'career', 
  $count = 3 
);

?>

<div class="pt-100 pb-100 light-grey news-block">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="xxlarge-12 flex align-center space-between mb-50 cell">
                <?php if ($careers_title) : ?>
                    <h2 class="mb-0">
                        <?php echo esc_html($careers_title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($careers_button) : ?>
                    <a <?php acf_link_attrs($careers_button); ?> class="button">
                        <?php echo $careers_button['title'] ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="xxlarge-12 cell">
                <div class="article-grid">
                    <div class="column">
                        <?php foreach ($posts_list as $post):
                            get_template_part('template-parts/components/career-card', null, [
                                'link' => get_permalink($post->ID),
                                'title' => get_the_title($post->ID),
                                'image' => get_the_post_thumbnail_url($post->ID),
                                'summary' => get_the_excerpt($post->ID),
                            ]);
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
