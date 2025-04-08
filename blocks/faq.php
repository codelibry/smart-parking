<?php

$title = get_field('faq__title');
$faqs = get_field('faq__faqs');

$col_1_title = get_field('faq__col-1-title');
$col_1_button_1 = get_field('faq__col-1-button-1');
$col_1_button_2 = get_field('faq__col-1-button-2');

$col_2_title = get_field('faq__col-2-title');
$col_2_button_1 = get_field('faq__col-2-button-1');
$col_2_button_2 = get_field('faq__col-2-button-2');

if(!$faqs || empty($faqs)) {
  return;
}

?>

<div class="pt-100 pb-100 black">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-8 large-offset-2 medium-10 medium-offset-1 cell">

                <?php if($title): ?>
                    <h2 class="text-center mb-50"><?php echo $title ?></h2>
                <?php endif; ?>

                <p class="text-center lead"></p>

                <ul class="accordion" data-accordion="plohin-accordion">
                    <?php foreach ($faqs as $faq): ?>
                        <li class="accordion-itemm" data-accordion-item="">
                            <a class="accordion-title" aria-expanded="false">
                                <?php echo $faq['title'] ?>
                            </a>
                            <div class="accordion-content" data-tab-content="" role="region" aria-hidden="true">
                                <?php echo $faq['content'] ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <div class="grid-x grid-padding-x align-center text-center m-t-2">
                    <?php if($col_1_title): ?>
                        <div class="cell medium-6 small-11">
                            <p class="cta-title"><?php echo $col_1_title ?></p>
                            <div class="cta-buttons">
                                <?php if($col_1_button_1): ?>
                                    <a class="button" <?php acf_link_attrs($col_1_button_1) ?>>
                                        <?php echo $col_1_button_1['title'] ?>
                                    </a>
                                <?php endif; ?>

                                <?php if($col_1_button_2): ?>
                                    <a class="button black hollow white-bg-hollow-btn" <?php acf_link_attrs($col_1_button_2) ?>>
                                        <?php echo $col_1_button_2['title'] ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($col_2_title): ?>
                        <div class="cell medium-6 small-11">
                            <p class="cta-title"><?php echo $col_2_title ?></p>
                            <div class="cta-buttons">
                                <?php if($col_2_button_1): ?>
                                    <a class="button" <?php acf_link_attrs($col_2_button_1) ?>>
                                        <?php echo $col_2_button_1['title'] ?>
                                    </a>
                                <?php endif; ?>

                                <?php if($col_2_button_2): ?>
                                    <a class="button black hollow white-bg-hollow-btn" <?php acf_link_attrs($col_2_button_2) ?>>
                                        <?php echo $col_2_button_2['title'] ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
