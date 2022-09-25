<?php get_header(); ?>

<div class="global-container">

  <section id="info">
    <div class="photo">
      <img src="<?= get_theme_mod('photo_interactive') ?>" alt="alternative text for this image">
    </div>
    <div class="content flex col">
      <h2><?= get_theme_mod('title_interactive'); ?></h2>
      <p><?= get_theme_mod('textarea_interactive'); ?></p>
    </div>
  </section>

  <section id="creations">

    <div class="headline flex">
      <h2>Our Creations</h2>
      <button class="see_all">See All</button>
    </div>

    <div class="list flex" id="creations_list">
      <?php
      $args = array('post_type' => 'creations', 'posts_per_page' => 8);
      $the_query = new WP_Query($args);
      ?>

      <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <article title="<?php the_title(); ?>" class="flex" id="<?php the_ID() ?>" style="--thumbnail:url(<?php the_field('image') ?>);">
            <h3><?php the_title(); ?></h3>
          </article>
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