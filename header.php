<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header class="site-header">
    <div class="site-header__inner">

        <a class="site-header__logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Retour à l’accueil">
            <img
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-nathalie-mota.svg'); ?>"
                alt="Nathalie Mota"
                class="site-header__logo-img"
            >
        </a>

        <nav class="site-header__nav" aria-label="Menu principal">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'main-menu',
                    'container'      => false,
                    'menu_class'     => 'site-header__menu',
                    'fallback_cb'    => false,
                )
            );
            ?>
        </nav>

    </div>
</header>