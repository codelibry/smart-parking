<?php

$form = get_field('form-hero__form');
$title = get_field('form-hero__title');
$description = get_field('form-hero__description');

?>

<div class="relative z2">
    <div class="grid-container">
        <div class="grid-x grid-padding-x form-hero inner-hero flex align-center">
            <div class="large-5 cell pt-80 pb-80 flex align-center justify-left medium-flex-center">
                <div class="hero-content flex align-left justify-center direction-column medium-center medium-flex-center">
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

            <div class="large-1"></div>

            <div class="large-6 cell">
              <?php echo do_shortcode("[contact-form-7 id='$form']"); ?>
            </div>
        </div>
    </div>
</div>
