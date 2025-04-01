<?php

$image = get_field('full-image__image');

if(!$image) return;

?>

<div class="relative z1 full-image-block">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="small-12 cell text-center">
                <img <?php acf_image_attrs($image) ?>>
            </div>
        </div>
    </div>
</div>
