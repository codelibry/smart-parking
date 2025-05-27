<?php

$image = get_array_value($args, 'image', get_field('content-system__image'));
$title = get_array_value($args, 'title', get_field('content-system__title'));
$description = get_array_value($args, 'description', get_field('content-system__description'));
$systems = get_array_value($args, 'systems', get_field('content-system__systems'));
$is_content_left = get_array_value($args, 'is_content_left', get_field('content-system__content-left'));

?>

<?php if($is_content_left): ?>

    <div class="pt-100 pb-100 light-blue system-block-left">
        <?php if($image): ?>
            <img class="graphic" <?php acf_image_attrs($image) ?> style="max-width:840px;">
        <?php endif; ?>

        <div class="grid-container">
            <div class="grid-x grid-padding-x grid-two">
                <div class="large-5 cell">
                    <?php if($title): ?>
                        <h2><?php echo $title ?></h2>
                    <?php endif; ?>

                    <?php if($description): ?>
                        <p><?php echo $description ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="grid-x grid-padding-x">
                <div class="large-6 cell">
                    <div 
                        class="grid-x grid-padding-x grid-two" 
                        data-equalizer="o15oc9-equalizer" 
                        data-resize="ufz7qg-eq" 
                        data-mutate="wd0rhf-eq" 
                        data-events="resize"
                    >
                        <?php foreach ($systems as $system): ?>
                            <div class="xxlarge-6 large-6 medium-6 cell">

                                <?php get_template_part('template-parts/components/system-card', null, [
                                    'link' => get_permalink($system),
                                    'title' => get_the_title($system),
                                    'image' => get_field('system__image-secondary', $system) 
                                      ? get_field('system__image-secondary', $system) 
                                      : get_field('system__image', $system),
                                    'description' => get_field('system__description-secondary', $system),
                                ]) ?>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>

    <div class="pb-100 light-blue system-block-right">
        <?php if($image): ?>
            <img class="graphic" <?php acf_image_attrs($image) ?> style="max-width:840px;">
        <?php endif; ?>

        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="large-5 large-offset-7 cell">
                    <?php if($title): ?>
                        <h2><?php echo $title ?></h2>
                    <?php endif; ?>

                    <?php if($description): ?>
                        <p><?php echo $description ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="grid-x grid-padding-x">
                <div class="large-6 large-offset-6 cell">
                    <div class="grid-x grid-padding-x flex flex-wrap justify-right grid-two">
                        <?php foreach ($systems as $system): ?>
                            <div class="xxlarge-6 large-6 medium-6 cell">

                                <?php get_template_part('template-parts/components/system-card', null, [
                                    'link' => get_permalink($system),
                                    'title' => get_the_title($system),
                                    'image' => get_field('system__image-secondary', $system) 
                                      ? get_field('system__image-secondary', $system) 
                                      : get_field('system__image', $system),
                                    'description' => get_field('system__description-secondary', $system),
                                ]) ?>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
