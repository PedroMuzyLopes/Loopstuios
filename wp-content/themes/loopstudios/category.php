<?php
    get_header(); 
?>
<div class="gird-container">
    <?php
        $categories = get_the_category();

        $args = array(
            'numberposts' => 20,
            'category' => $categories[0]->cat_ID,
            'orderby' => 'post_date',
            'order' => 'DESC',
        );

        $posts = get_posts($args);
        foreach($posts as $postItem):
        ?>
            <div class="item-category">
                <a href="<?= get_permalink($postItem->ID); ?>">
                    <div class="image-container">
                        <img class="thumbnail" src="<?= get_the_post_thumbnail_url($postItem->ID); ?>" alt="">
                    </div>
                </a>
                <div class="wrapper-content">
                    <a href="<?= get_permalink($postItem->ID); ?>">
                        <h2 class="title"><?= $postItem->post_title; ?></h2>
                    </a>
                    <p><?= $postItem->post_excerpt; ?></p>
                </div>
            </div>

        <?php
        endforeach;
    ?>
</div>
<?php get_footer(); ?>
