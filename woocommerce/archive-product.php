<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

// get_header( 'shop' );

require_once 'Mobile-Detect/Mobile_Detect.php' ;
$detect = new Mobile_Detect ; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title><?php wp_title(''); ?></title>
  <?php wp_head(); ?>
</head>
<body>
  <div id="top"></div>
  <div class="container-fluid container-header">

    <?php if ( $detect -> isMobile () || $detect->isTablet() ) {?>
     <nav class="navbar navbar-expand-xl navbar-light bg-faded" id="navbar-navigation">
      <a class="xs-visible navbar-search" href="<?php the_permalink(51); ?>">
        <img class="img-responsive recherche-img" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/loupe.svg">
      </a>
      <a class="navbar-brand xs-visible" href="<?php bloginfo('url'); ?>">
        <img class="img-responsive logo" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/logo-nomades.svg">
      </a>
      <button class="navbar-special cubes" type="button" id="cubes">
        <span class="navbar-toggler-icon navbar-toggler-table-icon"></span>
      </button>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <?php
      wp_nav_menu([
        'menu'            => 'menu-mobile',
        'theme_location'  => 'menu-mobile',
        'container'       => 'div',
        'container_id'    => 'bs4navbar',
        'container_class' => 'collapse navbar-collapse',
        'menu_id'         => false,
        'menu_class'      => 'navbar-nav mr-auto',
        'depth'           => 2,
        'fallback_cb'     => 'bs4navwalker::fallback',
        'walker'          => new bs4navwalker()
      ]);?>
      <?php
      wp_nav_menu([
        'menu'            => 'secondary',
        'theme_location'  => 'menu-woocommerce-header-mobile',
        'container'       => 'div',
        'container_id'    => 'bs4navbar-secondary',
        'container_class' => 'collapse navbar-collapse secondary-menu',
        'menu_id'         => false,
        'menu_class'      => 'navbar-nav mr-auto',
        'depth'           => 2,
        'fallback_cb'     => 'bs4navwalker::fallback',
        'walker'          => new bs4navwalker()
      ]);?>
    </nav>

    <?php  }else{?>
      <nav class="navbar navbar-expand-md navbar-light bg-faded" id="navbar-navigation">
        <a class="xs-visible navbar-search" href="<?php the_permalink(51); ?>">
          <img class="img-responsive recherche-img" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/loupe.svg">
        </a>
        <a class="navbar-brand xs-visible" href="<?php bloginfo('url'); ?>">
          <img class="img-responsive logo" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/logo-nomades.svg">
        </a>
        <button class="navbar-special cubes" type="button" id="cubes">
          <span class="navbar-toggler-icon navbar-toggler-table-icon"></span>
        </button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        wp_nav_menu([
          'menu'            => 'top',
          'theme_location'  => 'top',
          'container'       => 'div',
          'container_id'    => 'bs4navbar',
          'container_class' => 'collapse navbar-collapse',
          'menu_id'         => false,
          'menu_class'      => 'navbar-nav mr-auto',
          'depth'           => 2,
          'fallback_cb'     => 'bs4navwalker::fallback',
          'walker'          => new bs4navwalker()
        ]);?>

        <?php
        wp_nav_menu([
          'menu'            => 'secondary',
          'theme_location'  => 'menu-woocommerce-header-laptop',
          'container'       => 'div',
          'container_id'    => 'bs4navbar-secondary',
          'container_class' => 'collapse navbar-collapse secondary-menu',
          'menu_id'         => false,
          'menu_class'      => 'navbar-nav mr-auto',
          'depth'           => 2,
          'fallback_cb'     => 'bs4navwalker::fallback',
          'walker'          => new bs4navwalker()
        ]);?>
      </nav>
      <?php }
      ?>



    </div>

    <aside class="sidebar-contact xs-invisible" id="contact">
      <p class="contact">Contact</p>
      <p class="nomades-prez"><span>NOMADES</span> - Magazine Numérique et Studio de Création</p>
    </aside>

    <a href="<?php the_permalink(); ?>">
      <aside class="sidebar-recherche xs-invisible" id="sidebar-modulable">
        <p class="recherche">
          <span id="counterLayout"></span> <img src="<?php bloginfo('stylesheet_directory') ?>/assets/img/ligne-185.svg"" alt=""> Edition
        </p>
      </aside>
    </a>





    <?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>

