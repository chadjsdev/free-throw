<?php

/**
 * Free Throw.
 *
 * This file adds functions to the Free Throw Child Theme
 *
 * @package      Free Throw
 * @author       Chad Singleton
 * @link         https://www.chadsingleton.com
 * @license      GPL-2.0+
 */

// Load child theme textdomain.
load_child_theme_textdomain( 'free-throw' );

add_action( 'genesis_setup', 'free_throw_setup', 15 );
/**
 * Theme setup.
 *
 * Attach all of the site-wide functions to the correct hooks and filters. All
 * the functions themselves are defined below this setup function.
 *
 * @since 1.0.0
 */
function free_throw_setup() {

    // Define theme constants.
    define( 'CHILD_THEME_NAME', 'Free Throw' );
    define( 'CHILD_THEME_URL', 'http://github.com/cjsingle/free-throw' );
    define( 'CHILD_THEME_VERSION', '1.0.0' );

    // Add HTML5 markup structure.
    add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

    // Add viewport meta tag for mobile browsers.
    add_theme_support( 'genesis-responsive-viewport' );

}

add_action( 'genesis_header', 'ft_site_logo');
/**
 * Output image before site title.
 *
 * @return string 		HTML for site logo/image.
 */
function ft_site_logo() {

    $site_logo= '<img "' . esc_attr( get_bloginfo( 'name' ) ) . ' Homepage" img src="' . get_stylesheet_directory_uri() . '/images/logo.png" class="logo" height="90" width="90" />';

    printf( '<div class="site-logo">%s</div>', $site_logo );

}

add_action( 'wp_enqueue_scripts', 'ft_enqueue_styles');
/**
 * Adds the extra necessary fonts
 *
 * @return string 		HTML for site logo/image.
 */
function ft_enqueue_styles() {
    wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Raleway:500');
    wp_enqueue_style( 'googleFonts');
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );
}

add_action( 'genesis_header_right', 'ft_site_login' );
/**
 * Adds the Raleway Google font to the website
 *
 * @return string 		HTML for site logo/image.
 */
function ft_site_login() { ?>
    <div class="header-buttons">
        <form>
            <div class="buttons-left">
                <input type="text" size="20" />
                <input type="password" size="20" />
                <input type="checkbox" size="10px"/>
            </div>
            <div class="buttons-right">
                <a href="#" id="header-sign-in">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    <div class="header-sign-in-text">Sign In</div></a>
                <a href="https://www.cpuhelpdesign.com/register" id="header-register-user">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    <div class="header-register-text">Register</div></a>
            </div>
        </form>
    </div>
    <?php
}

