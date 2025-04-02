<?php

$link = get_array_value($args, 'link');
$image = get_array_value($args, 'image');
$title = get_array_value($args, 'title');
$description = get_array_value($args, 'description');

?>

<a href="<?php echo $link ?>">
    <div class="card large text-center">
        <?php if($image): ?>
            <img class="mb-30" <?php acf_image_attrs($image) ?>>
        <?php endif; ?>

        <?php if($title): ?>
            <h4 class="mb-10" data-equalizer-watch="" style="height: auto;">
                <?php echo $title ?>
            </h4>
        <?php endif; ?>

        <?php if($description): ?>
            <p><small>
                <?php echo $description ?>
            </small></p>
        <?php endif; ?>
    </div>
</a>
