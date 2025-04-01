<?php

$title = get_field('cta-bar__title');
$button = get_field('cta-bar__button');

if(!$button) {
  return;
}

?>

<div class="pt-100 pb-100 cta-bar-block light-blue">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell flex align-center justify-center">
                <?php if($title): ?>
                    <h3 class="mb-0">
                        <?php echo $title ?>
                    </h3>
                <?php endif; ?>

                <?php if($button): ?>
                    <a class="button" <?php acf_link_attrs($button) ?>>
                        <?php echo $button['title'] ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
