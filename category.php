<?php  require_once 'Mobile-Detect/Mobile_Detect.php' ;
$detect = new Mobile_Detect ; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
  </nav>
<?php }
?>


</div>

  <aside class="sidebar-contact xs-invisible" id="contact">
    <p class="contact">Contact</p>
    <p class="nomades-prez"><span>NOMADES</span> - Magazine Numérique et Studio de Création</p>
  </aside>

<a href="<?php the_permalink(); ?>">
    <aside class="sidebar-recherche xs-invisible" id="sidebar-special">
    <p class="recherche">
      <img src="<?php bloginfo('stylesheet_directory') ?>/assets/img/ligne-185.svg"" alt="">
      <?php if (is_category ('destinations') || is_category('destination') || is_category('rencontres') || is_category('rencontre') || is_category('retrospectives') || is_category('retrospective')):
        foreach((get_the_category()) as $childcat) {
      $parentcat = $childcat->category_parent;
      if( $parentcat != 0) echo '' .get_cat_name($parentcat);}
      elseif (is_category ('studio')):?>
        Studio
      <?php endif;?>
    </p>
  </aside>
</a>

<!-- END HEADER -->

<?php

$category = get_the_category();
$mycat = $category[0]->cat_name;
$mycat2 = get_cat_id($mycat);?>

