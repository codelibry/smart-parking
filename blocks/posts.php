<?php

$posts_title = get_field('posts__title');
$posts_button = get_field('posts__button');

$posts_list = get_posts([
  'post_type' => 'latest',
  'post_status' => 'publish',
  'posts_per_page' => 6,
  'order_by' => 'date',
  'order' => 'DESC'
]);

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
