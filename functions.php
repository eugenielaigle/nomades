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

// style.min.css
function wpdocs_select_scripts() {
  wp_register_style('select-style', get_template_directory_uri().'/assets/bootstrap-select/dist/css/bootstrap-select.min.css', array());
  wp_enqueue_style('select-style');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_select_scripts' );


function add_js_scrollme() {
wp_enqueue_script( 'scrollme', get_template_directory_uri() . '/assets/scrollme/jquery.scrollme.min.js', array() );
}
add_action('wp_enqueue_scripts', 'add_js_scrollme');


add_action( 'wp_default_scripts', function( $scripts ) {
    if ( ! empty( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff( $scripts->registered['jquery']->deps, array( 'jquery-migrate' ) );
    }
} );

// function insert_last_jquery() {
//     if( !is_admin() ){
//         wp_deregister_script('jquery');
//         wp_register_script('jquery',"http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js", false, '');
//         wp_enqueue_script('jquery');
//    }
// }
/*** Fichiers JS ***/
function theme_js(){


// if( is_home() ):
// wp_enqueue_script( 'jquery' );
// wp_enqueue_script( 'jquery-ui-core' );
// wp_enqueue_script( 'jquery-ui-slider' );
// wp_enqueue_script( 'jquery-effects-core' );
// elseif( is_single() ):
wp_enqueue_script( 'jquery-mobile-customized-min', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'), false  );
// endif;

wp_register_script('script', get_template_directory_uri().'/assets/js/script.js', array('jquery'), '4.9.5', true);

wp_register_script('navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '4.9.5', true );

wp_enqueue_script('script');

wp_enqueue_script( 'inview', get_template_directory_uri() . '/assets/js/inview/jquery.inview.min.js', array('jquery'), '4.9.5', true );

  wp_enqueue_script( 'bootstrap-bundle-js', get_template_directory_uri() . '/assets/bootstrap-4/js/bootstrap.bundle.min.js', array('jquery'), '4.9.5', true );

  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/bootstrap-4/js/bootstrap.min.js', array('jquery'), '4.9.5', true );

  wp_enqueue_script( 'bootstrap-select', get_template_directory_uri() . '/assets/bootstrap-select/dist/js/bootstrap-select.min.js', array('jquery'), '4.9.5', true );

  wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array('jquery'), '4.9.5', true );

  wp_enqueue_script( 'basics', get_template_directory_uri() . '/assets/js/basics.js', array('jquery'), '4.9.5', true );

  wp_enqueue_script( 'navigation');

}
add_action( 'wp_footer', 'theme_js' );



// Include custom navwalker
require_once('bs4navwalker.php');

// Register WordPress nav menu
register_nav_menu('top', 'Top menu');


// Image à la une
add_theme_support( 'post-thumbnails' );

if (class_exists('MultiPostThumbnails')) {

new MultiPostThumbnails(array(
'label' => 'Deuxième Image à la une',
'id' => 'secondary-image',
'post_type' => 'post'
 ) );

 }


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


// function add_js_scripts() {
// if (is_home ()) {
//
// }
// }
// add_action('wp_enqueue_scripts', 'add_js_scripts');









