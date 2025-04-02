<?php

$image = get_field('content-system__image');
$title = get_field('content-system__title');
$description = get_field('content-system__description');
$systems = get_field('content-system__systems');

if(!$systems || empty($systems)) {
  return;
}

?>

<div class="pt-100 pb-100 light-blue system-block-left">
    <?php if($image): ?>
        <img class="graphic" <?php acf_image_attrs($image) ?>>
    <?php endif; ?>

    <div class="grid-container">
        <div class="grid-x grid-padding-x">
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
                <div class="grid-x grid-padding-x" data-equalizer="o15oc9-equalizer" data-resize="ufz7qg-eq" data-mutate="wd0rhf-eq" data-events="resize">
                    <?php foreach ($systems as $system): ?>
                        <div class="xxlarge-6 large-6 medium-6 cell">

                            <?php get_template_part('template-parts/components/system-card', null, [
                                'link' => get_permalink($system),
                                'image' => get_field('system__image', $system),
                                'title' => get_the_title($system),
                                'description' => get_field('system__description', $system),
                            ]) ?>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
