<?php

$title = get_field('contact-hero-secondary__title');

$col_1_title = get_field('contact-hero-secondary__col-1-title');
$col_1_button = get_field('contact-hero-secondary__col-1-button');
$col_1_description = get_field('contact-hero-secondary__col-1-description');

$col_2_title = get_field('contact-hero-secondary__col-2-title');
$col_2_button = get_field('contact-hero-secondary__col-2-button');
$col_2_description = get_field('contact-hero-secondary__col-2-description');

if(!$title) {
  return;
}

?>

<div class="relative z1">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
		
				<div class="large-12 cell hero inner-hero pt-80 flex align-center justify-center">
					<div class="hero-content text-center flex align-center justify-center direction-column">
              <h1 class="dot"><?php echo $title ?></h1>
					</div>
				</div>

				<div class="large-6 cell hero inner-hero pt-80 pb-80 flex align-center justify-center">
            <div class="hero-content text-center flex align-center justify-center direction-column">
                <?php if($col_1_title): ?>
                    <h2 class="dot"><?php echo $col_1_title ?></h2>
                <?php endif; ?>

                <?php if($col_1_description): ?>
                    <p class="lead"><?php echo $col_1_description ?></p>
                <?php endif; ?>

                <?php if($col_1_button): ?>
                    <a class="button" aria-label="Kontakt für Unternehmen" <?php acf_link_attrs($col_1_button) ?>>
                        <?php echo $col_1_button['title'] ?>
                    </a>
                <?php endif; ?>
            </div>
				</div>

				<div class="large-6 cell hero inner-hero pt-80 pb-80 flex align-center justify-center">
            <div class="hero-content text-center flex align-center justify-center direction-column">
                <?php if($col_2_title): ?>
                    <h2 class="dot"><?php echo $col_2_title ?></h2>
                <?php endif; ?>

                <?php if($col_2_description): ?>
                    <p class="lead"><?php echo $col_2_description ?></p>
                <?php endif; ?>

                <?php if($col_2_button): ?>
                    <a class="button" aria-label="Kontakt für Unternehmen" <?php acf_link_attrs($col_2_button) ?>>
                        <?php echo $col_2_button['title'] ?>
                    </a>
                <?php endif; ?>
            </div>
				</div>
			
        </div>
    </div>

    <img class="hex1" <?php img_src('hero-hexagons.svg') ?>>
    <img class="hex2" <?php img_src('hero-hexagons2.svg') ?>>
</div>
