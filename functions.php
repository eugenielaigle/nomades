<?php
/*** Module de Menu WP **/

register_nav_menus(array(
  'menu-principal' => 'Menu Principal',
  'menu-footer' => 'Menu Pied de Page',
  'plan-du-site-pages' => 'Plan du site - Pages',
  'plan-du-site-rubriques' => 'Plan du site - Rubriques',
  'plan-du-site-edition' => 'Plan du site - Edition',
  'menu-mobile' => 'Menu mobile',
  'reseaux-sociaux-mobile' => 'Réseaux sociaux Footer Mobile'
));

// add_filter ('wp_nav_menu_items', 'your_custom_menu_item', 10, 2);
// function your_custom_menu_item ($items, $args) {
// if ($args->theme_location === 'menu-mobile') {
// $items.= '

// ';
// }
// return $items;
// }

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

// function wpdocs_magnific_scripts() {
//   wp_register_style('magnific-style', get_template_directory_uri().'/assets/magnificpopup/dist/magnific-popup.css', array(), true);
//   wp_enqueue_style('magnific-style');
// }
// add_action( 'wp_enqueue_scripts', 'wpdocs_magnific_scripts' );

function wpdocs_magnific_scripts() {
  wp_register_style('chocolat-style', get_template_directory_uri().'/assets/chocolat/dist/css/chocolat.css', array(), true);
  wp_enqueue_style('chocolat-style');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_magnific_scripts' );

// zoombox css
// function wpdocs_zoombox_scripts() {
//   wp_register_style('zoombox', get_template_directory_uri().'/assets/zoombox/zoombox.css', array(), true);
//   wp_enqueue_style('zoombox');
// }
// add_action( 'wp_enqueue_scripts', 'wpdocs_zoombox_scripts' );

// style.min.css
function wpdocs_select_scripts() {
  wp_register_style('select-style', get_template_directory_uri().'/assets/bootstrap-select/dist/css/bootstrap-select.min.css', array());
  wp_enqueue_style('select-style');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_select_scripts' );

function wpdocs_swiper_scripts() {
  wp_register_style('swiper-style', get_template_directory_uri().'/assets/swiper/dist/css/swiper.min.css', array());
  wp_enqueue_style('swiper-style');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_swiper_scripts' );


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

// wp_enqueue_script( 'magnific', get_template_directory_uri() . '/assets/magnificpopup/dist/jquery.magnific-popup.min.js', array('jquery'), '4.9.5', true );

wp_enqueue_script( 'chocolat', get_template_directory_uri() . '/assets/js/jquery.chocolat.js', array('jquery'), '4.9.5', true );

wp_register_script('script', get_template_directory_uri().'/assets/js/script.js', array('jquery'), '4.9.5', true);

wp_register_script('navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '4.9.5', true );

wp_register_script('swiper', get_template_directory_uri() . '/assets/swiper/dist/js/swiper.min.js', array('jquery'), '4.9.5', true );

wp_enqueue_script('script');

  wp_enqueue_script( 'bootstrap-bundle-js', get_template_directory_uri() . '/assets/bootstrap-4/js/bootstrap.bundle.min.js', array('jquery'), '4.9.5', true );

  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/bootstrap-4/js/bootstrap.min.js', array('jquery'), '4.9.5', true );

  wp_enqueue_script( 'bootstrap-select', get_template_directory_uri() . '/assets/bootstrap-select/dist/js/bootstrap-select.min.js', array('jquery'), '4.9.5', true );

  wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array('jquery'), '4.9.5', true );

  wp_enqueue_script('swiper');

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
'label' => 'Image à la une n°2 verticale',
'id' => 'secondary-image',
'post_type' => 'post'
 ) );

new MultiPostThumbnails(array(
'label' => 'Image à la une n°3 horizontale',
'id' => 'third-image',
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

function footer_right_mobile_widgets_init() {

 register_sidebar( array(

   'name' => 'Widget Mobile Footer Réseaux Sociaux',
   'id' => 'footer-right-mobile-widget-area',
   'before_widget' => '<div class="footer-right-mobile-widget">',
   'after_widget' => '</div>',
   'before_title' => '<h2 class="footer-right-mobile-title">',
   'after_title' => '</h2>',
 ) );
}

add_action( 'widgets_init', 'footer_right_mobile_widgets_init' );

function wpc_theme_support() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'wpc_theme_support' );

function recherche_widgets_init() {

 register_sidebar( array(

   'name' => 'Filtres de recherche',
   'id' => 'search-filters-widget-area',
   'before_widget' => '<div class="search-filters-widget">',
   'after_widget' => '</div>',
   'before_title' => '<h2 class="search-filters-title">',
   'after_title' => '</h2>',
 ) );
}

add_action( 'widgets_init', 'recherche_widgets_init' );

/* Yoast SEO Opengraph */
function wpc_custom_opengraph_image($thumb) {
  $post = get_queried_object();

  if (is_a($post, 'WP_Post')) {
    if (get_post_meta($post->ID, 'photo_header', true)) {
      $thumb = esc_url(get_post_meta($post->ID, 'photo_header', true));
    }
    if (get_post_meta($post->ID, 'video_header', true)) {
      $thumb = esc_url(get_post_meta($post->ID, 'video_header', true));
    }
  }

  return $thumb;
}
add_filter('wpseo_opengraph_image', 'wpc_custom_opengraph_image');


// function insert_opengraph_in_head() {

//     global $post;
//     if ( !is_singular()) // On vérifie si nous somme dans un article ou une page
//   return;

//     echo '<meta property="og:title" content="' . get_the_title() . '"/>';
//     echo '<meta property="og:type" content="article"/>';
//     echo '<meta property="og:url" content="' . get_permalink() . '"/>';
//     echo '<meta property="og:description" content="' .strip_tags(get_the_excerpt()) . '" />';
//     echo '<meta property="og:site_name" content="NOM DE MON SITE"/>';

//     $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );
//     echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
//     echo '<link rel="image_src" href="'. esc_attr( $thumbnail_src[0] ) . '" />';
// }
// add_action( 'wp_head', 'insert_opengraph_in_head', 5 );

function formulaire_de_recherche() {
    ob_start();
    get_template_part('recherche-form');
    return ob_get_clean();
}
add_shortcode( 'formulaire_de_recherche', 'formulaire_de_recherche' );




