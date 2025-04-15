<?php

$image = get_array_value($args, 'image', get_field('full-image__image'));

$additional_classes = get_array_value($args, 'additional_classes', get_field('full-image__additional-classes'));

if(!$image) return;

?>

<div class="relative z1 full-image-block <?php echo $additional_classes ?>">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="small-12 cell text-center">
                <img <?php acf_image_attrs($image) ?> style="width:100%;height:100%;object-fit:cover;">
            </div>
        </div>
    </div>
</div>
