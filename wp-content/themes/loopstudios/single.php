<?php
    get_header(); 
?>
<div class="gird-container">
    <h1><?=get_the_title()?></h1>
    <picture>
        <!-- <source media="(min-width: )" srcset="" sizes=""> -->
        <!-- <source media="(min-width: )" srcset="" sizes=""> -->
        <img src="<?= get_the_post_thumbnail_url(get_the_ID()) ?>" alt="">
    </picture>
    <?php echo the_content(); ?>
</div>
<?php get_footer(); ?>
