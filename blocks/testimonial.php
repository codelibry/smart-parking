<?php

$image = get_array_value($args, 'image', get_field('testimonial__image'));
$quote = get_array_value($args, 'quote', get_field('testimonial__quote'));
$position = get_array_value($args, 'position', get_field('testimonial__position'));
$company = get_array_value($args, 'company', get_field('testimonial__company'));

?>

<div class="pt-50 pb-100 testimonial-block">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="xxlarge-12 cell flex align-center justify-center">
                <?php if ($image) : ?>
                    <img <?php acf_image_attrs($image) ?>>
                <?php endif; ?>

                <div class="testimonial">
                    <div class="testimonial-wrap">
                        <?php if ($quote) : ?>
                            <?php echo $quote ?>
                        <?php endif; ?>
                    </div>
                    <p><?php echo esc_html($position); ?> | <strong><?php echo esc_html($company); ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>
