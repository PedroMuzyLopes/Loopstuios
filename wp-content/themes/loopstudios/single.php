<?php
get_header();
?>

<article class="global-container flex col" id="single_creation">
    <h1><?= get_the_title() ?></h1>
    <picture>
        <img src="<?= 'creations' === get_post_type() ? the_field('image') : get_the_post_thumbnail_url(get_the_ID()) ?>" alt="">
    </picture>
    <?php echo the_content(); ?>
</article>

<?php get_footer(); ?>