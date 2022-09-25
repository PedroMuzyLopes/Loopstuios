<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
  <article class="flex" id="<?php the_ID() ?>" style="--thumbnail:url(<?php the_field('image') ?>);">
    <h3><?php the_title(); ?></h3>
  </article>
</a>