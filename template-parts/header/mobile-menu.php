<?php

$header_button_1 = get_field('header-button-1', 'option');
$header_button_2 = get_field('header-button-2', 'option');

?>

<div class="reveal-overlay">
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
    >

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

    <?php if($header_button_1): ?>
        <a class="button black hollow expanded" <?php acf_link_attrs($header_button_1) ?>>
            <?php echo $header_button_1['title'] ?>
        </a>
    <?php endif; ?>

    <?php if($header_button_2): ?>
        <a class="button expanded" <?php acf_link_attrs($header_button_2) ?>>
            <?php echo $header_button_2['title'] ?>
        </a>
    <?php endif; ?>

    <button class="close-button" data-close="" aria-label="Close modal" type="button">
        <span aria-hidden="true">×</span>
    </button>

    </div>
</div>
