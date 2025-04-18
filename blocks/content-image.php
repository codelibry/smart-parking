<?php

$icon = get_sub_field('content-image__icon');
$title = get_sub_field('content-image__title');
$description = get_sub_field('content-image__description');
$button = get_sub_field('content-image__button');
$image = get_sub_field('content-image__image');

$is_left_content = get_sub_field('content-image__left-content');

$section_classes = $is_left_content 
  ? 'pb-100 left-content-block-st' 
  : 'relative z2 pb-100 right-content-block-st';

?>


<?php if($is_left_content): ?> <!-- Left Content Variant -->

    <div class="pb-100 left-content-block-st">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">

                <div class="large-4 large-offset-1 medium-10 medium-offset-1 cell flex align-center space-between">
                    <div>
                        <?php if($icon): ?>
                            <img class="mb-20" <?php acf_image_attrs($icon) ?>>
                        <?php endif; ?>

                        <?php if($title): ?>
                            <h2 style="word-break: break-word"><?php echo $title ?></h2>
                        <?php endif; ?>

                        <?php if($description): ?>
                            <p class="lead"><?php echo $description ?></p>
                        <?php endif; ?>

                        <?php if($button): ?>
                            <div class="button-group">
                                <a class="button" <?php acf_link_attrs($button) ?>>
                                    <?php _e('Learn More', 'spt') ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if($image): ?>
                    <div class="xlarge-6 xlarge-offset-0 large-7 large-offset-0 medium-10 medium-offset-1 cell relative">
                        <img class="main-img" <?php acf_image_attrs($image) ?>>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

<?php else: ?> <!-- Right Content Variant -->

    <div class="relative z2 pb-100 right-content-block-st">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">

                <?php if($image): ?>
                    <div class="xlarge-6 xlarge-offset-1 large-7 large-offset-0 medium-10 medium-offset-1 cell relative">
                        <img class="main-img" <?php acf_image_attrs($image) ?>>
                    </div>
                <?php endif; ?>

                <div class="large-4 large-offset-0 medium-10 medium-offset-1 cell flex align-center space-between">
                    <div>
                        <?php if($icon): ?>
                            <img class="mb-20" <?php acf_image_attrs($icon) ?>>
                        <?php endif; ?>

                        <?php if($title): ?>
                            <h2 style="word-break: break-word"><?php echo $title ?></h2>
                        <?php endif; ?>

                        <?php if($description): ?>
                            <p class="lead"><?php echo $description ?></p>
                        <?php endif; ?>

                        <?php if($button): ?>
                            <div class="button-group">
                                <a class="button" <?php acf_link_attrs($button) ?>>
                                    <?php _e('Learn More', 'spt') ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php endif; ?>
