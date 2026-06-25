<footer class="site-footer">
    <nav class="site-footer__nav" aria-label="Menu du pied de page">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'footer-menu',
                'container'      => false,
                'menu_class'     => 'site-footer__menu',
                'fallback_cb'    => false,
            )
        );
        ?>
    </nav>
</footer>

<?php get_template_part('template-parts/modal-contact'); ?>


<?php wp_footer(); ?>

</body>
</html>