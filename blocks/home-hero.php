<?php

$header_text = get_field('home-hero__title');
$summary_text = get_field('home-hero__summary');
$link_button1 = get_field('home-hero__button1');
$link_button2 = get_field('home-hero__button2');
$video_link = get_field('home-hero__video');

$country_buttons = get_field('home-hero__country-buttons');

?>

<div class="hero relative z1">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell hero flex align-center justify-left">
                <div class="hero-content">
                    <?php if ($header_text): ?>
                        <h1 class="dot"><?php echo esc_html($header_text); ?></h1>
                    <?php endif; ?>
                    
                    <?php if ($summary_text): ?>
                        <p class="lead"><?php echo esc_html($summary_text); ?></p>
                    <?php endif; ?>
                    
                    <div class="button-group">
                        <?php if ($link_button1): ?>
                            <a <?php acf_link_attrs($link_button1); ?> class="button"><?php echo esc_html($link_button1['title']); ?></a>
                        <?php endif; ?>
                        
                        <?php if ($link_button2): ?>
                            <a <?php acf_link_attrs($link_button2); ?> class="button black hollow"><?php echo esc_html($link_button2['title']); ?></a>
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
                                        <img width="20" height="20" src="<?php echo $flag_2 ?>" />
                                    <?php endif; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($video_link): ?>
                        <a class="play-button" <?php acf_link_attrs($video_link); ?>>
                            <span><img <?php img_src('play.svg'); ?> /></span> <?php echo esc_html($video_link['title']); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="scroller"><div class="dot-flashing"></div></div>
            </div>
        </div>
    </div>
    
    <div class="hero-image">
        <?php get_template_part('template-parts/partials/image-animation'); ?>
    </div>
    
    <img class="hex1" <?php img_src('hero-hexagons.svg'); ?> />
    <img class="hex2" <?php img_src('hero-hexagons2.svg'); ?> />
</div>

