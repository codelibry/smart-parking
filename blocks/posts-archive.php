<?php

$posts_list = get_latest_posts(
  $post_type = 'latest', 
  $count = 6 
);

?>

<div class="pt-100 pb-100 light-grey news-block light-blue" id="news-content-start">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="xxlarge-12 mb-100 filters flex align-center justify-center cell">
                <a href="/uk/latest#news-content-start" class="button selected">All</a>
                <a href="/uk/latest?c=casestudy#news-content-start" class="button hollow">Case Study</a>            
                <a href="/uk/latest?c=news#news-content-start" class="button hollow">News</a>            
                <a href="/uk/latest?c=pressrelease#news-content-start" class="button hollow">Press Release</a>            
            </div>

            <div class="xxlarge-12 cell">
                <div class="article-grid">
                    <?php foreach ($posts_list as $post): ?>
                        <div class="column">
                            <?php
                                get_template_part('template-parts/components/post-card', null, [
                                    'link' => get_permalink($post->ID),
                                    'title' => get_the_title($post->ID),
                                    'date' => get_the_date('d M Y', $post->ID),
                                    'image' => get_the_post_thumbnail_url($post->ID),
                                    'tags' => get_the_terms($post->ID, 'latest-category'),
                                ]);
                            ?>
                        </div>
                    <?php endforeach; ?>

                    <div class="grid-x grid-padding-x filters paging pt-50 pb-50">
                        <div class="large-12 cell flex align-center justify-center">
                            <a href="/uk/latest?pageIndex=1" class="button hollow">1</a>                
                            <a href="/uk/latest?pageIndex=2" class="button hollow">2</a>                
                            <a href="/uk/latest?pageIndex=3" class="button selected">3</a>                
                            <a href="/uk/latest?pageIndex=4" class="button hollow">4</a>                
                            <a href="/uk/latest?pageIndex=5" class="button hollow">5</a>                
                            <a href="/uk/latest?pageIndex=6" class="button hollow">6</a>                
                            <a href="/uk/latest?pageIndex=7" class="button hollow">7</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
