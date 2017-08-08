<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Titan
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Fonts Import -->

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>



  <nav class="navbar navbar-default whitebg">
    <div class="container nav-nopad">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#titan-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
          </button>
          <a href="<?php echo esc_url( home_url() ); ?>">
            <img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?> Logo" style="max-width: 100px;">
          </a>
        </div>
            <?php
                wp_nav_menu( array(
                    'menu'              => 'social',
                    'theme_location'    => 'social',
                    'depth'             => 2,
                    'menu_class'        => 'nav navbar-nav social',
                    'fallback_cb'       => 'wp_page_menu',
                    'walker'            => new wp_bootstrap_navwalker())
                );
            ?>
            <?php
                wp_nav_menu( array(
                    'menu'              => 'primary',
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'titan-nav',
                    'menu_class'        => 'nav navbar-nav primary-menu',
                    'fallback_cb'       => 'wp_page_menu',
                    'walker'            => new wp_bootstrap_navwalker())
                );
            ?>
        </div>
    </nav>

    <!-- IF SEPARATE MENU IS NEEDED FOR MOBILE USE THE FOLLOWING MENU IN PLACE OF PRIMARY AND SOCIAL FOR MOBILE -->
<!--
    <?php
        // wp_nav_menu( array(
            // 'menu'              => 'mobile',
            // 'theme_location'    => 'mobile',
            // 'depth'             => 2,
            // 'container'         => 'div',
            // 'container_class'   => 'collapse navbar-collapse',
            // 'container_id'      => 'titan-nav',
            // 'menu_class'        => 'nav navbar-nav',
            // 'fallback_cb'       => 'wp_page_menu',
            // 'walker'            => new wp_bootstrap_navwalker())
        // );
    ?> -->