<?php if (is_shop()) :?>
  <div class="container-content container-category">
    <div class="category-header edition-header">


      <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
       <h1 class="the-category-title"><?php woocommerce_page_title(); ?></h1>
       <div class="edition-sous-titre">
         <?php the_field('sous_titre_edition', 23); ?>
       </div>
       <?php
  /**
   * Hook: woocommerce_archive_description.
   *
   * @hooked woocommerce_taxonomy_archive_description - 10
   * @hooked woocommerce_product_archive_description - 10
   */
  do_action( 'woocommerce_archive_description' );
  ?>

<?php endif;
else: ?>
  <div class="container-content container-subcategory">
    <div class="category-header edition-header">
    <?php endif; ?>



    <?php
    if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked wc_print_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

  if (is_product_category()):
    $i = 1;?>

    <?php  woocommerce_product_subcategories( $args = array('posts_per_page' => 10) );

    while ( have_posts() ) : the_post();
      // do_action( 'woocommerce_shop_loop' );


  // variables
      $queried_object = get_queried_object();
      $taxonomy = $queried_object->taxonomy;
      $term_id = $queried_object->term_id;




      if( have_rows('champ_texte_product_cat', $queried_object ) ):
        while ( have_rows('champ_texte_product_cat', $queried_object ) ) : the_row();
      // the_sub_field('titre_product_cat', $queried_object );
      // the_sub_field('paragraphe_francais_product_cat', $queried_object );

          // the_sub_field('champ_position', $queried_object);
          // echo $i;
  // load desc for this taxonomy term (term object)
          $champ_position = get_sub_field('champ_position', $queried_object);

  // load desc for this taxonomy term (term string)
          $champ_position = get_sub_field('champ_position', $taxonomy . '_' . $term_id);

          if ($i == $champ_position ):
            echo '<div class="product-count champ-texte-cat champ-texte-cat' . $champ_position .' product-' . $i .'">';?>
            <h1 class="product-cat"><?php  single_cat_title();?></h1>
            <h2 class="titre-product-cat"><?php  the_sub_field('titre_product_cat', $queried_object );?></h2>
            <p class="paragraphe-francais-product-cat"><?php  the_sub_field('paragraphe_francais_product_cat', $queried_object );?></p>
            <p class="paragraphe-anglais-product-cat"><?php  the_sub_field('paragraphe_anglais_product_cat', $queried_object );?></p>
          </div>
          <?php $i++; ?>
        <?php endif;

      endwhile;
    endif;
    echo '<div class="product-count product-' . $i .'">';
    wc_get_template_part( 'content', 'product' );
    echo'</div>';
    $i++;
  endwhile; // end of the loop.




else:
  $i = 1;

  $products_IDs = new WP_Query( array(
    'post_type' => 'product',
    'posts_per_page' => 11
  ));



  if ( wc_get_loop_prop( 'total' ) ) {
    while ($products_IDs->have_posts() ) {
     $products_IDs->the_post();
			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );


      if ($i == 11):
        echo '<div class="product-count champ-texte-edit product-' . $i .'">';?>
        <h2 class="titre-product-cat"><?php the_field('espace_de_droite_titre', 23);?></h2>
        <p class="paragraphe-francais-product-cat"><?php  the_field('espace_de_droite_texte_francais', 23);?></p>
        <p class="paragraphe-anglais-product-cat"><?php  the_field('espace_de_droite_texte_anglais', 23);?></p>
      </div>
      <?php $i++; ?>
    <?php endif;



    echo '<div class="product-count product-' . $i .'">';
    wc_get_template_part( 'content', 'product' );
    echo'</div>';
    $i++;

  }
}
woocommerce_product_loop_end();

