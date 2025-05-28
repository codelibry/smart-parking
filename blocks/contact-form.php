<?php

$title = get_array_value($args, 'title', get_field('contact-us__title'));
$description = get_array_value($args, 'description', get_field('contact-us__description'));
$warning = get_array_value($args, 'warning', get_field('contact-us__warning'));
$form_id = get_array_value($args, 'form_id', get_field('contact-us__form'));

if(!$form_id) {
  return;
}

?>

<div class="pt-100 pb-100 black" id="contact-form-anchor">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="large-6 large-offset-3 medium-10 medium-offset-1 text-center cell">
                <?php if($title): ?>
                    <h2><?php echo $title ?></h2>
                <?php endif; ?>

                <?php if($description): ?>
                    <p><?php echo $description ?></p>
                <?php endif; ?>

                <?php if($warning): ?>
                    <p class="mt-50" style="color: red; margin: 1rem; font-size: larger;"><?php echo $warning ?></p>
                    <p></p>
                <?php endif; ?>
            </div>
        </div>
        
        <?php echo do_shortcode("[contact-form-7 id='$form_id']"); ?>
    </div>
</div>
