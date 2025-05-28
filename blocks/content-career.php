<?php

$content = get_field('content-career__content') 
  ? get_field('content-career__content') 
  : get_the_content();

?>


<div class="pt-100 pb-100 | content-career">
    <div class="grid-container">
        <?php echo $content ?>
    </div>
</div>
