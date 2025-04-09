<?php

$cta_button = get_field('cta-button', 'option');

?>

<div class="reveal-overlay" style="display: none;">
    <div 
        class="reveal mobile-menu" 
        id="exampleModal1" 
        data-reveal="cf3oiy-reveal" 
        role="dialog" 
        aria-hidden="true" 
        data-yeti-box="exampleModal1" 
        data-resize="exampleModal1" 
        style="display: none; top: 0px;" 
        tabindex="-1"
    ></div>

    <?php
        wp_nav_menu([
            'theme_location'  => 'mobile-menu',
            'container'       => 'ul',
            'menu_class'      => 'vertical menu accordion-menu',
            'menu_id'         => '',
            'walker'          => new Mobile_Menu_Walker(),
            'items_wrap'      => '<ul id="%1$s" class="%2$s" data-accordion-menu role="menubar" aria-multiselectable="true">%3$s</ul>',
        ]);
    ?>

    <?php if($cta_button): ?>
        <a class="button expanded" <?php acf_link_attrs($cta_button) ?>>
            <?php echo $cta_button['title'] ?>
        </a>
    <?php endif; ?>

    <button class="close-button" data-close="" aria-label="Close modal" type="button">
        <span aria-hidden="true">×</span>
    </button>

    </div>
</div>
