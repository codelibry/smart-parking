<?php 
/*
 * Template Name: Thank You
 */

get_header(); 

$title = get_field('thank-you_title');
$button = get_field('thank-you_button');
$content = get_field('thank-you_content');

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
                        <?php if($button): ?>
                            <a class="button black hollow" <?php acf_link_attrs($button) ?>>
                                <?php echo $button['title'] ?>
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
