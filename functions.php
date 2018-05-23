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

  wp_enqueue_script( 'inview', get_template_directory_uri() . '/assets/inview/jquery.inview.min.js', array('jquery'), '4.9.5', true );

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


function wpc_theme_support() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'wpc_theme_support' );


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

/**
Génèse des ancres
*/
// function replace_ca($matches){
//   return '<h'.$matches[1].$matches[2].' id="'.sanitize_title($matches[3]).'">'.$matches[3].'</h'.$matches[4].'>';
// }

// //Ajout d'un filtre sur le contenu
// add_filter('the_content', 'add_anchor_to_title', 12);
// function add_anchor_to_title($content){
//   if(is_singular('post')){ // s'il s'agit d'un article
//     global $post;
//     $pattern = "/<h([2-4])(.*?)>(.*?)<\/h([2-4])>/i";

//     $content = preg_replace_callback($pattern, 'replace_ca', $content);
//     return $content;
//   }else{
//     return $content;
//   }
// }

// function automenu( $echo = false ){
//   global $post;
//   $obj = '<nav id="sommaire-article">';
//   $original_content = $post->post_content;

//   $patt = "/<h([2-4])(.*?)>(.*?)<\/h([2-4])>/i";
//   preg_match_all($patt, $original_content, $results);

//   $lvl1 = 0;
//   $lvl2 = 0;
//   $lvl3 = 0;

//   foreach ($results[3] as $k=> $r) {
//     switch($results[1][$k]){
//       case 2:
//         $lvl1++;
//         $niveau = '<span class="title_lvl">'.$lvl1.'/</span>';
//         $lvl2 = 0;
//         $lvl3 = 0;
//         break;

//       case 3:
//         $lvl2++;
//         $niveau = '<span class="title_lvl">'.base_convert(($lvl2+9),10,36).'.</span>';
//         $lvl3 = 0;
//         break;

//       case 4:
//         $lvl3++;
//         $niveau = '<span class="title_lvl">'.$lvl3.')</span>';
//         break;
//     }

//     $obj .= '<a href="#'.sanitize_title($r).'" class="title_lvl'.$results[1][$k].'">'.$niveau.$r.'</a>';
//   }

//   $obj .= '</nav>';
//   if ( $echo )
//     echo $obj;
//   else
//     return $obj;
// }


// function wpc_entry_categories() {
//   echo '<span class="cat-links">';
//   foreach((get_the_category()) as $category) {
//     if ($category->category_parent  != 0) {
//       echo '<a title="' . esc_attr(strip_tags($category->name)) . '" href="' . get_category_link($category->term_id) . '">' . $category->name.'</a> ';
//     }
//   }
//   echo '</span>';
// }
