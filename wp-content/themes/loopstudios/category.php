<?php get_header(); ?>

<div class="global-container">

    <section id="creations">

        <div class="headline flex">
            <h2>Creations</h2>
        </div>

        <div class="list flex" id="creations_list">
            <?php
            $category = get_the_category();
            $args = array('posts_per_page' => -1, 'category' => $category[0]->cat_id);
            $the_query = new WP_Query($args);
            ?>

            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php get_template_part('src/template-parts/creation_card') ?>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php else :  ?>
                <p><?php _e('Sorry, we didnt post any creation yet.'); ?></p>
            <?php endif; ?>
        </div>
        <button class="see_all bottom">See All</button>
    </section>

</div>

<?php get_footer(); ?>