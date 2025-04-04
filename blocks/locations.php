<?php

$title = get_field('locations__title');
$locations = get_field('locations__list');

if(!$locations || empty($locations)) {
  return;
}

?>

<div class="map-block2 pt-100 pb-100">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 flex align-center direction-column cell">
                <?php if($title): ?>
                    <h2 class="mb-100"><?php echo $title ?></h2>
                <?php endif; ?>

                <div 
                    class="grid-x pt-100 grid-padding-x" 
                    data-equalizer="vqx0kk-equalizer" 
                    data-resize="f9kfyf-eq" 
                    data-mutate="tvh9xw-eq" 
                    data-events="mutate"
                >
                    <?php foreach ($locations as $location): ?>
                        <div class="xxlarge-3 large-4 medium-6 cell">
                            <div class="card large" data-equalizer-watch="" style="height: 446px;">
                                <h5 class="pb-20"><?php echo $location['title'] ?></h5>
                                <div><?php echo $location['content'] ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
