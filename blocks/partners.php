<?php

$title = get_field('partners__title');
$title_tag = get_field('partners__title-tag') ? get_field('partners__title-tag') : 'h5';

$partners = get_posts([
  'post_type' => 'partner',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'order_by' => 'date',
  'order' => 'ASC',
  'suppress_filters' => false
]);

$additional_classes = get_field('partners__additional-classes');

?>

<div class="pb-100 <?php echo $additional_classes ?>">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="xxlarge-12 text-center cell">

                <?php if ($title) : ?>
                    <<?php echo $title_tag ?>><?php echo esc_html($title); ?></<?php echo $title_tag ?>>
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
