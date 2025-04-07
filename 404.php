<?php 

get_header(); 

$title = get_field('page404_title', 'option') ? get_field('page404_title', 'option') : '404';
$content = get_field('page404_main_content', 'option');
$button_label = get_field('page404_homepage_button_label', 'option');

?>

<div class="relative z2 pt-80 pb-40">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell hero inner-hero pt-80 pb-80 flex align-center justify-center">
                <div class="hero-content text-center flex align-center justify-center direction-column">
                    <?php if($title): ?>
                        <h1 style="font-size:6rem"><?php echo $title ?></h1>
                    <?php endif; ?>

                    <?php if($content): ?>
                        <p class="lead"><?php echo $content ?></p>
                    <?php endif; ?>

                    <div class="button-group mt-20">
                        <?php if($button_label): ?>
                            <a class="button black hollow" href="<?php echo home_url() ?>">
                                <?php echo $button_label ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <img class="hex1" <?php img_src("hero-hexagons.svg") ?>>
</div>


<?php get_footer(); ?>
