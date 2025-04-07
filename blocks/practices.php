<?php

$title = get_field('practices__title');
$description = get_field('practices__description');
$practices = get_field('practices__list');

if(!$practices || empty($practices)) {
  return;
}

?>

<div class="grid-container pt-100 pb-50 relative z2">

    <?php if($title): ?>
        <div class="grid-x grid-padding-x">
            <div class="large-6 large-offset-3 cell mb-30 text-center">
                <h2><?php echo $title ?></h2>
                
                <?php if($description): ?>
                    <p class="lead"><?php echo $description ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <div 
      class="grid-x grid-padding-x flex justify-center flex-wrap card-block" 
      data-equalizer="6wm2rc-equalizer" 
      data-resize="0imb28-eq" 
      data-mutate="vv3p5q-eq" 
      data-events="resize"
    >
        <?php foreach ($practices as $practice): ?>

            <div class="large-4 medium-6 cell">
                <a href="<?php echo $practice['link'] ?>">
                    <div class="card w-icon">
                        <?php if($practice['image']): ?>
                            <img <?php acf_image_attrs($practice['image']) ?>>
                        <?php endif; ?>

                        <?php if($practice['title']): ?>
                            <h5 data-equalizer-watch="" style="height: auto;"><?php echo $practice['title'] ?></h5>
                        <?php endif; ?>

                        <p data-equalizer-watch="" class="lead" style="height: auto;"></p>
                    </div>
                </a>
            </div>

        <?php endforeach; ?>
    </div>
</div>
