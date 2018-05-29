<?php get_search_form(); ?>
<div class="filtres">
  <h4>FILTRES</h4>
<!-- widget footer left area -->
          <?php if ( is_active_sidebar( 'search-filters-widget-area' ) ) : ?>
           <div id="search-filters-widget-area" class="search-filters-widget widget-area" role="complementary">
             <?php dynamic_sidebar( 'search-filters-widget-area' ); ?>
           </div>
         <?php endif; ?>
         <!-- widget footer left area -->

</div>

