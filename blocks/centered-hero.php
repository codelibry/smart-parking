<?php

$title = get_array_value($args, 'title', get_field('centered-hero__title'));
$description = get_array_value($args, 'description', get_field('centered-hero__description'));

$button_1 = get_field('centered-hero__button-1');
$button_2 = get_field('centered-hero__button-2');
$button_video = get_field('centered-hero__button-video');

$show_scroller = get_array_value($args, 'show_scroller', get_field('centered-hero__show-scroller'));
$additional_classes = get_array_value($args, 'additional_classes', get_field('centered-hero__additional-classes'));

$country_buttons = get_array_value($args, 'country_buttons', get_field('centered-hero__country-buttons'));

if(!$title) {
  return;
}

?>

<div class="relative z2 <?php echo $additional_classes ?>">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell hero inner-hero pt-80 pb-80 flex align-center justify-center">
                <div class="hero-content text-center flex align-center justify-center direction-column">
                    <?php if($title): ?>
                        <h1 class="dot"><?php echo $title ?></h1>
                    <?php endif; ?>

                    <?php if($description): ?>
                        <div class="lead | mb-20">
                            <?php echo $description ?>
                        </div>
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

                        <?php if($button_video): ?>
                            <a class="play-button mt-0 m-auto" <?php acf_link_attrs($button_video) ?>>
                                <span><?php echo get_inline_svg('play.svg') ?></span> 
                                <?php echo $button_video['title'] ?>
                            </a>
                        <?php endif; ?>
                    </div>

                    <?php if(!empty($country_buttons)): ?>
                        <div class="button-group">
                            <?php foreach ($country_buttons as $country_button): 
                                $link = $country_button['link'];
                                $flag_1 = $country_button['flag-1'];
                                $flag_2 = $country_button['flag-2'];
                            ?>
                                <a href="<?php echo $link ?>" class="button black hollow">
                                    <?php if($flag_1): ?>
                                        <img width="16" height="16" src="<?php echo $flag_1 ?>" />
                                    <?php endif; ?>
                                    <?php if($flag_2): ?>
                                        <img width="16" height="16" src="<?php echo $flag_2 ?>" />
                                    <?php endif; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if($show_scroller): ?>
                    <div class="scroller"><div class="dot-flashing"></div></div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <img class="hex1" <?php img_src("hero-hexagons.svg") ?>>
    <img class="hex2" <?php img_src("hero-hexagons2.svg") ?>>
</div>
