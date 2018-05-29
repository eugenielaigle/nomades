
<footer>
  <div class="container-fluid container-footer">
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
</body>
</html>
