<?php

$title = get_field('features__title');
$description = get_field('features__description');
$button = get_field('features__button');
$features = get_field('features__list');

?>

<div class="relative z2 light-grey">
    <div class="grid-container">
        <div class="grid-x grid-padding-x features flex align-center pt-80 pb-80">
            <div class="large-5 cell flex align-center justify-left medium-flex-center">
                <div class="flex align-left justify-center direction-column medium-center medium-flex-center">
                    <?php if($title): ?>
                      <h1 class="dot"><?php echo $title ?></h1>
                    <?php endif; ?>

                    <?php if($description): ?>
                        <div>
                          <?php echo $description ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="large-1 cell"></div>

            <div class="large-6 cell">
                <?php foreach ($features as $feature): 
                    $image = $feature['image'];
                    $description = $feature['description'];
                ?>
                    <div class="card feature">
                        <?php if($image): ?>
                            <?php echo wp_get_attachment_image($image, 'large', false) ?>
                        <?php endif; ?>

                        <?php if($description): ?>
                            <h5><?php echo $description ?></h5>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
