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
                        <?php foreach ($posts_list as $article) : ?>
                            <?php
                              $article_url = get_permalink($article->ID);
                              $article_title = get_the_title($article->ID);
                              $article_date = get_the_date('d M Y', $article->ID);
                              $article_img_url = get_the_post_thumbnail_url($article->ID);
                              $article_categories = get_the_terms($article->ID, 'latest-category');
                            ?>

                            <article>
                                <a href="<?php echo esc_url($article_url); ?>">
                                    <img src="<?php echo $article_img_url; ?>" alt="">
                                    <h4><?php echo esc_html($article_title); ?></h4>
                                </a>
                                <div class="article-info">
                                    <div class="date"><?php echo esc_html(strtoupper($article_date)); ?></div>
                                    <div class="tags">
                                        <?php if ($article_categories) : ?>
                                            <?php foreach ($article_categories as $cat) : ?>
                                                <span><?php echo esc_html($cat->name); ?></span>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
