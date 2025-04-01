<?php

$site_logo = get_field('site-logo', 'option');
$cta_button = get_field('cta-button', 'option');

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
                    <div class="region-mobile">
                        <select id="mobile-culture-dropdown">
                            <option value="uk" selected="">UK</option>
                            <option value="de">Germany</option>
                            <option value="au">Australia</option>
                            <option value="nz">New Zealand</option>
                            <option value="dk">Denmark</option>
                        </select>
                    </div>

                    <a 
                      class="mobile-menu-trigger" 
                      data-open="exampleModal1" 
                      aria-controls="exampleModal1" 
                      aria-haspopup="dialog" 
                      tabindex="0">
                    </a>

                    <?php if($cta_button): ?>
                        <a class="button" <?php acf_link_attrs($cta_button) ?>>
                            <?php echo $cta_button['title'] ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
