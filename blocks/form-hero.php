<?php

$form = get_field('form-hero__form');
$title = get_field('form-hero__title');
$form_title = get_field('form-hero__form-title');
$description = get_field('form-hero__description');

?>

<div class="relative z2 pt-80 pb-80 mobile-section">
    <div class="grid-container">
        <div class="grid-x grid-padding-x form-hero inner-hero flex align-center">
            <div class="large-5 cell flex align-center justify-left medium-flex-center">
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

            <div class="large-6 cell light-blue pt-60 pb-40">
              <div class="grid-x grid-margin-x">
                <div class="xxlarge-10 xxlarge-offset-1 xlarge-10 xlarge-offset-1 large-10 large-offset-1 medium-10 medium-offset-1 small-12 cell">
                  <?php if($form_title): ?>
                    <h2 class="text-center"><?php echo $form_title ?></h2>
                  <?php endif; ?>

                  <?php echo do_shortcode("[contact-form-7 id='$form']"); ?>
                </div>
              </div>
            </div>
        </div>
    </div>
    
    <img class="hex1" <?php img_src('hero-hexagons.svg'); ?> />
    <img class="hex2" <?php img_src('hero-hexagons2.svg'); ?> />
</div>
