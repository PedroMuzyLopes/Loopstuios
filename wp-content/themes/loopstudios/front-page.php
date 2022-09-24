<?php get_header(); ?>

<div class="global-container">

  <section id="info">
    <div class="photo">
      <img src="<?= get_template_directory_uri(); ?>/src/images/interactive.jpg" alt="alternative text for this image">
    </div>
    <div class="content flex col jc-center">
      <h2>The leader in interactive VR</h2>
      <p>Founded in 2011, Loopstudios has been producting world-class
        virtual reality projects for some of the best companies around the globe.
        Our award-winning creations have transformed businesses through digital experiences
        that bind to their brand.
      </p>
    </div>
  </section>

  <section id="creations">

    <div class="headline flex">
      <h2>Our Creations</h2>
      <button class="see_all">See All</button>
    </div>

    <div class="list flex">
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
  </section>

</div>

<?php get_footer(); ?>