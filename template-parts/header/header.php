<?php

$site_logo = get_field('site-logo', 'option');

$header_button_1 = get_field('header-button-1', 'option');
$header_button_2 = get_field('header-button-2', 'option');

?>

<header>
    <div class="grid-container pt-30 pb-30">
        <div class="grid-x grid-margin-x">
            <div class="large-12 cell flex align-center space-between relative">
                <?php if($site_logo): ?>
                    <a class="logo" href="<?php echo home_url() ?>">
                        <img <?php acf_image_attrs($site_logo) ?>>
                    </a>
                <?php endif; ?>

                <?php wp_nav_menu([
                    'theme_location' => 'header-menu',
                    'menu_class' => 'menu',
                    'container' => false,
                ]) ?>

                <div class="cta-grouping flex align-center">
                    <?php if($header_button_1): ?>
                        <a class="button black hollow" <?php acf_link_attrs($header_button_1) ?>>
                            <?php echo $header_button_1['title'] ?>
                        </a>
                    <?php endif; ?>
              
                    <?php if($header_button_2): ?>
                        <a class="button" <?php acf_link_attrs($header_button_2) ?>>
                            <?php echo $header_button_2['title'] ?>
                        </a>
                    <?php endif; ?>

                    <?php do_action('wpml_add_language_selector'); ?>

                    <a 
                      class="mobile-menu-trigger" 
                      data-open="exampleModal1" 
                      aria-controls="exampleModal1" 
                      aria-haspopup="dialog" 
                      tabindex="0"></a>
                </div>
            </div>
        </div>
    </div>
</header>
