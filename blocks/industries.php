<?php

$title = get_field('industries__title');
$cta__title = get_field('industries__cta-title');
$cta__button = get_field('industries__cta-button');

$industries = get_posts([
  'post_type' => 'industry',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'order_by' => 'date',
  'order' => 'ASC',
  'suppress_filters' => false
]);

?>

<?php if($industries): ?>
    <div class="grid-container pt-100 pb-50 relative z2">
        <?php if($title): ?>
            <div class="grid-x grid-padding-x">
                <div class="large-6 large-offset-3 cell mb-30 text-center">
                    <h2><?php echo $title ?></h2>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="grid-x grid-padding-x flex justify-center flex-wrap card-block" data-equalizer>
            <?php foreach ($industries as $industry) : ?>
                <div class="xxlarge-3 large-4 medium-6 cell">
                    <a href="<?php the_permalink($industry) ?>">
                        <div class="card w-icon" data-equalizer-watch>
                            <?php if(get_field('industry__icon', $industry->ID)): ?>
                                <img <?php acf_image_attrs(get_field('industry__icon', $industry->ID)) ?>>
                            <?php endif; ?>
                            <h5><?php echo get_the_title($industry->ID) ?></h5>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<?php if($cta__button): ?>
    <div class="grid-container pb-100 cta-bar-block">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell flex align-center justify-center">
                <?php if($cta__title): ?>
                    <h4 class="mb-0"><?php echo $cta__title ?></h4>
                <?php endif; ?>

                <?php if($cta__button): ?>
                    <a <?php acf_link_attrs($cta__button) ?> class="button">
                        <?php echo $cta__button['title'] ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
