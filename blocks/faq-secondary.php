<?php

$title = get_field('faq-secondary__title');
$tabs = get_field('faq-secondary__tabs');

?>

<div class="faq-secondary | pt-100 pb-100">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-10 large-offset-1 cell">

                <?php if($title): ?>
                    <h2 class="text-center mb-80"><?php echo $title ?></h2>
                <?php endif; ?>

                <?php foreach($tabs as $tab): 
                    $tab_title = $tab['tab-title'];
                    $faq_groups = $tab['faq-groups'];
                ?>
                    <div class="faq-secondary__tabs">
                        <?php foreach($faq_groups as $faq_group): 
                            $group_title = $faq_group['faq-group-title'];
                            $faqs = $faq_group['faqs'];
                        ?>
                            <div class="faq-secondary__group">
                                <?php if($group_title): ?>
                                    <h4><?php echo $group_title ?></h4>
                                <?php endif; ?>

                                <ul class="accordion secondary" data-accordion="plohin-accordion">
                                    <?php foreach ($faqs as $faq): ?>
                                        <li class="accordion-itemm" data-accordion-item="">
                                            <a class="accordion-title" aria-expanded="false">
                                                <?php echo $faq['question'] ?>
                                            </a>
                                            <div class="accordion-content" data-tab-content="" role="region" aria-hidden="true">
                                                <?php echo $faq['answear'] ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
