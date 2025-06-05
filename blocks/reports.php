<?php

$title = get_field('reports__title');
$reports = get_field('reports__list');

if(!$reports || empty($reports)) {
  return;
}

?>

<div class="pt-100 pb-100 light-blue | reports">
    <div class="grid-container">
        <?php if($title): ?>
            <div class="grid-x grid-padding-x pb-30">
                <div class="large-12 cell text-center">
                    <h2><?php echo $title ?></h2>
                </div>
            </div>
        <?php endif; ?>

        <div 
          class="grid-x grid-padding-x flex justify-center flex-wrap card-block" 
          data-equalizer="wf3a66-equalizer" 
          data-resize="v2avbq-eq" 
          data-mutate="lpckf0-eq" 
          data-events="resize"
        >
            <?php foreach ($reports as $report): ?>

                <div class="xxlarge-3 large-4 medium-6 cell">
                    <a href="<?php echo $report['link'] ?>" target="_blank">
                        <div class="card large text-center">
                            <?php if($report['image']): ?>
                                <img class="mb-30" <?php acf_image_attrs($report['image']) ?>>
                            <?php endif; ?>

                            <?php if($report['title']): ?>
                                <h4 class="mb-10" data-equalizer-watch="" style="height: auto;"><?php echo $report['title'] ?></h4>
                            <?php endif; ?>

                            <?php if($report['description']): ?>
                                <p><small><?php echo $report['description'] ?></small></p>
                            <?php elseif($report['title']): ?>
                                <p><small><?php echo __('Click here to view our', 'spt') . ' ' . $report['title'] ?></small></p>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>
