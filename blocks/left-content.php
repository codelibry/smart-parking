<?php

$title = get_field('left-content__title');
$description = get_field('left-content__description');

$image_1 = get_field('left-content__image-1');
$image_2 = get_field('left-content__image-2');

$button_1 = get_field('left-content__button-1');
$button_2 = get_field('left-content__button-2');

?>

<div class="pt-100 pb-100 left-content-block">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="xxlarge-5 xxlarge-offset-1 xlarge-6 xlarge-offset-0 large-6 large-offset-0 medium-10 medium-offset-1 cell flex align-center space-between">
                <div>
                    <?php if($title): ?>
                        <h2><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>

                    <?php if($description): ?>
                        <p><?php echo esc_html($description); ?></p>
                    <?php endif; ?>

                    <div class="button-group">
                        <?php if ($button_1) : ?>
                            <a <?php acf_link_attrs($button_1); ?> class="button">
                                <?php echo $button_1['title'] ?>
                            </a>
                        <?php endif; ?>

                        <?php if ($button_2) : ?>
                            <a <?php acf_link_attrs($button_2); ?> class="button black hollow">
                                <?php echo $button_2['title'] ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="large-6 large-offset-0 medium-8 medium-offset-2 cell relative">
                <img class="graphic" <?php img_src('hexagon-hollow.svg'); ?> alt="">

                <?php if ($image_1) : ?>
                    <div class="large-image" style="background-image: url('<?php echo esc_url($image_1) ?>');"></div>
                <?php endif; ?>

                <?php if ($image_2) : ?>
                    <div class="shadow">
                        <div class="small-image" style="background-image: url('<?php echo esc_url($image_2) ?>');"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
