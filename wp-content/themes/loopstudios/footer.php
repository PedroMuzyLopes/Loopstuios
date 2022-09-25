<footer>
    <div class="global-container flex">
        <nav class="navbar flex col">

            <a href="#" class="logo" title="<?= get_bloginfo('name'); ?>">
                <img src="<?= get_template_directory_uri(); ?>/src/images/logo.svg" alt="<?= get_bloginfo('name'); ?>" />
            </a>


            <?php wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'container_class' => 'footer-menu',
                'menu_class' => 'flex menu',
                'after' => '<span class="nav-indicator" />'
            )); ?>
        </nav>

        <div id="links-credits" class="flex col">
            <ul class="social-icons flex">
                <li>
                    <a href="https://www.facebook.com" target="_blank">
                        <img src="<?= get_template_directory_uri(); ?>/src/icons/icon-facebook.svg" alt="Facebook">
                    </a>
                </li>
                <li>
                    <a href="https://www.twitter.com" target="_blank">
                        <img src="<?= get_template_directory_uri(); ?>/src/icons/icon-twitter.svg" alt="Twitter">
                    </a>
                </li>
                <li>
                    <a href="https://br.pinterest.com/" target="_blank">
                        <img src="<?= get_template_directory_uri(); ?>/src/icons/icon-pinterest.svg" alt="Pinterest">
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/" target="_blank">
                        <img src="<?= get_template_directory_uri(); ?>/src/icons/icon-instagram.svg" alt="Instagram">
                    </a>
                </li>
            </ul>
            <p>© 2022 Loopstudios. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>