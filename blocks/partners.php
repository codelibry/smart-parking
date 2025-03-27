<?php

$title = get_field('partners__title');

$partners = get_posts([
  'post_type' => 'partner',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'order_by' => 'date',
  'order' => 'ASC'
]);

?>

<div class="pb-100">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="xxlarge-12 text-center cell">

                <?php if ($title) : ?>
                    <h5><?php echo esc_html($title); ?></h5>
                <?php endif; ?>

                <div class="flex align-center justify-center flex-wrap logos">
                    <?php foreach ($partners as $partner): 
                        $image = get_field('partner__logo', $partner);
                        $link = get_field('partner__url', $partner);
                    ?>

                        <?php if ($image) : ?>
                            <?php if ($link) : ?>
                                <a <?php acf_link_attrs($link); ?>>
                                    <img <?php acf_image_attrs($image); ?> style="height: 72px">
                                </a>
                            <?php else : ?>
                                <img <?php acf_image_attrs($image); ?> style="height: 72px">
                            <?php endif; ?>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</div>
