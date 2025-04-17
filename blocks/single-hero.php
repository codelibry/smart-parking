<?php

$icon = get_field('single-hero__icon');
$title = get_field('single-hero__title');
$description = get_field('single-hero__description');
$button_1 = get_field('single-hero__button-1');
$button_2 = get_field('single-hero__button-2');
$button_3 = get_field('single-hero__button-3');

if(!$title) {
  return;
}

?>

<div class="relative z2">
    <div class="grid-container">
        <div class="grid-x grid-padding-x hero inner-hero flex align-center">
            <div class="large-6 large-offset-1 cell pt-80 pb-80 flex align-center justify-left medium-flex-center">

                <div class="hero-content flex align-left justify-center direction-column medium-center medium-flex-center">
                    <?php if($title): ?>
                        <h1 class="dot"><?php echo $title ?></h1>
                    <?php endif; ?>

                    <?php if($description): ?>
                        <p class="lead"><?php echo $description ?></p>
                    <?php endif; ?>

                    <div class="button-group">
                        <?php if($button_1): ?>
                            <a class="button" <?php acf_link_attrs($button_1) ?>>
                                <?php echo $button_1['title'] ?>
                            </a>                       
                        <?php endif; ?>

                        <?php if($button_2): ?>
                            <a class="button black hollow" <?php acf_link_attrs($button_2) ?>>
                                <?php echo $button_2['title'] ?>
                            </a>
                        <?php endif; ?>

                        <?php if($button_3): ?>
                            <a class="play-button mt-0 m-auto" <?php acf_link_attrs($button_3) ?>>
                                <span><img <?php img_src('play.svg') ?>></span>
                                <?php echo $button_3['title'] ?>
                            </a>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="scroller"><div class="dot-flashing"></div></div>
            </div>

            <?php if($icon): ?>
                <div class="large-4 large-offset-1 icon cell">
                    <img <?php acf_image_attrs($icon) ?>>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <img class="hex1" <?php img_src('hero-hexagons.svg') ?>>
</div>