$j = 1;
  $products_IDs_after = new WP_Query( array(
    'post_type' => 'product',
    'posts_per_page' => 12,
    'show_all' => true,
    'offset' => $i - 2

  ));

woocommerce_product_loop_start();

if ( wc_get_loop_prop( 'total' ) ) {
  while ($products_IDs_after->have_posts() ) {
   $products_IDs_after->the_post();

      /**
       * Hook: woocommerce_shop_loop.
       *
       * @hooked WC_Structured_Data::generate_product_data() - 10
       */
      do_action( 'woocommerce_shop_loop' );

    echo '<div class="product-count product-' . $i .'">';
    wc_get_template_part( 'content', 'product' );
    echo'</div>';
    $i++;

  }
}

woocommerce_product_loop_end();
$j++;

endif;

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
?>
</div>

</div>


<footer>
  <div class="container-fluid container-footer">
    <?php
    wp_nav_menu([
      'menu'            => 'secondary',
      'theme_location'  => 'menu-woocommerce-footer',
      'container'       => 'div',
      'container_id'    => 'bs4navbar-secondary-footer',
    ]);?>


    <a href="#top" class="run-to-top"></a>
    <div class="row row-footer">
      <div class="footer-brand col-md-4 xs-invisible">
        <a href="<?php bloginfo('url'); ?>">
          <!-- widget footer left area -->
          <?php if ( is_active_sidebar( 'footer-left-widget-area' ) ) : ?>
           <div id="footer-left-widget-area" class="left-footer-widget widget-area" role="complementary">
             <?php dynamic_sidebar( 'footer-left-widget-area' ); ?>
           </div>
         <?php endif; ?>
         <!-- widget footer left area -->
       </a>
        <!-- <p class="copyright">&copy; NOMADES Studio 2018</p>
          <p class="subphrase-footer">Les images et le contenu ne peuvent être utilisés sans autorisation.</p> -->
        </div>


        <div class="col-md-8 footer-right">
          <div class="newsletter-area">
            <h4 class="title-newsletter">NEWSLETTER</h4>
            <p class="sub-title-newsletter">Recevez directement par mail nos dernières publications</p>
            <button id="newsletter" class="button-newsletter">JE M'INSCRIS</button>
          </div>
          <!-- widget footer right area -->
          <?php if ( is_active_sidebar( 'footer-right-widget-area' ) ) : ?>
           <div id="footer-right-widget-area" class="right-footer-widget widget-area xs-invisible" role="complementary">
             <?php dynamic_sidebar( 'footer-right-widget-area' ); ?>
           </div>
         <?php endif; ?>
         <!-- widget footer right area -->
       </div>
       <!-- widget footer right mobile area -->
       <?php if ( is_active_sidebar( 'footer-right-mobile-widget-area' ) ) : ?>
         <div id="footer-right-mobile-widget-area" class="right-footer-mobile-widget widget-area xs-visible" role="complementary">
           <?php dynamic_sidebar( 'footer-right-mobile-widget-area' ); ?>
         </div>
       <?php endif; ?>
       <!-- widget footer right mobile area -->
       <div class="footer-brand col-md-4 xs-visible">
        <a href="<?php bloginfo('url'); ?>">
          <!-- widget footer left area -->
          <?php if ( is_active_sidebar( 'footer-left-widget-area' ) ) : ?>
           <div id="footer-left-widget-area" class="left-footer-widget widget-area" role="complementary">
             <?php dynamic_sidebar( 'footer-left-widget-area' ); ?>
           </div>
         <?php endif; ?>
         <!-- widget footer left area -->
       </a>
        <!-- <p class="copyright">&copy; NOMADES Studio 2018</p>
          <p class="subphrase-footer">Les images et le contenu ne peuvent être utilisés sans autorisation.</p> -->
        </div>
      </div>
    </div>
  </footer>


  <?php wp_footer(); ?>
</div>
</body>
</html>

