<?php

$title = get_field('map__title');
$description = get_field('map__description');
$list = get_field('map__list');

if(!$list || empty($list)) {
  return;
}

?>

<div class="pt-100 pb-100 mb-100 mt-100 map-block">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="xxlarge-4 xxlarge-offset-8 xlarge-6 xlarge-offset-6 large-8 large-offset-4 medium-10 medium-offset-1 cell">
                <div>
                    <?php if($title): ?>
                        <h2><?php echo $title ?></h2>
                    <?php endif; ?>

                    <?php if($description): ?>
                        <p style="text-align: left;"><?php echo $description ?></p>
                    <?php endif; ?>

                    <ul class="tick-list" style="text-align: left;">
                        <?php foreach ($list as $item): ?>
                            <li><?php echo $item['title'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
