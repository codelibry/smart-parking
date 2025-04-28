<?php

$post_id = get_field('featured-post__id');

$post_url = get_permalink($post_id);
$post_title = get_the_title($post_id);
$post_date = get_the_date('d M Y', $post_id);
$post_img_url = get_the_post_thumbnail_url($post_id);
$post_categories = get_the_terms($post_id, 'latest-category');

?>

<div class="relative z1 full-image-block half-light-blue">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">

            <div class="small-12 cell">
                <div class="main-article" style="background-image:url(<?php echo esc_url($post_img_url) ?>);">
                    <article>
                        <a href="<?php echo esc_url($post_url) ?>">
                            <h2><?php echo esc_html($post_title) ?></h2>
                            <p><?php echo esc_html(get_the_excerpt($post_id)) ?></p>
                        </a>
                        <div class="article-info mb-30">
                            <div class="date"><?php echo esc_html(strtoupper($post_date)) ?></div>
                            <div class="tags">
                                <?php foreach ($post_categories as $category): ?>
                                    <span><?php echo esc_html($category->name) ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <a href="<?php echo esc_url($post_url) ?>" class="button">
                            <?php _e('Read Article', 'spt') ?>
                        </a>
                    </article>
                </div>

            </div>

        </div>
    </div>
</div>
