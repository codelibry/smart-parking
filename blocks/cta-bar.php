<?php

$cta_title = get_field('cta-bar__title');
$cta_button = get_field('cta-bar__button');

$additional_classes = get_field('cta-bar__additional-classes');

if(!$cta_button) {
  return;
}

?>

<div class="pt-100 pb-100 cta-bar-block light-blue <?php echo $additional_classes ?>">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell flex align-center justify-center">
                <?php if($cta_title): ?>
                    <h3 class="mb-0">
                        <?php echo $cta_title ?>
                    </h3>
                <?php endif; ?>

                <?php if($cta_button): ?>
                    <a class="button" <?php acf_link_attrs($cta_button) ?>>
                        <?php echo $cta_button['title'] ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
