<?php
/*** Module de Menu WP **/

register_nav_menus(array(
  'menu-principal' => 'Menu Principal',
  'menu-footer' => 'Menu Pied de Page'
));


/*** Fichiers CSS ***/

// Style.css
function wpdocs_main_scripts() {
    wp_register_style('main-style', get_template_directory_uri().'/style.css', array(), true);
    wp_enqueue_style('main-style');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_main_scripts' );

// style.min.css
function wpdocs_min_scripts() {
    wp_register_style('scss-style', get_template_directory_uri().'/assets/css/style.min.css', array());
    wp_enqueue_style('scss-style');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_min_scripts' );

function wpdocs_bootstrap_scripts() {
wp_register_style('bootstrap-style', get_template_directory_uri().'/assets/bootstrap-4/css/bootstrap.min.css', array(), true);
 wp_enqueue_style('bootstrap-style');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_bootstrap_scripts' );


/*** Fichiers JS ***/
function theme_js(){

  wp_enqueue_script( 'jquery-mobile-customized-min', get_template_directory_uri() . '/assets/js/jquery.min.js', array() );

  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/bootstrap-4/js/bootstrap.min.js', array('jquery'), '20180426', true );

  wp_enqueue_script( 'basics', get_template_directory_uri() . '/assets/js/basics.js', array() );

  wp_enqueue_script( 'navigation', get_template_directory_uri() . '/assets/js/navigation.js', array() );
}
add_action( 'wp_footer', 'theme_js' );

// Include custom navwalker
require_once('bs4navwalker.php');

// Register WordPress nav menu
register_nav_menu('top', 'Top menu');

function footer_left_widgets_init() {

 register_sidebar( array(

 'name' => 'Widget Footer Gauche',
 'id' => 'footer-left-widget-area',
 'before_widget' => '<div class="footer-left-widget">',
 'after_widget' => '</div>',
 'before_title' => '<h2 class="footer-left-title">',
 'after_title' => '</h2>',
 ) );
}

add_action( 'widgets_init', 'footer_left_widgets_init' );

function footer_right_widgets_init() {

 register_sidebar( array(

 'name' => 'Widget Footer Droite',
 'id' => 'footer-right-widget-area',
 'before_widget' => '<div class="footer-right-widget">',
 'after_widget' => '</div>',
 'before_title' => '<h2 class="footer-right-title">',
 'after_title' => '</h2>',
 ) );
}

add_action( 'widgets_init', 'footer_right_widgets_init' );


