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

function wpdocs_magnific_scripts() {
  wp_register_style('chocolat-style', get_template_directory_uri().'/assets/chocolat/dist/css/chocolat.css', array(), true);
  wp_enqueue_style('chocolat-style');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_magnific_scripts' );

// style.min.css
// function wpdocs_select_scripts() {
//   wp_register_style('select-style', get_template_directory_uri().'/assets/bootstrap-select/dist/css/bootstrap-select.min.css', array());
//   wp_enqueue_style('select-style');
// }
// add_action( 'wp_enqueue_scripts', 'wpdocs_select_scripts' );

function wpdocs_swiper_scripts() {
  wp_register_style('swiper-style', get_template_directory_uri().'/assets/swiper/dist/css/swiper.min.css', array());
  wp_enqueue_style('swiper-style');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_swiper_scripts' );

// function add_js_scrollme() {
//   wp_enqueue_script( 'scrollme', get_template_directory_uri() . '/assets/scrollme/jquery.scrollme.min.js', array() );
// }
// add_action('wp_enqueue_scripts', 'add_js_scrollme');



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

  wp_enqueue_script( 'jquery-mobile-customized-min', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'), false  );

  wp_register_script('recherche-form', get_template_directory_uri().'/assets/js/recherche.js', array('jquery'), '4.9.6', true);
  if( is_page('recherche') ):
    wp_enqueue_script('recherche-form');
  endif;



  wp_register_script('inview', get_template_directory_uri().'/assets/inview/jquery.inview.min.js', array('jquery'), '4.9.6', true);
  wp_register_script('counter', get_template_directory_uri().'/assets/js/counter.js', array('jquery'), '4.9.6', true);
  if( is_single() ):
    wp_enqueue_script('inview');
    wp_enqueue_script('counter');
  endif;

  wp_register_script('cubes', get_template_directory_uri().'/assets/js/cubes.js', array('jquery'), '4.9.6', true);
  if( is_category() ):
    wp_enqueue_script('inview');
    wp_enqueue_script('cubes');
  endif;

  wp_register_script('edito', get_template_directory_uri().'/assets/js/edito.js', array('jquery'), '4.9.6', true);
  if( is_page('edito') ):
    wp_enqueue_script('inview');
    wp_enqueue_script('edito');
  endif;

  wp_enqueue_script('inview');
  wp_enqueue_script( 'chocolat', get_template_directory_uri() . '/assets/js/jquery.chocolat.js', array('jquery'), '4.9.6', true );

  wp_register_script('script', get_template_directory_uri().'/assets/js/script.js', array('jquery'), '4.9.6', true);

  wp_register_script('navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '4.9.6', true );

  wp_register_script('swiper', get_template_directory_uri() . '/assets/swiper/dist/js/swiper.min.js', array('jquery'), '4.9.6', true );

  wp_enqueue_script('script');

  wp_register_script('home', get_template_directory_uri() . '/assets/js/home.js', array('jquery'), '4.9.6', true );

  if( is_front_page() ):
    wp_enqueue_script('home');
  endif;

  wp_enqueue_script( 'bootstrap-bundle-js', get_template_directory_uri() . '/assets/bootstrap-4/js/bootstrap.bundle.min.js', array('jquery'), '4.9.6', true );

  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/bootstrap-4/js/bootstrap.min.js', array('jquery'), '4.9.6', true );

  // wp_enqueue_script( 'bootstrap-select', get_template_directory_uri() . '/assets/bootstrap-select/dist/js/bootstrap-select.min.js', array('jquery'), '4.9.6', true );

  wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array('jquery'), '4.9.6', true );

  wp_enqueue_script('swiper');

  wp_enqueue_script( 'basics', get_template_directory_uri() . '/assets/js/basics.js', array('jquery'), '4.9.6', false );

  wp_enqueue_script( 'navigation');

}
add_action( 'wp_footer', 'theme_js' );


// CONTACT FORM 7 - ENVOYER COPIE - CHOIX
add_filter( 'wpcf7_additional_mail', 'my3_wpcf7_additional_mail', 10, 2 );
function my3_wpcf7_additional_mail( array $mails, WPCF7_ContactForm $form ) {
  $opts = $form->additional_setting( 'send_email_copy' );
  if ( empty( $opts[0] ) ) {
    return $mails;
  }

  /*
   * $opts[0] = Name of the checkbox field.
   * $opts[1] = Name of the user's email field.
   * $opts[2] = Name of the email template.
   */
  $opts = explode( '|', $opts[0] );
  if ( count( $opts ) < 3 ) {
    return $mails;
  }

  // Check if we're using a valid Mail template.
  if ( ( 'mail' !== $opts[2] )
    && ( 'mail_2' !== $opts[2] ) ) {
    return $mails;
}

$submission = WPCF7_Submission::get_instance();

  // The user may not want a copy of the email.
$values = $submission->get_posted_data( $opts[0] );
if ( ! is_array( $values ) || empty( $values[0] ) ) {
  return $mails;
}

  // The address to be sent a copy of the email.
$email = $submission->get_posted_data( $opts[1] );
if ( ! wpcf7_is_email( $email ) ) {
  return $mails;
}

$mail = $form->prop( $opts[2] );
if ( $mail && is_array( $mail ) ) {
  $mail['recipient'] = $email;
  $mails[ $opts[2] . '_copy' ] = $mail;
}

return $mails;
}



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


// WIDGETS
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



// RECHERCHE
function formulaire_de_recherche() {
  ob_start();
  get_template_part('recherche-form');
  return ob_get_clean();
}
add_shortcode( 'formulaire_de_recherche', 'formulaire_de_recherche' );


// FILTRES DE RECHERCHE
add_filter('pre_get_posts','custom_search_filter');

function custom_search_filter($query) {

   // Si on est entrain de faire une recherche
 if ($query->is_search) {

  $query->set('post_type', 'post');
  if (isset($_GET['choix'])){
    switch($_GET['choix']) {
      case 'destination':
      $query->set( 'category_name', 'destinations' );
      break;

      case 'rencontre':
      $query->set( 'category_name','rencontres' );
      break;

      case 'retrospective':
      $query->set( 'category_name','retrospectives' );
      break;

      case 'studio':
      $query->set( 'category_name','studio' );
      break;
    }
  }
}
return $query;
}




