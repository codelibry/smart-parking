<?php

$title = get_field('parking-hero__title');

$col_1_title = get_field('parking-hero__col-1-title');
$col_1_button_1 = get_field('parking-hero__col-1-button-1');
$col_1_button_2 = get_field('parking-hero__col-1-button-2');

$col_2_title = get_field('parking-hero__col-2-title');
$col_2_button_1 = get_field('parking-hero__col-2-button-1');
$col_2_button_2 = get_field('parking-hero__col-2-button-2');

$show_scroller = get_array_value($args, 'show_scroller', get_field('parking-hero__show-scroller'));

if(!$title) {
  return;
}

?>

<div class="relative z1">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell hero inner-hero pt-80 pb-30 flex align-center justify-center">

                <div class="hero-content hero-cta-block text-center">
                    <?php if($title): ?>
                        <h1 class="dot"><?php echo $title ?></h1>
                    <?php endif; ?>

                    <div class="grid-x grid-padding-x align-center m-t-4">
                        <?php if($col_1_button_1 || $col_1_button_2): ?>
                            <div class="cell medium-6 small-11">
                                <?php if($col_1_title): ?>
                                    <p class="cta-title"><?php echo $col_1_title ?></p>
                                <?php endif; ?>

                                <div class="cta-buttons">
                                    <?php if($col_1_button_1): ?>
                                        <a class="button" <?php acf_link_attrs($col_1_button_1) ?>>
                                            <?php echo $col_1_button_1['title'] ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php if($col_1_button_2): ?>
                                        <a class="button hollow" <?php acf_link_attrs($col_1_button_2) ?>>
                                            <?php echo $col_1_button_2['title'] ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($col_2_button_1 || $col_2_button_2): ?>
                            <div class="cell medium-6 small-11">
                                <?php if($col_2_title): ?>
                                    <p class="cta-title"><?php echo $col_2_title ?></p>
                                <?php endif; ?>

                                <div class="cta-buttons">
                                    <?php if($col_2_button_1): ?>
                                        <a class="button" <?php acf_link_attrs($col_2_button_1) ?>>
                                            <?php echo $col_2_button_1['title'] ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php if($col_2_button_2): ?>
                                        <a class="button hollow" <?php acf_link_attrs($col_2_button_2) ?>>
                                            <?php echo $col_2_button_2['title'] ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <?php if($show_scroller): ?>
                    <div class="scroller"><div class="dot-flashing"></div></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <img class="hex1" <?php img_src('hero-hexagons.svg') ?>>
    <img class="hex2" <?php img_src('hero-hexagons2.svg') ?>>
</div>
