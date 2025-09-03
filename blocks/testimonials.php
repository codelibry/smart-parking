<?php

$title = get_field('testimonials__title');
$testimonials = get_field('testimonials__list');

?>

<div class="pt-80 pb-80 testimonials light-grey">
    <div class="grid-container">
        <?php if($title): ?>
            <div class="grid-x grid-padding-x">
                <div class="large-6 large-offset-3 cell mb-30 text-center">
                    <h2><?php echo $title ?></h2>
                </div>
            </div>
        <?php endif; ?>

        <div class="testimonials-carousel">
            <?php foreach ($testimonials as $testimonial): 
                $image = $testimonial['image'];
                $description = $testimonial['description'];
                $position = $testimonial['position'];
                $name = $testimonial['name'];
            ?>
                <div class="testimonial">
                    <div class="testimonial-wrap">
                        <?php if ($description) : ?>
                            <?php echo $description ?>
                        <?php endif; ?>
                    </div>
                    <div class="testimonial-footer">
                      <div class="testimonial-photo">
                          <?php echo wp_get_attachment_image($image, 'small', false) ?>
                      </div>
                      <p><?php echo $name ?> | <strong><?php echo $position ?></strong></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
