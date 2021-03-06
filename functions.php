<?php
/*** Module de Menu WP **/
register_nav_menus(array(
  'menu-principal' => 'Menu Principal',
  'menu-footer' => 'Menu Pied de Page',
  'plan-du-site-pages' => 'Plan du site - Pages',
  'plan-du-site-rubriques' => 'Plan du site - Rubriques',
  'plan-du-site-edition' => 'Plan du site - Edition',
  'menu-mobile' => 'Menu mobile',
  'reseaux-sociaux-mobile' => 'Réseaux sociaux Footer Mobile',
  'menu-woocommerce-header-laptop' => 'Menu Woocommerce Header',
  'menu-woocommerce-header-mobile' => 'Menu Woocommerce Header Mobile',
  'menu-woocommerce-footer' => 'Menu Woocommerce Footer'
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

  wp_enqueue_script( 'basics', get_template_directory_uri() . '/assets/js/basics.js', array('jquery'), '4.9.6', true );

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

// COMPATIBLE WOOCOMMERCE

function mytheme_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );



add_action('wp_head','my_analytics', 20);

function my_analytics() {
 ?>
 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-85103120-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-85103120-2');
</script>


<?php
 }


 add_filter( 'single_product_archive_thumbnail_size', function( $size ) {
return 'full';
} );

 // Utiliser les variables pour le format des prix WC 2.0
add_filter( 'woocommerce_variable_sale_price_html', 'wc_wc20_variation_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'wc_wc20_variation_price_format', 10, 2 );
function wc_wc20_variation_price_format( $price, $product ) {
$min_price = $product->get_variation_price( 'min', true );
$max_price = $product->get_variation_price( 'max', true );
if ($min_price != $max_price){
$price = sprintf( __( 'A PARTIR DE %1$s', 'woocommerce' ), wc_price( $min_price ) );
return $price;
} else {
$price = sprintf( __( '%1$s', 'woocommerce' ), wc_price( $min_price ) );
return $price;
}
}


/**
 * Résumé du panier Woocommerce
 */
if( ! function_exists( 'jst_cart_summary' ) )
{
  function jst_cart_summary()
  {
    $cart_link = '<div class="jst-cart-header">' .
      '<span class="amount">' .wp_kses_data( WC()->cart->get_cart_subtotal() ). '</span>' .
      '<span class="">' . wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'jst' ), WC()->cart->get_cart_contents_count() ) ) . '</span>' .
      '</div>';
    echo $cart_link;
  }
}



/* Indiquer la rupture de stock */

add_action( 'woocommerce_before_shop_loop_item_title', 'wpm_display_sold_out_loop_woocommerce' );// On l'affiche sur la page boutique
add_action( 'woocommerce_single_product_summary', 'wpm_display_sold_out_loop_woocommerce' );// On l'affiche sur la page du produit seul


function wpm_display_sold_out_loop_woocommerce() {
    global $product;
  //Si le produit est en rupture de stock, on affiche :
    if ( !$product->is_in_stock() ) {
        echo '<p class="soldout">' . __( 'Produit victime de son succès', 'woocommerce' ) . '</p>';
    }
}


//* Panier dans le menu
/**
* Place a cart icon with number of items and total cost in the menu bar.
*
* Source: http://wordpress.org/plugins/woocommerce-menu-bar-cart/
*/
add_filter('wp_nav_menu_items','sk_wcmenucart', 10, 2);
function sk_wcmenucart($menu, $args) {
// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'menu-woocommerce-header-laptop' !== $args->theme_location && 'menu-woocommerce-header-mobile' !== $args->theme_location)
return $menu;

ob_start();
global $woocommerce;
$viewing_cart = __('View your shopping cart', 'nomades');
$start_shopping = __('Start shopping', 'nomades');
$cart_url = wc_get_cart_url();
$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
$cart_contents_count = $woocommerce->cart->cart_contents_count;
$cart_contents = sprintf(_n('%d', '%d', $cart_contents_count, 'nomades'), $cart_contents_count);
$cart_total = $woocommerce->cart->get_cart_total();
// Uncomment the line below to hide nav menu cart item when there are no items in the cart
// if ( $cart_contents_count > 0 ) {
if ($cart_contents_count == 0) {
$menu_item = '<li class="cart-menu menu-item menu-item-type-taxonomy menu-item-object-product_cat nav-item" ><a class="wcmenucart-contents nav-link"  href="'. $shop_page_url .'"  title="'. $start_shopping .'" >';
} else {
$menu_item = '<li class="cart-menu menu-item menu-item-type-taxonomy menu-item-object-product_cat nav-item" ><a class="wcmenucart-contents nav-link"  href="'. $cart_url .'""  title="'. $viewing_cart .'" >';
}
// $menu_item .= '<i class="fa fa-shopping-cart" ></i> ';
$menu_item .= 'Panier (' . $cart_contents . ')';
$menu_item .= '</a></li>';
// Uncomment the line below to hide nav menu cart item when there are no items in the cart
// }
echo $menu_item;
$social = ob_get_clean();
return $menu . $social;
}


add_filter('wp_nav_menu_items','sk_wcmenucart', 10, 2);
function sk_wcmenucart_mobile($menu, $args) {
// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'menu-woocommerce-header-mobile' !== $args->theme_location )
return $menu;

ob_start();
global $woocommerce;
$viewing_cart = __('View your shopping cart', 'nomades');
$start_shopping = __('Start shopping', 'nomades');
$cart_url = wc_get_cart_url();
$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
$cart_contents_count = $woocommerce->cart->cart_contents_count;
$cart_contents = sprintf(_n('%d', '%d', $cart_contents_count, 'nomades'), $cart_contents_count);
$cart_total = $woocommerce->cart->get_cart_total();
// Uncomment the line below to hide nav menu cart item when there are no items in the cart
// if ( $cart_contents_count > 0 ) {
if ($cart_contents_count == 0) {
$menu_item = '<li class="cart-menu menu-item menu-item-type-taxonomy menu-item-object-product_cat nav-item" ><a class="wcmenucart-contents nav-link"  href="'. $shop_page_url .'"  title="'. $start_shopping .'" >';
} else {
$menu_item = '<li class="cart-menu menu-item menu-item-type-taxonomy menu-item-object-product_cat nav-item" ><a class="wcmenucart-contents nav-link"  href="'. $cart_url .'""  title="'. $viewing_cart .'" >';
}
// $menu_item .= '<i class="fa fa-shopping-cart" ></i> ';
$menu_item .= 'Panier (' . $cart_contents . ')';
$menu_item .= '</a></li>';
// Uncomment the line below to hide nav menu cart item when there are no items in the cart
// }
echo $menu_item;
$social = ob_get_clean();
return $menu . $social;
}

 add_filter( 'loop_shop_per_page', function ( $cols ) { return - 1; } );




 function shuffle_variable_product_elements(){
    if ( is_product() ) {
        global $post;
        $product = wc_get_product( $post->ID );
        if ( $product->is_type( 'variable' ) ) {
          remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
            remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
            add_action( 'woocommerce_before_variations_form', 'woocommerce_single_variation', 20 );



            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
            add_action( 'woocommerce_before_variations_form', 'woocommerce_template_single_title', 10 );

            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
            add_action( 'woocommerce_before_variations_form', 'woocommerce_template_single_excerpt', 30 );
        }
    }
}
add_action( 'woocommerce_before_single_product', 'shuffle_variable_product_elements' );

