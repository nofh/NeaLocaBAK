<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage NeaLoca
 */
?>
<!DOCTYPE html>
<!-- from ZURB -->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<!-- from WP -->
<!--[if IE 7]> <html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
            <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->

    <!-- css foundation --> 
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/foundation.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/foundation-icons/foundation-icons.css">

    <!-- css nivo ( ligthbox -clearing + gridbox de zurb bug ensemble- ) -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/js/vendor/nivo-lightbox/nivo-lightbox.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/js/vendor/nivo-lightbox/themes/default/default.css" type="text/css" />
    
    <!-- css perso -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/style.css">

    <!-- jquery de zurb utiliser aussi pour nivo ( obligatoirement avant ) -->
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/vendor/jquery.js"></script>

    <!-- js foundation -->
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/vendor/custom.modernizr.js"></script>

    <!-- js nivo-lightbox  ( pour compenser le bug de compatibilite clearing et gridbox de zurb, page d'accueil ) -->
    <script> jQuery(document).ready( function(){ $('a.gallerie').nivoLightbox(); } ); </script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/js/vendor/nivo-lightbox/nivo-lightbox.min.js"></script>

    <?php wp_head(); ?>
</head>


<body>
    <header>
    <div class="header-top">
        <div class="row">
            <div class="small-8 large-10 columns">
                <ul class="inline-list icon-contact">
                    <li> <i class="fi-telephone"><a href='<?php echo get_permalink(get_page_by_title( 'Contact' )); ?>'><?php echo get_option('tel', '0000000'); ?></a></i></li>
                    <li> <i class="fi-mail"><a href='<?php echo get_permalink(get_page_by_title( 'Contact' )); ?>'><?php echo get_option('mail', 'mail@mail.com');?></a></i></li>
                </ul>
            </div>
            <div class="small-4 large-2  columns">
                <ul class="inline-list icon-contact right">
                    <li> <i class="fi-torso-female"><a href='<?php echo get_permalink(get_page_by_title( 'Contact' )); ?>'> Contact</a></i></li>

                </ul>
            </div>
        </div>
    </div>
    <!-- HEADER LOGO MENU -->
    <nav>
    <div class="row">
        <div class="large-12 columns">
            <div class="top-bar">
                <ul class="title-area">
                <li class="name <?php echo is_front_page() ? 'current-menu-item' : ''; ?>"><a href="<?php echo get_home_url(); ?>"><img id="logo" src="http://placehold.it/150x78&text=logo"></img></a></li>
                    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                </ul>
                <section class="top-bar-section">
                    <?php wp_nav_menu(array('menu' => 'MenuNeaLoca', 'container' => '', 'container_class' => '', 'menu_class' => 'right' )); ?>
                </section>
            </div>
        </div>
    </div>
    </nav>
    </header>


