<section id="creations">

  <div class="headline flex">
    <h2>Our Creations</h2>
    <button class="see_all" onclick="window.location.href='<?= get_bloginfo('url') ?>/creations#creations';">See All</button>
  </div>

  <div class="list flex" id="creations_list">
    <?php
    $args = array('post_type' => 'creations', 'posts_per_page' => 8);
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
  <button class="see_all bottom" onclick="window.location.href='<?= get_bloginfo('url') ?>/creations#creations';">See All</button>
</section>