<?php

$title = get_field('charge-appeal__title');
$subtitle = get_field('charge-appeal__subtitle');
$appeals = get_field('charge-appeal__appeals');

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

                        <div class="grid-x grid-padding-x align-center text-center m-t-4">
                            <div class="cell medium-6 small-11">
                                <p class="cta-title"><?php _e('If your Parking Charge begins with TC, TE or 00', 'spt') ?></p>
                                <div class="cta-buttons">
                                    <a href="https://payments.townandcityparking.co.uk/live-pgc-user/" class="button"><?php _e('Pay a Parking Charge', 'spt') ?></a>
                                    <a href="https://payments.townandcityparking.co.uk/live-pgc-user/" class="button hollow"><?php _e('Appeal a Parking Charge', 'spt') ?></a>
                                </div>
                            </div>
                            <div class="cell medium-6 small-11">
                                <p class="cta-title"><?php _e('If your Parking Charge begins with SP', 'spt') ?></p>
                                <div class="cta-buttons">
                                    <a href="https://pcnportal.smartparking.com/VEH/Live/3sc/3sc-us/" class="button"><?php _e('Pay a Parking Charge', 'spt') ?></a>
                                    <a href="https://pcnportal.smartparking.com/VEH/Live/3sc/3sc-us/" class="button hollow"><?php _e('Appeal a Parking Charge', 'spt') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
