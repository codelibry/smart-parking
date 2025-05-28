<?php

$link = get_array_value($args, 'link');
$title = get_array_value($args, 'title');
$image = get_array_value($args, 'image');
$summary = get_array_value($args, 'summary');

?>

<article class="career-card">
    <a href="<?php echo esc_url($link) ?>">
        <?php if($image): ?>
            <img 
              src="<?php echo $image ?>" 
              alt="<?php echo $title ?>" 
              style="aspect-ratio:430/170; object-fit:cover;"
            >
        <?php endif; ?>
        <h4><?php echo esc_html($title) ?></h4>
        <p class="career-card__summary"><?php echo esc_html($summary) ?></p>
        <p class="button black hollow"><?php _e('Find out more', 'spt') ?></p>
    </a>
</article>
