<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name='description' content="<?php bloginfo('description'); ?>" />
    <link rel="icon" type="image/x-icon" href="<?= get_template_directory_uri(); ?>/src/icons/favicon-32x32.png">

    <!-- Custom Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alata&family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>
    <header>
        <div class="global-container flex col jc-bt">

            <nav class="navbar flex row">
                <h1 class="logo">
                    Loop Studios
                    <a href="<?= get_bloginfo('url') ?>" title="<?= get_bloginfo('name'); ?>">
                        <img src="<?= get_template_directory_uri(); ?>/src/images/logo.svg" alt="<?= get_bloginfo('name'); ?>" />
                    </a>
                </h1>

                <button id="mobile-menu-icon" base_dir="<?= get_template_directory_uri(); ?>">
                    <img src="<?= get_template_directory_uri(); ?>/src/icons/icon-hamburger.svg" alt="<?= get_bloginfo('name'); ?>" />
                </button>

                <?php wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'menu_class' => 'flex menu',
                    'after' => '<span class="nav-indicator" />'
                )); ?>
            </nav>

            <section id="board-message" class="flex ai-center">
                <h2><?= get_theme_mod('bd_board_message'); ?></h2>
            </section>
    </header>