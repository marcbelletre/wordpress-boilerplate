<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="profile" href="https://gmpg.org/xfn/11" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header>
        <nav class="navbar" role="navigation" aria-label="Navigation principale">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="<?=home_url()?>">
                        <?php the_custom_logo(); ?>
                    </a>
                </div>

                <?php
                if (has_nav_menu('main')) :
                    wp_nav_menu([
                        'theme_location' => 'main',
                        'menu_class' => 'navbar-menu',
                        'depth' => 2,
                        'container' => false,
                        'items_wrap' => '<div class="%2$s">%3$s</div>',
                        'walker' => new Bulma_Nav_Walker()
                    ]);
                endif;
                ?>
            </div>
        </nav>
    </header>
