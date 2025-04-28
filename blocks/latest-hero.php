<?php

$title = get_the_title();
$date = get_the_date('d M Y');
$image_url = get_the_post_thumbnail_url();
$tags = get_the_terms(get_the_ID(), 'latest-category');

?>

<div class="relative z2">
    <div class="grid-container">
        <div class="grid-x grid-padding-x hero inner-hero flex align-center">
            <div class="large-6 cell pt-80 pb-80 flex align-center justify-left medium-flex-center">
                <div class="hero-content flex align-left justify-center direction-column medium-center medium-flex-center">
                    <h1 class="dot"><?php echo $title ?></h1>
                    <p class="lead">
                        <?php echo get_the_excerpt() ?>
                    </p>
                    <div class="article-info">
                        <div class="date">
                            <?php echo strtoupper($date); ?>
                        </div>

                        <div class="tags">
                            <?php if ($tags) : ?>
                                <?php foreach ($tags as $tag) : ?>
                                    <span><?php echo $tag->name; ?></span>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="large-6 cell">
                <div class="large-image" style="background-image: url(<?php echo $image_url ?>);"></div>
            </div>
        </div>
    </div>

    <img class="hex1" <?php img_src('hero-hexagons.svg') ?>>
</div>
