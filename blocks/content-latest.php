<?php

$content = get_field('content-latest__content') 
  ? get_field('content-latest__content') 
  : get_the_content();

?>


<div class="pt-100 pb-50 | content-latest">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-6 large-offset-3 medium-8 medium-offset-2 cell relative">
                <?php echo $content ?>
            </div>
        </div>
    </div>
</div>
