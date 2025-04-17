<?php

$links = get_array_value($args, 'links', []);

?>

<div class="grid-container">
    <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li class="">
                        <a href="<?php echo home_url() ?>"><?php _e('Home', 'spt') ?></a>
                    </li>

                    <?php foreach ($links as $link): ?>
                        <li class="">
                            <a href="<?php echo $link['url'] ?>">
                                <?php echo $link['title'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>

                    <li>
                        <span class="show-for-sr"><?php _e('Current:', 'spt') ?></span> 
                        <?php the_title() ?>
                    </li>                    
                </ul>
            </nav>
        </div>
    </div>
</div>
