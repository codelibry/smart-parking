<?php

$title = get_field('charge-appeal__title');
$subtitle = get_field('charge-appeal__subtitle');
$appeals = get_field('charge-appeal__appeals');

$col_1_title = get_field('charge-appeal__col-1-title');
$col_1_button_1 = get_field('charge-appeal__col-1-button-1');
$col_1_button_2 = get_field('charge-appeal__col-1-button-2');

$col_2_title = get_field('charge-appeal__col-2-title');
$col_2_button_1 = get_field('charge-appeal__col-2-button-1');
$col_2_button_2 = get_field('charge-appeal__col-2-button-2');


if(!$appeals || empty($appeals)) {
  return;
}

?>

<div class="pt-100 pb-100 mb-100 right-content-block">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="xxlarge-6 xxlarge-offset-3 large-6 large-offset-3 medium-10 medium-offset-1 text-center cell">
                <?php if($title): ?>
                    <h2><?php echo $title ?></h2>
                <?php endif; ?>

                <?php if($title): ?>
                    <p><?php echo $subtitle ?></p>
                <?php endif; ?>

                <label class="text-left">
                    <?php _e('Select a reason for appeal', 'spt') ?>

                    <select id="appeal-reasons-dropdown">
                        <option value="" selected="" default=""><?php _e('Please Select', 'spt') ?></option>

                        <?php foreach ($appeals as $i => $appeal): ?>
                            <option value="appeal-item-<?php echo $i + 1 ?>"><?php echo $appeal['option'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>

                <?php foreach($appeals as $i => $appeal): ?>
                    <div class="appeal-reason-details" id="appeal-body-<?php echo $i + 1 ?>" style="text-align: left; display: none;">
                        <?php echo $appeal['content'] ?>

                        <div class="grid-x grid-padding-x align-center m-t-4">
                            <?php if($col_1_title): ?>
                                <div class="cell medium-6 small-11">
                                    <p class="cta-title text-center"><?php echo $col_1_title ?></p>
                                    <div class="cta-buttons">
                                        <?php if($col_1_button_1): ?>
                                            <a class="button" <?php acf_link_attrs($col_1_button_1) ?>>
                                                <?php echo $col_1_button_1['title'] ?>
                                            </a>
                                        <?php endif; ?>

                                        <?php if($col_1_button_2): ?>
                                            <a class="button hollow" <?php acf_link_attrs($col_1_button_2) ?>>
                                                <?php echo $col_1_button_2['title'] ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($col_2_title): ?>
                                <div class="cell medium-6 small-11">
                                    <p class="cta-title text-center"><?php echo $col_2_title ?></p>
                                    <div class="cta-buttons">
                                        <?php if($col_2_button_1): ?>
                                            <a class="button" <?php acf_link_attrs($col_2_button_1) ?>>
                                                <?php echo $col_2_button_1['title'] ?>
                                            </a>
                                        <?php endif; ?>

                                        <?php if($col_2_button_2): ?>
                                            <a class="button hollow" <?php acf_link_attrs($col_2_button_2) ?>>
                                                <?php echo $col_2_button_2['title'] ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
