<?php

$title = get_field('clients__title');
$clients = get_field('clients__list');

if(empty($clients)) {
  return;
}

?>

<div class="pt-100 pb-100 mobile-section">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="xxlarge-12 text-center cell">

                <?php if ($title) : ?>
                    <h2><?php echo $title; ?></h2>
                <?php endif; ?>

                <div class="flex align-center justify-center flex-wrap logos">
                    <?php foreach ($clients as $client): 
                        $image = $client['image'];
                        $link = $client['link'];
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
