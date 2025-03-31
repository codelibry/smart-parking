<header>
    <div class="grid-container pt-30 pb-30">
        <div class="grid-x grid-margin-x">
            <div class="large-12 cell flex align-center space-between relative">
                <a class="logo" href="/uk"><img src="/media/2uhb0ibr/logo.svg" alt="Smart Parking"></a>

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
                    <a class="mobile-menu-trigger" data-open="exampleModal1" aria-controls="exampleModal1" aria-haspopup="dialog" tabindex="0"></a>
                    <a href="/uk/pay-a-parking-charge" class="button">Pay / Appeal Parking Charge</a>
      <div class="region" id="cultures-region">
                        <select id="culture-dropdown">
                            <option value="uk" selected="">UK</option>
                            <option value="de">Germany</option>
                            <option value="au">Australia</option>
                            <option value="nz">New Zealand</option>
                            <option value="dk">Denmark</option>
                        </select>
                    <div class="select-selected"><img src="/img/flags/flag-uk.png" alt="UK">UK</div><div class="select-items select-hide"><div><img src="/img/flags/flag-uk.png" alt="UK">UK</div><div><img src="/img/flags/flag-germany.png" alt="Germany">Germany</div><div><img src="/img/flags/flag-australia.png" alt="Australia">Australia</div><div><img src="/img/flags/flag-newzealand.png" alt="New Zealand">New Zealand</div><div><img src="/img/flags/flag-denmark.png" alt="Denmark">Denmark</div></div></div>
                </div>

            </div>
        </div>
    </div>
</header>
