<?php

$link = get_array_value($args, 'link');
$title = get_array_value($args, 'title');
$date = get_array_value($args, 'date');
$image = get_array_value($args, 'image');
$tags = get_array_value($args, 'tags');
$summary = get_array_value($args, 'summary');
$is_sticky = get_array_value($args, 'is_sticky');

?>

<article <?php echo $is_sticky ? 'style="border:5px solid green;"' : ''; ?>>
    <a href="<?php echo esc_url($link) ?>">
        <?php if($image): ?>
            <img 
              src="<?php echo $image ?>" 
              alt="<?php echo $title ?>" 
              style="aspect-ratio:430/170; object-fit:cover;"
            >
        <?php endif; ?>
        <h4><?php echo esc_html($title) ?></h4>
        <p><?php echo esc_html($summary) ?></p>
    </a>
    <div class="article-info">
        <div class="date"><?php echo esc_html(strtoupper($date)) ?></div>
        <div class="tags">
            <?php if ($tags) : ?>
                <?php foreach ($tags as $tag) : ?>
                    <span><?php echo esc_html($tag->name) ?></span>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</article>
