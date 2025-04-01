<?php

$title = get_field('systems__title');

$systems = get_posts([
  'post_type' => 'system',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'order_by' => 'date',
  'order' => 'ASC'
])

?>

<div class="grid-container pt-100">
    <?php if($title): ?>
        <div class="grid-x grid-padding-x pb-30">
            <div class="large-12 cell text-center">
                <h2><?php echo $title ?></h2>
            </div>
        </div>
    <?php endif; ?>

    <div class="grid-x grid-padding-x flex justify-center flex-wrap card-block" data-equalizer="lazrew-equalizer" data-resize="53xu16-eq" data-mutate="r7uyzz-eq" data-events="resize">
        <?php foreach ($systems as $system): ?>
            <div class="xxlarge-3 large-4 medium-6 cell">
                <a href="<?php the_permalink($system) ?>">
                    <div class="card large text-center">
                        <?php if(get_field('system__image', $system)): ?>
                            <img class="mb-30" <?php acf_image_attrs(get_field('system__image', $system)) ?>>
                        <?php endif; ?>

                        <?php if(get_the_title($system)): ?>
                            <h4 class="mb-10" data-equalizer-watch="" style="height: auto;">
                                <?php echo get_the_title($system) ?>
                            </h4>
                        <?php endif; ?>

                        <?php if(get_field('system__description', $system)): ?>
                            <p><small>
                                <?php the_field('system__description', $system) ?>
                            </small></p>
                        <?php endif; ?>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
