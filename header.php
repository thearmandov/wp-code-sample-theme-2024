<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset') ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class() ?>>
        <header class="site-header">
            <!-- Navigation Menu -->
            <nav id="primary-menu" class="site-navigation">
                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                <?php wp_nav_menu(array(
                    'theme_location' => 'main-nav',
                    'menu-class' => 'menu'
                )); ?>
            </nav>
        </header>
