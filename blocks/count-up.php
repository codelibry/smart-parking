<?php

$count_ups = get_field('count-up__list');

?>

<?php if($count_ups): ?>
    <div class="count-up pt-100 pb-80 relative z2 light-blue mobile-section">
        <div class="grid-container">
            <div class="grid-x grid-padding-x flex justify-center flex-wrap card-block" data-equalizer>
                <?php foreach ($count_ups as $count_up) : 
                  $title = $count_up['title'];
                  $description = $count_up['description'];
                ?>
                    <div class="xxlarge-3 large-4 medium-6 cell">
                        <div class="text-center">
                            <?php if($title): ?>
                              <h3 class="h2 js-counter"><?php echo $title ?></h3>
                            <?php endif; ?>

                            <?php if($description): ?>
                              <p class="h5"><?php echo $description ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
