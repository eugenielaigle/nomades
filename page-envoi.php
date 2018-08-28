<?php
/*
*
* Template Name: Page Envoi
*
*
*/

get_header();?>

<div class="container-content">
  <div class="container-fluid container-edito edit container-cgv">
    <div class="row row-edito">
      <div class="envoi-corner">
        <!-- <div class="cgv-title">
          <h1><?php the_title(); ?></h1>
        </div> -->
        <?php $titre_gauche = get_field('titre_colonne_gauche');
        $titre_droite = get_field('titre_colonne_droite'); ?>
        <div class="cgv-space">
          <h2 class="cgv-title"><?php the_field('titre_colonne_gauche'); ?></h2>
          <?php
          if( have_rows('colonne-gauche') ):
            while ( have_rows('colonne-gauche') ) : the_row();?>
              <h3><?php the_sub_field('titre_article'); ?></h3>
              <p><?php the_sub_field('paragraphe_article'); ?></p>
            <?php endwhile;
          else :
          endif;
          ?>
        </div>
        <div class="cgv-space">
          <h2 class="cgv-title"><?php the_field('titre_colonne_droite'); ?></h2>
          <?php
          if( have_rows('colonne-droite') ):
            while ( have_rows('colonne-droite') ) : the_row();?>
              <h3><?php the_sub_field('titre_article'); ?></h3>
              <p><?php the_sub_field('paragraphe_article'); ?></p>
            <?php endwhile;
          else :
          endif;
          ?>
        </div>
      </div>
    </div>
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