<div class="container-content container-cubes container-category">
  <div class="category-header">

    <!-- CATEGORIE DESTINATIONS -->
    <?php if (is_category ('destinations') || is_category('destination')):?>
    <h1 class="the-category-title"><?php
    foreach((get_the_category()) as $childcat) {
      $parentcat = $childcat->category_parent;
      if( $parentcat != 0 ) echo '' .get_cat_name($parentcat);}?></h1>
      <?php echo category_description(); ?>
    </div>
    <div class="categ categ-without-cubes" id="categories">
      <?php
      $query = new WP_Query( array( 'category_name' => 'destination','order'=> 'desc', 'orderby' => 'date', 'posts_per_page' => -1) );


      if ( $query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); /* start the loop */

          ?>
          <article class="category-area">
            <div class="row-category">
              <div class="thumbnail-category">
                <a href="<?php the_permalink();?>">
                  <?php the_post_thumbnail(); ?>
                </a>
                <div class="title-and-sentence-left no-padding">
                  <div class="category-and-date">
                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                  </div>
                  <a href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end thumbnail-category -->
              <div class="right-part-category-vertical">
                <div class="thumbnail-right xs-invisible">
                  <a href="<?php the_permalink();?>">
                    <?php if (class_exists('MultiPostThumbnails')) :
                      MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
                    endif;?>
                  </a>
                </div>
                <div class="title-and-sentence no-padding">
                  <div class="category-and-date">
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                  </div>
                  <a class="link-thumb" href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end right-part-category -->
              <div class="right-part-category-horizontal first-part-horizontal">
                <div class="thumbnail-right xs-invisible">
                  <a href="<?php the_permalink();?>">
                    <?php if (class_exists('MultiPostThumbnails')) :
                      MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'third-image');
                    endif;?>
                  </a>
                </div>
                <div class="title-and-sentence no-padding">
                  <div class="category-and-date">
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                  </div>
                  <a class="link-thumb" href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end right-part-category first part-->


              <!-- Third part start -->
              <div class="right-part-category-horizontal third-part-horizontal">
                <div class="thumbnail-right xs-invisible">
                  <a href="<?php the_permalink();?>">
                    <?php if (class_exists('MultiPostThumbnails')) :
                      MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'third-image');
                    endif;?>
                  </a>
                </div>
                <div class="title-and-sentence no-padding">
                  <div class="category-and-date">
                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                  </div>
                  <a class="link-thumb" href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end right-part-category third-part -->




            </div> <!-- end row -->
            <div class="row-bottom">
              <div class="title-and-sentence-bottom no-padding">
                <div class="category-and-date">
                  <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                  <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                </div>
                <a href="<?php the_permalink();?>">
                  <div class="article-title">
                    <?php
                    $titre = get_field('titre_de_larticle');
                    if ($titre):?>
                      <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                    <?php endif; ?>
                  </div>
                </a>
                <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
              </div>
            </div>
          </article><!--  end category-area -->

          <?php
        endwhile;
        wp_reset_postdata();
      endif;?>
    </div>


    <!-- CATEGORIE RENCONTRES -->

    <?php elseif (is_category ('rencontres') || is_category('rencontre')):?>
    <h1 class="the-category-title"><?php
    foreach((get_the_category()) as $childcat) {
      $parentcat = $childcat->category_parent;
      if( $parentcat != 0 ) echo '' .get_cat_name($parentcat);}?></h1>
      <p><?php echo category_description(); ?></p>
    </div>
    <div class="categ" id="categories">
      <?php
      $query = new WP_Query( array( 'category_name' => 'rencontre','order'=> 'desc', 'orderby' => 'date', 'posts_per_page' => -1) );


      if ( $query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); /* start the loop */?>
          <article class="category-area">
            <div class="row-category">
              <div class="thumbnail-category">
                <a href="<?php the_permalink();?>">
                  <?php the_post_thumbnail(); ?>
                </a>
                <div class="title-and-sentence-left no-padding">
                  <div class="category-and-date">

                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                  </div>
                  <a href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end thumbnail-category -->
              <div class="right-part-category-vertical">
                <div class="thumbnail-right xs-invisible">
                  <a href="<?php the_permalink();?>">
                    <?php if (class_exists('MultiPostThumbnails')) :
                      MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
                    endif;?>
                  </a>
                </div>
                <div class="title-and-sentence no-padding">
                  <div class="category-and-date">
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                  </div>
                  <a class="link-thumb" href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end right-part-category -->


              <div class="right-part-category-horizontal first-part-horizontal">
                <div class="thumbnail-right xs-invisible">
                  <a href="<?php the_permalink();?>">
                    <?php if (class_exists('MultiPostThumbnails')) :
                      MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'third-image');
                    endif;?>
                  </a>
                </div>
                <div class="title-and-sentence no-padding">
                  <div class="category-and-date">
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                  </div>
                  <a class="link-thumb" href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end right-part-category -->
              <!-- Third part start -->
              <div class="right-part-category-horizontal third-part-horizontal">
                <div class="thumbnail-right xs-invisible">
                  <a href="<?php the_permalink();?>">
                    <?php if (class_exists('MultiPostThumbnails')) :
                      MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'third-image');
                    endif;?>
                  </a>
                </div>
                <div class="title-and-sentence no-padding">
                  <div class="category-and-date">
                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                  </div>
                  <a class="link-thumb" href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end right-part-category third-part -->
            </div> <!-- end row -->
            <div class="row-bottom">
              <div class="title-and-sentence-bottom no-padding">
                <div class="category-and-date">
                  <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                  <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                </div>
                <a href="<?php the_permalink();?>">
                  <div class="article-title">
                    <?php
                    $titre = get_field('titre_de_larticle');
                    if ($titre):?>
                      <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                    <?php endif; ?>
                  </div>
                </a>
                <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
              </div>
            </div>
          </article><!--  end category-area -->

          <?php
        endwhile;
        wp_reset_postdata();
      endif;?>
    </div>

    <!-- CATEGORIE RETROSPECTIVES -->
    <?php elseif (is_category ('retrospectives') || is_category('retrospective')):?>
    <h1 class="the-category-title"><?php
    foreach((get_the_category()) as $childcat) {
      $parentcat = $childcat->category_parent;
      if( $parentcat != 0 ) echo '' .get_cat_name($parentcat);}?></h1>
      <p><?php echo category_description(); ?></p>
    </div>

    <div class="categ" id="categories">
      <?php
      $query = new WP_Query( array( 'category_name' => 'retrospective','order'=> 'desc', 'orderby' => 'date', 'posts_per_page' => -1) );

      if ( $query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); /* start the loop */?>

          <article class="category-area">
            <div class="row-category">
              <div class="thumbnail-category">
                <a href="<?php the_permalink();?>">
                  <?php the_post_thumbnail(); ?>
                </a>
                <div class="title-and-sentence-left no-padding">
                  <div class="category-and-date">

                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                  </div>
                  <a href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end thumbnail-category -->
              <div class="right-part-category-vertical">
                <div class="thumbnail-right xs-invisible">
                  <a href="<?php the_permalink();?>">
                    <?php if (class_exists('MultiPostThumbnails')) :
                      MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
                    endif;?>
                  </a>
                </div>
                <div class="title-and-sentence no-padding">
                  <div class="category-and-date">
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                  </div>
                  <a class="link-thumb" href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end right-part-category -->

              <!-- Third part start -->
              <div class="right-part-category-horizontal third-part-horizontal">
                <div class="thumbnail-right xs-invisible">
                  <a href="<?php the_permalink();?>">
                    <?php if (class_exists('MultiPostThumbnails')) :
                      MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'third-image');
                    endif;?>
                  </a>
                </div>
                <div class="title-and-sentence no-padding">
                  <div class="category-and-date">
                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                  </div>
                  <a class="link-thumb" href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end right-part-category third-part -->
              <div class="right-part-category-horizontal first-part-horizontal">
                <div class="thumbnail-right xs-invisible">
                  <a href="<?php the_permalink();?>">
                    <?php if (class_exists('MultiPostThumbnails')) :
                      MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'third-image');
                    endif;?>
                  </a>
                </div>
                <div class="title-and-sentence no-padding">
                  <div class="category-and-date">
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                  </div>
                  <a class="link-thumb" href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end right-part-category -->
            </div> <!-- end row -->
            <div class="row-bottom">
              <div class="title-and-sentence-bottom no-padding">
                <div class="category-and-date">
                  <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                  <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                </div>
                <a href="<?php the_permalink();?>">
                  <div class="article-title">
                    <?php
                    $titre = get_field('titre_de_larticle');
                    if ($titre):?>
                      <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                    <?php endif; ?>
                  </div>
                </a>
                <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
              </div>
            </div>
          </article><!--  end category-area -->

          <?php
        endwhile;
        wp_reset_postdata();
      endif;?>
    </div>

    <!-- CATEGORIE STUDIO -->
    <?php elseif (is_category ('studio')):?>
      <h1 class="the-category-title"><?php the_category();?></h1>
      <p><?php echo category_description(); ?></p>
    </div>

    <div class="categ" id="categories">
      <?php
      $query = new WP_Query( array( 'category_name' => 'studio','order'=> 'desc', 'orderby' => 'date', 'posts_per_page' => -1) );


      if ( $query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); /* start the loop */?>

          <article class="category-area <?php echo $classes;?>">
            <div class="row-category">
              <div class="thumbnail-category">
                <a href="<?php the_permalink();?>">
                  <?php the_post_thumbnail(); ?>
                </a>
                <div class="title-and-sentence-left no-padding">
                  <div class="category-and-date">

                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                    <div class="the-category"><?php the_category(); ?></div>
                  </div>
                  <a href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end thumbnail-category -->
              <div class="right-part-category-vertical">
                <div class="thumbnail-right xs-invisible">
                  <a href="<?php the_permalink();?>">
                    <?php if (class_exists('MultiPostThumbnails')) :
                      MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
                    endif;?>
                  </a>
                </div>
                <div class="title-and-sentence no-padding">
                  <div class="category-and-date">
                    <div class="the-category"><?php the_category(); ?></div>
                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                  </div>
                  <a class="link-thumb" href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end right-part-category -->

              <!-- Third part start -->
              <div class="right-part-category-horizontal third-part-horizontal">
                <div class="thumbnail-right xs-invisible">
                  <a href="<?php the_permalink();?>">
                    <?php if (class_exists('MultiPostThumbnails')) :
                      MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'third-image');
                    endif;?>
                  </a>
                </div>
                <div class="title-and-sentence no-padding">
                  <div class="category-and-date">
                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                  </div>
                  <a class="link-thumb" href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end right-part-category third-part -->
              <div class="right-part-category-horizontal first-part-horizontal">
                <div class="thumbnail-right xs-invisible">
                  <a href="<?php the_permalink();?>">
                    <?php if (class_exists('MultiPostThumbnails')) :
                      MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'third-image');
                    endif;?>
                  </a>
                </div>
                <div class="title-and-sentence no-padding">
                  <div class="category-and-date">
                    <div class="the-category"><?php the_category();?></div>
                    <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                  </div>
                  <a class="link-thumb" href="<?php the_permalink();?>">
                    <div class="article-title">
                      <?php
                      $titre = get_field('titre_de_larticle');
                      if ($titre):?>
                        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                  <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
                </div>
              </div> <!-- end right-part-category -->
            </div> <!-- end row -->
            <div class="row-bottom">
              <div class="title-and-sentence-bottom no-padding">
                <div class="category-and-date">
                  <div class="the-category"><?php the_category(); ?></div>
                  <div class="the-date xs-invisible"><p><?php echo get_the_date(); ?></p></div>
                </div>
                <a href="<?php the_permalink();?>">
                  <div class="article-title">
                    <?php
                    $titre = get_field('titre_de_larticle');
                    if ($titre):?>
                      <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                    <?php endif; ?>
                  </div>
                </a>
                <div class="paragraphe-italique col-md-8 no-padding"><?php the_field('sous_titre_article'); ?></div>
                <div class="the-date xs-visible"><p><?php echo get_the_date(); ?></p></div>
              </div>
            </div>
          </article><!--  end category-area -->

          <?php
        endwhile;
        wp_reset_postdata();
      endif;?>
    </div>
  <?php endif; ?>




</div>
<?php get_footer(); ?>
