<?php

$title = get_the_title();
$image_url = get_the_post_thumbnail_url();

$post_url   = urlencode(get_permalink());
$post_title = urlencode(get_the_title());

?>

<div class="relative z2 | career-hero">
    <div class="grid-container">
        <div class="grid-x grid-padding-x hero inner-hero flex align-center">
            <div class="large-6 cell pt-80 pb-80 flex align-center justify-left medium-flex-center">
                <div class="hero-content flex align-left justify-center direction-column medium-center medium-flex-center">
                    <h1><?php echo $title ?></h1>
                    <p class="lead">
                      <?php echo get_the_excerpt() ?>
                    </p>
                </div>
            </div>

            <div class="large-6 cell">
                <div class="large-image" style="background-image: url(<?php echo $image_url ?>);"></div>
            </div>
        </div>
    </div>

    <img class="hex1" <?php img_src('hero-hexagons.svg') ?>>
</div>
