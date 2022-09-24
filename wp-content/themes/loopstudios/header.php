<!DOCTYPE html>
<html lang="pt-BR">

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
                <h1 id="logo">
                    Loop Studios
                    <a href="#" title="<?= get_bloginfo('name'); ?>">
                        <img src="<?= get_template_directory_uri(); ?>/src/images/logo.svg" alt="<?= get_bloginfo('name'); ?>" />
                    </a>
                </h1>

                <button id="mobile-menu-icon">
                    <img src="<?= get_template_directory_uri(); ?>/src/icons/icon-hamburger.svg" alt="<?= get_bloginfo('name'); ?>" />
                </button>

                <?php wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'menu_class' => 'flex menu',
                    'after' => '<span class="nav-indicator" />'
                )); ?>
            </nav>

            <section id="board-message" class="flex ai-center">
                <h2>Immersive Experiences that deliver</h2>
            </section>
    </header>

    <script>
        let oppened_menu = false;
        const base_path = './wp-content/themes/loopstudios/src/icons';
        window.addEventListener('DOMContentLoaded', () => {
            let hamburger_button = document.getElementById('mobile-menu-icon');
            let menu_list = document.querySelector('.menu-header-menu-container');
            let header = document.getElementsByTagName('header');
            let board_message = document.getElementById('board-message');
            if (hamburger_button) {
                hamburger_button.addEventListener('click', () => {
                    board_message.classList.toggle('hidden');
                    hamburger_button.childNodes[1].src = `${base_path}/${oppened_menu ?'icon-hamburger' : 'icon-close'}.svg`;
                    header[0].classList.toggle('mobile-menu')
                    document.querySelector('.menu').classList.toggle('col');
                    menu_list.classList.toggle('active')
                    oppened_menu = !oppened_menu;
                })
            }
        });
    </script>