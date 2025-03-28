<?php

$menus = [
    'industries' => [
        'title' => __('Industries', 'spt'),
        'menu' => wp_nav_menu([
            'theme_location' => 'footer-menu-1',
            'echo' => false,
        ])
    ],
    'our-systems' => [
        'title' => __('Our Systems', 'spt'),
        'menu' => wp_nav_menu([
            'theme_location' => 'footer-menu-2',
            'echo' => false,
        ])
    ],
    'the-company' => [
        'title' => __('The Company', 'spt'),
        'menu' => wp_nav_menu([
            'theme_location' => 'footer-menu-3',
            'echo' => false,
        ])
    ],
];

$policy_menu = wp_nav_menu([
    'theme_location' => 'footer-menu-bottom',
    'echo' => false,
]);

$button_1 = ['title' => 'Pay / Appeal Parking Charge', 'url' => '#', 'target' => '_self'];
$button_2 = null;

$linkedin_link = ['title' => 'Pay / Appeal Parking Charge', 'url' => '#', 'target' => '_self'];

$legal_info = "
  Smart Parking Ltd is registered in Scotland, registered number SC138255. <br>
  The ultimate parent company in the UK is Smart Parking (UK) Limited, also registered in the UK registered number SC413479. <br>
  Our registration address is 5, South Inch Business Centre, Perth, Perthshire, Scotland, PH2 8BW. <br>
  Company V.A.T Reg. No 607582041
";

$copyright = "Copyright Smart Parking 2023";

?>

<footer>
    <div class="grid-container pt-100 pb-50">
        <div class="grid-x grid-margin-x pb-80">

            <div class="large-4 medium-12 cell">
                <h6 class="nav-multi-col__heading"><?php echo $menus['industries']['title']; ?></h6>
                <?php echo $menus['industries']['menu']; ?>
            </div>

            <div class="large-3 large-offset-1 medium-6 small-offset-0 cell">
                <h6><?php echo $menus['our-systems']['title']; ?></h6>
                <?php echo $menus['our-systems']['menu']; ?>
            </div>

            <div class="large-2 medium-6 cell">
                <h6><?php echo $menus['the-company']['title']; ?></h6>
                <?php echo $menus['the-company']['menu']; ?>
            </div>

            <div class="large-2 flex direction-column cell">
                <?php if ($button_1) : ?>
                    <a <?php acf_link_attrs($button_1); ?> class="button mb-15">
                        <?php echo esc_html($button_1['title']); ?>
                    </a>
                <?php endif; ?>
                <?php if ($button_2) : ?>
                    <a <?php acf_link_attrs($button_2); ?> class="button black hollow">
                        <?php echo esc_html($button_2['title']); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="grid-x grid-margin-x pb-50 text-center">
            <div class="large-12 cell">
                <small>
                    <?php echo wp_kses_post($legal_info); ?>
                </small>
            </div>
        </div>


        <?php if ($linkedin_link) : ?>
            <div class="grid-x grid-margin-x pb-30">
                <div class="large-12 flex align-right bottom-footer cell">
                    <a <?php acf_link_attrs($linkedin_link) ?> class="social footer-outer-sociallink">
                        <img <?php img_src('LinkedIn.png') ?> class="linkedin-link" alt="LinkedIn">
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <div class="grid-x grid-margin-x pb-30">
            <div class="large-12 flex space-between align-center bottom-footer cell">
                <small class="copyright">
                    <?php echo $copyright ?>
                </small>
                <div class="secondary-links">
                    <?php echo $policy_menu ?>
                </div>
            </div>
        </div>
    </div>
</footer>

