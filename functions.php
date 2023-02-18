<?php
/**
 * Moina Plus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Moina Plus
 */

if ( ! defined( 'MOINA_PLUS_VERSION' ) ) {
	$moina_plus_theme = wp_get_theme();
	define( 'MOINA_PLUS_VERSION', $moina_plus_theme->get( 'Version' ) );
}


/**
 * Enqueue scripts and styles.
 */
function moina_plus_scripts() {
    wp_enqueue_style( 'moina-plus-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','slicknav','moina-default-block','moina-style'), '', 'all');
    wp_enqueue_style( 'moina-plus-main-style',get_stylesheet_directory_uri() . '/assets/css/main-style.css',array(), MOINA_PLUS_VERSION, 'all');
    wp_enqueue_script( 'masonry', get_stylesheet_directory_uri() . '/assets/js/masonry.pkgd.min.js',array('jquery'), MOINA_PLUS_VERSION, true );
    wp_enqueue_script( 'moina-plus-main-js', get_stylesheet_directory_uri() . '/assets/js/moina-plus-main.js',array('jquery','moina-script'), MOINA_PLUS_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'moina_plus_scripts' );

/**
 * Custom excerpt length.
 */
function moina_plus_excerpt_length( $length ) {
    if ( is_admin() ) return $length;
    return 19;
}
add_filter( 'excerpt_length', 'moina_plus_excerpt_length', 999 );

/**
 * Custom excerpt More.
 */
function moina_plus_excerpt_more( $more ) {
    if ( is_admin() ) return $more;
    return '.';
}
add_filter( 'excerpt_more', 'moina_plus_excerpt_more' );