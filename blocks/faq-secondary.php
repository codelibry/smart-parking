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

                <div class="tab-buttons-wrapper | mb-80">
                    <div class="tab-buttons">
                      <?php foreach($tabs as $i => $tab): 
                        $title = $tab['tab-title'];
                        $active = $i === 0 ? 'active' : '';
                      ?>
                        <button class="button | tab-button | <?php echo $active ?>" data-tab="tab<?php echo $i ?>">
                          <?php echo $title ?>
                        </button>
                      <?php endforeach; ?>
                    </div>
                </div>

                <div class="faq-secondary__tabs">
                    <?php foreach($tabs as $i => $tab): 
                        $tab_title = $tab['tab-title'];
                        $faq_groups = $tab['faq-groups'];
                        $active = $i === 0 ? 'active' : '';
                    ?>
                        <div class="faq-secondary__tab tab-content <?php echo $active ?>" id="tab<?php echo $i ?>">
                            <?php foreach($faq_groups as $faq_group): 
                                $group_title = $faq_group['faq-group-title'];
                                $faqs = $faq_group['faqs'];
                            ?>
                                <div class="faq-secondary__group">
                                    <?php if($group_title): ?>
                                        <h3 class="h4 mb-40"><?php echo $group_title ?></h3>
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
</div>
