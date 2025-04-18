<?php

$image_lg = get_array_value($args, 'image_lg');
$image_sm = get_array_value($args, 'image_sm');

$title = get_array_value($args, 'title');
$description = get_array_value($args, 'description');
$subtitle = get_array_value($args, 'subtitle');

$list = get_array_value($args, 'list');

$moretext = get_array_value($args, 'moretext');

$button_1 = get_array_value($args, 'button_1');
$button_2 = get_array_value($args, 'button_2');

$additional_classes = get_array_value($args, 'additional_classes');

$content_left = get_array_value($args, 'is_content_left');

if(!$image_lg && !$image_sm && !$title && !$subtitle) {
  return;
}

$image_lg = is_int((int) $image_lg) ? wp_get_attachment_image_url($image_lg) : $image_lg;
$image_sm = is_int((int) $image_sm) ? wp_get_attachment_image_url($image_sm) : $image_sm;

?>

<?php if(!$content_left): ?>

    <div class="pb-100 right-content-block <?php echo $additional_classes ?>" id="contentanchor">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">

                <div class="large-6 large-offset-0 medium-8 medium-offset-2 cell relative hex-graphics">
                    <img class="graphic" <?php img_src('hexagon-hollow.svg') ?>>
                    
                    <?php if($image_lg): ?>
                        <div class="large-image" style="background-image: url(<?php echo $image_lg ?>);"></div>
                    <?php endif; ?>

                    <?php if($image_sm): ?>
                        <div class="shadow">
                            <div class="small-image" style="background-image: url(<?php echo $image_sm ?>);"></div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="xxlarge-5 xxlarge-offset-0 xlarge-6 xlarge-offset-0 large-6 large-offset-0 medium-10 medium-offset-1 cell flex align-center space-between">
                    <div>
                        <?php if($title): ?>
                            <h2><?php echo $title ?></h2>
                        <?php endif; ?>

                        <?php if($description): ?>
                          <p><?php echo $description ?></p>
                        <?php endif; ?>

                        <?php if($subtitle): ?>
                          <h4><?php echo $subtitle ?></h4>
                        <?php endif; ?>

                        <?php if($list): ?>
                            <ul class="tick-list">
                                <?php foreach ($list as $item): ?>
                                    <li><?php echo $item['title'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if($moretext): ?>
                            <p class="moretext">
                                <?php echo $moretext ?>
                            </p>
                            <a class="moreless-button">
                                <?php _e('Read more', 'spt') ?>
                            </a>                      
                        <?php endif; ?>

                        <div class="button-group">
                            <?php if($button_1): ?>
                                <a class="button" <?php acf_link_attrs($button_1) ?>>
                                    <?php echo $button_1['title'] ?>
                                </a>
                            <?php endif; ?>

                            <?php if($button_2): ?>
                                <a class="button black hollow" <?php acf_link_attrs($button_2) ?>>
                                    <?php echo $button_2['title'] ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>

    <div class="pb-100 left-content-block <?php echo $additional_classes ?>" id="contentanchor">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">

                <div class="xxlarge-5 xxlarge-offset-1 xlarge-6 xlarge-offset-0 large-6 large-offset-0 medium-10 medium-offset-1 cell flex align-center space-between">
                    <div>
                        <?php if($title): ?>
                            <h2><?php echo $title ?></h2>
                        <?php endif; ?>

                        <?php if($description): ?>
                          <p><?php echo $description ?></p>
                        <?php endif; ?>

                        <?php if($subtitle): ?>
                          <h4><?php echo $subtitle ?></h4>
                        <?php endif; ?>

                        <?php if($list): ?>
                            <ul class="tick-list">
                                <?php foreach ($list as $item): ?>
                                    <li><?php echo $item['title'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if($moretext): ?>
                            <p class="moretext">
                                <?php echo $moretext ?>
                            </p>
                            <a class="moreless-button">
                                <?php _e('Read more', 'spt') ?>
                            </a>                      
                        <?php endif; ?>

                        <div class="button-group">
                            <?php if($button_1): ?>
                                <a class="button" <?php acf_link_attrs($button_1) ?>>
                                    <?php echo $button_1['title'] ?>
                                </a>
                            <?php endif; ?>

                            <?php if($button_2): ?>
                                <a class="button black hollow" <?php acf_link_attrs($button_2) ?>>
                                    <?php echo $button_2['title'] ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="large-6 large-offset-0 medium-8 medium-offset-2 cell relative">
                    <img class="graphic" <?php img_src('hexagon-hollow.svg') ?>>
                    
                    <?php if($image_lg): ?>
                        <div class="large-image" style="background-image: url(<?php echo $image_lg ?>);"></div>
                    <?php endif; ?>

                    <?php if($image_sm): ?>
                        <div class="shadow">
                            <div class="small-image" style="background-image: url(<?php echo $image_sm ?>);"></div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>

<?php endif; ?>
