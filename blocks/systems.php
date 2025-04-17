<?php

$title = get_field('systems__title');
$systems = get_field('systems__list');

if(!$systems || empty($systems)) {
  return;
}

?>

<div class="grid-container pt-100">
    <?php if($title): ?>
        <div class="grid-x grid-padding-x pb-30">
            <div class="large-12 cell text-center">
                <h2><?php echo $title ?></h2>
            </div>
        </div>
    <?php endif; ?>

    <div 
        class="grid-x grid-padding-x flex justify-center flex-wrap card-block" 
        data-equalizer="lazrew-equalizer" 
        data-resize="53xu16-eq" 
        data-mutate="r7uyzz-eq" 
        data-events="resize"
    >
        <?php foreach ($systems as $system): ?>
            <div class="xxlarge-3 large-4 medium-6 cell">

                <?php 

                    $system_id = $system['id'];
                    $description = $system['description'];

                    get_template_part('template-parts/components/system-card', null, [
                        'link' => get_permalink($system_id),
                        'title' => get_the_title($system_id),
                        'image' => get_field('system__image', $system_id), 
                        'description' => $description,
                  ]); 

                ?>

            </div>
        <?php endforeach; ?>
    </div>
</div>
