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
    define( 'CHILD_THEME_VERSION', '1.0.13' );

    // Add HTML5 markup structure.
    add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

    // Add viewport meta tag for mobile browsers.
    add_theme_support( 'genesis-responsive-viewport' );

    add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'menu-primary',
	'menu-secondary',
	'site-inner',
	'footer-widgets',
	'footer',
    ) );
}

add_action( 'genesis_header', 'ft_site_logo');
/**
 * Output image before site title.
 *
 * @return string 		HTML for site logo/image.
 */
function ft_site_logo() {

    $site_logo= '<img img src="' . get_stylesheet_directory_uri() . '/images/logo.png" class="logo" height="90" width="90" alt="' . esc_attr( get_bloginfo( 'name' ) ) . ' Homepage" />';

    printf( '<div class="site-logo"><a href="%s" title="%s">%s</a></div>', get_home_url(), get_bloginfo( 'name' ), $site_logo );

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
    <div class="login-form">
        <form name="loginform" id="loginform" action="https://www.cpuhelpdesign.com/wp-login.php" method="post">
            <table cellspacing="0" role="presentation">
                <tr>
                    <td>
                        <label for="email">Email</label></td>
                    <td><label for="pass">Password</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="log" id="user_login" class="input" value="" size="15" /></td>
                    <td><input type="password" name="pwd" id="user_pass" class="input" value="" size="15" /></td>
                    <td><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Log In" />
                        <input type="hidden" name="redirect_to" value="https://www.cpuhelpdesign.com/" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <div><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me</label></div></td>
                </tr>
            </table>
        </form>
                
    </div>
    <div class="hamburger">
        <a href="#" class="toggle-panel"><i class="fa fa-bars"></i></a>
    </div>
    <?php
}

// Filter the title with a custom function
add_filter('genesis_seo_title', 'ft_site_title' );
// Add additional custom style to site header
function ft_site_title( $title ) {
 // Change $custom_title text as you wish
 $custom_title = 'Computer <span class="custom-title">Help & Design</span>';
 // Don't change the rest of this on down
 // If we're on the front page or home page, use `h1` heading, otherwise us a `p` tag
 $tag = ( is_home() || is_front_page() ) ? 'h1' : 'p';
 // Compose link with title
 $inside = sprintf( '<a href="%s" title="%s">%s</a>', trailingslashit( home_url() ), esc_attr( get_bloginfo( 'name' ) ), $custom_title );
 // Wrap link and title in semantic markup
 $title = sprintf ( '<%s class="site-title" itemprop="headline">%s</%s>', $tag, $inside, $tag );
 return $title;
}

function ft_adding_scripts() {
    wp_register_script('scotch_panels_script', get_stylesheet_directory_uri() . '/lib/js/scotchPanels.min.js', array('jquery'),'1.1', true);
    wp_register_script('scotch_panels_script2', get_stylesheet_directory_uri() . '/lib/js/power.js', array('jquery'),'1.1', true);
    wp_enqueue_script('scotch_panels_script');
    wp_enqueue_script('scotch_panels_script2');
    
} 

add_action( 'genesis_after', 'ft_adding_scripts', 200 );

add_action( 'genesis_before_sidebar_widget_area', 'ft_scotch_panel_start' );
function ft_scotch_panel_start() { ?>
    <div id="scotch-panel">
    <?php
}

add_action( 'genesis_after_sidebar_widget_area', 'ft_scotch_panel_end' );
function ft_scotch_panel_end() { ?>
    </div>
    <?php
}
add_action( 'genesis_after_sidebar_widget_area', 'ft_scotch_panel_end', 1 );
