<?php
/*
*
* Template Name: Home
*
*
*/?>
<?php  require_once 'Mobile-Detect/Mobile_Detect.php' ;
$detect = new Mobile_Detect ; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Nomades Studio</title>
  <?php wp_head(); ?>
</head>
<body>
<div class="container-with-banner" id="container-with-banner">
  <div class="container-fluid container-header" id="navbar">

   <nav class="navbar navbar-expand-md navbar-light bg-faded">
    <a class="xs-visible navbar-search" href="<?php the_permalink(51); ?>">
      <img class="img-responsive recherche-img" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/loupe.svg">
    </a>
    <a class="navbar-brand xs-visible" href="<?php bloginfo('url'); ?>">
      <img class="img-responsive logo" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/logo-nomades.svg">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


<?php if ( $detect -> isMobile () && !$detect->isTablet() ) {
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
  ]);


}else{
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
  ]);
}
?>
  </nav>
</div>

<aside class="sidebar-contact xs-invisible" id="contact">
  <p class="contact">Contact</p>
  <p class="nomades-prez"><span>NOMADES</span> - Magazine Numérique et Studio de Création</p>
</aside>

<a href="<?php the_permalink(); ?>">
  <aside class="sidebar-recherche xs-invisible">

    <p class="recherche"><img src="<?php bloginfo('stylesheet_directory') ?>/assets/img/ligne-185.svg"" alt=""> <?php the_title(); ?></p>
  </aside>
</a>
<!-- end header -->

<div class="container-home">

  <div class="header-home">
    <?php  $image = get_field('image_couv_home');
    $video = get_field('video_couv_home');

    if (!empty($image)): ?>
      <div class="image-full-size">
        <img class="background-img delete-hover-effect" src="<?php the_field('image_couv_home');?>" alt="couverture nomades home">
        <img class ="logo-home delete-hover-effect" src="<?php the_field('logo_home_header');?>" alt="logo nomades">
      </div>
      <?php elseif ($video): ?>
        <div class="video-full-size">
          <video class="delete-hover-effect" width="100%" height="auto" autoplay="true" loop>
           <source src="<?php the_field('video_couv_home');?>" type="video/mp4" />
           </video>
           <img class ="logo-home delete-hover-effect" src="<?php the_field('logo_home_header');?>" alt="logo nomades">
         </div>
       <?php endif; ?>
       <div class="sous-titre-home">
        <?php the_field('sous_titre');?>
      </div>
    </div> <!-- end header-home -->


    <!-- INTRO -->
    <div class="intro">
      <h2>INTRO</h2>
      <button class="button-english xs-visible" id="english-text">English Text</button>
      <div class="intro-texte">
        <div class="legende-francais">
          <?php the_field('texte_gauche'); ?>
        </div>
        <div class="legende-anglais toggle-anglais">
          <?php the_field('texte_droite'); ?>
        </div>
      </div>
    </div> <!-- end intro -->


    <div class="home-rencontre-destination">

      <!-- RENCONTRE -->
      <div class="home-category-left">
        <?php
        $sticky = get_option('sticky_posts');
        $the_query = new WP_Query( array( 'category_name' => 'rencontre', 'post__in' => $sticky, 'posts_per_page' => 1 ) );
        if ( $the_query->have_posts() ):

         while ( $the_query->have_posts() ):
           $the_query->the_post();?>
           <?php $category = get_the_category();
           $mycat = $category[0]->cat_name;
           $mycat2 = get_cat_id($mycat); ?>
           <a href="<?php the_permalink();?>">
            <div class="scrollme">
              <div class="animateme" data-when="enter" data-from="0.3"data-to="0" data-opacity="0" data-translatey="25" data-easing="easeinout">
                <?php the_post_thumbnail(); ?>
              </div>
            </div> <!-- end scollme image -->
            <div class="scrollme animateme" data-when="enter" data-from="0.3" data-to="0" data-opacity="0" data-translatey="25" data-easing="easeinout">
              <h3 class="the-category" ><?php echo get_cat_name($mycat2);?></h3>
              <div class="article-title col-md-7 no-padding">
                <?php
                $titre = get_field('titre_de_larticle');
                if ($titre):?>
                  <h2 class="the-title classique"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                <?php endif; ?>
              </div>

              <div class="excerpt-article col-md-7 no-padding">
                <div class="paragraphe-italique"><?php the_field('sous_titre_article'); ?></div>
                <div class="paragraphe-classique"><?php the_field('paragraphe_article'); ?></div>
                <p class="the-date"><?php echo get_the_date(); ?></p>
              </div> <!-- end excerpt-article -->
            </div> <!-- end scrollme text -->
          </a>
        <?php endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </div> <!-- end home-category-left -->


    <!-- DESTINATION -->
    <div class="home-category-right">
      <?php
      $sticky = get_option('sticky_posts');
      $the_query = new WP_Query( array( 'category_name' => 'destination', 'post__in' => $sticky, 'posts_per_page' => 1 ) );
      if ( $the_query->have_posts() ):
       while ( $the_query->have_posts() ):
         $the_query->the_post();?>
         <?php $category = get_the_category();
         $mycat = $category[0]->cat_name;
         $mycat2 = get_cat_id($mycat); ?>
         <div class="scrollme animateme" data-when="enter" data-from="0.3" data-to="0" data-opacity="0" data-translatey="25" data-easing="easeinout">
           <h3 class="the-category"><?php echo get_cat_name($mycat2);?></h3>
           <p class="the-date"><?php echo get_the_date(); ?></p>
           <div class="article-title col-md-8 no-padding">
            <?php
            $titre = get_field('titre_de_larticle');
            if ($titre):?>
              <h2 class="the-title classique"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
            <?php endif; ?>
          </div>
          <div class="excerpt-article col-md-8 no-padding">
            <div class="paragraphe-italique"><?php the_field('sous_titre_article'); ?></div>
          </div>
        </div>
        <a href="<?php the_permalink();?>">
          <div class="scrollme">
            <div class="animateme" data-when="enter" data-from="0.3" data-to="0" data-opacity="0" data-translatey="25" data-easing="easeinout">
              <?php the_post_thumbnail(); ?>
            </div>
          </div>
        </a>
        <div class="scrollme animateme a-decouvrir" data-when="enter" data-from="0.3" data-to="0" data-opacity="0" data-easing="easeinout">
          <p class="decouvrir-aussi">A découvrir aussi,</p>
        <?php endwhile;
      endif;
      wp_reset_postdata();?>


      <ul>
        <?php
        $args = array( 'cat' => '6, 7', 'post__not_in' => get_option( 'sticky_posts' ), 'numberposts' => 5, 'order'=> 'desc', 'orderby' => 'date' );
        $postslist = get_posts( $args );
        foreach ($postslist as $post) :  setup_postdata($post); ?>
          <a href="<?php the_permalink();?>">
            <li><?php
            $titre = get_field('titre_de_larticle');
            if ($titre):?>
              <p class="title-list">— <?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></p>
            <?php endif; ?>
          </li>
        </a>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php  wp_reset_postdata();?>
</div> <!-- end home-category-right -->
</div> <!-- end home-rencontre-destination -->



<!-- RETROSPECTIVE -->
<div class="home-category-retrospective">

  <?php
  $sticky = get_option('sticky_posts');
  $the_query = new WP_Query( array( 'category_name' => 'retrospective', 'post__in' => $sticky, 'posts_per_page' => 1 ) );
  if ( $the_query->have_posts() ):

   while ( $the_query->have_posts() ):
     $the_query->the_post();?>
     <?php $category = get_the_category();
     $mycat = $category[0]->cat_name;
     $mycat2 = get_cat_id($mycat); ?>
     <a href="<?php the_permalink();?>">
      <div class="scrollme">
        <div class="animateme xs-invisible" data-when="enter" data-from="0.3" data-to="0" data-opacity="0" data-translatey="25" data-easing="easeinout">
          <?php if (class_exists('MultiPostThumbnails')) :
          MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'third-image');
        endif;?>
        </div>
        <div class="animateme xs-visible" data-when="enter" data-from="0.3" data-to="0" data-opacity="0" data-translatey="25" data-easing="easeinout">
          <?php the_post_thumbnail();?>
        </div>
      </div>
      <div class="article-under-picture">
        <div class="article-title col-md-8 no-padding scrollme animateme" data-when="enter" data-from="0.3" data-to="0" data-opacity="0" data-translatey="25" data-easing="easeinout">
          <h3 class="the-category"><?php echo get_cat_name($mycat2);?></h3>
          <?php
          $titre = get_field('titre_de_larticle');
          if ($titre):?>
            <h2 class="the-title classique"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
          <?php endif; ?>
        </div>
        <div class="scrollme animateme" data-when="enter" data-from="0.3" data-to="0" data-opacity="0" data-translatey="25" data-easing="easeinout">
          <div class="excerpt-article col-md-9 no-padding">
            <div class="paragraphe-italique"><?php the_field('sous_titre_article'); ?></div>
            <div class="paragraphe-classique"><?php the_field('paragraphe_article'); ?></div>
          </div>
          <p class="the-date"><?php echo get_the_date(); ?></p>
        </div>
      </div>
    </a>
  <?php endwhile;
endif;
wp_reset_postdata();
?>

</div><!--  end home-category-retrospective -->


<!-- STUDIO -->
<div class="category-studio">

  <div class="studio-left">
   <?php
   $sticky = get_option('sticky_posts');
   $the_query = new WP_Query( array( 'category_name' => 'studio', 'post__in' => $sticky, 'posts_per_page' => 1 ) );
   if ( $the_query->have_posts() ):
     while ( $the_query->have_posts() ):
       $the_query->the_post();?>

       <a href="<?php the_permalink();?>">
        <div class="scrollme animateme" data-when="enter" data-from="0.3" data-to="0" data-opacity="0" data-translatey="25" data-easing="easeinout">
          <?php the_post_thumbnail(); ?>
        </div>
        <div class="scrollme animateme xs-visible" data-when="enter" data-from="0.3" data-to="0" data-opacity="0" data-translatey="25" data-easing="easeinout">
        <h3 class="the-category"><?php the_category();?></h3>
        <p class="the-date"><?php echo get_the_date(); ?></p>
        <div class="article-title col-md-8 no-padding">
          <?php
          $titre = get_field('titre_de_larticle');
          if ($titre):?>
            <h2 class="the-title classique"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
          <?php endif; ?>
        </div>
        <div class="excerpt-article col-md-8 no-padding">
          <div class="paragraphe-italique"><?php the_field('sous_titre_article'); ?></div>
        </div>
      </div> <!-- end scrollme -->
      </a>
    <?php endwhile;
  endif;
  wp_reset_postdata();?>
  <div class="scrollme animateme a-decouvrir" data-when="enter" data-from="0.3" data-to="0" data-opacity="0" data-translatey="25" data-easing="easeinout">
    <p class="decouvrir-aussi">A découvrir aussi,</p>
    <ul>
      <?php
      $args = array( 'category_name' => 'studio', 'post__not_in' => get_option( 'sticky_posts' ), 'numberposts' => 5, 'order'=> 'desc', 'orderby' => 'date' );
      $postslist = get_posts( $args );
      foreach ($postslist as $post) :  setup_postdata($post); ?>
        <a href="<?php the_permalink();?>">
          <li><?php
          $titre = get_field('titre_de_larticle');
          if ($titre):?>
            <p class="title-list">— <?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></p>
          <?php endif; ?>
        </li>
      </a>
    <?php endforeach; ?>
  </ul>
</div>
<?php  wp_reset_postdata();?>
</div> <!-- end studio-left -->

<div class="studio-right xs-invisible">
  <div class="scrollme animateme" data-when="enter" data-from="0.3" data-to="0" data-opacity="0" data-translatey="25" data-easing="easeinout">
    <?php
    $sticky = get_option('sticky_posts');
    $the_query = new WP_Query( array( 'category_name' => 'studio', 'post__in' => $sticky, 'posts_per_page' => 1 ) );
    if ( $the_query->have_posts() ):
     while ( $the_query->have_posts() ):
       $the_query->the_post();?>
       <a href="<?php the_permalink();?>">
        <?php if (class_exists('MultiPostThumbnails')) :
          MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image');
        endif;?>
      </div>
      <div class="scrollme animateme" data-when="enter" data-from="0.3" data-to="0" data-opacity="0" data-translatey="25" data-easing="easeinout">
        <h3 class="the-category"><?php the_category();?></h3>
        <p class="the-date"><?php echo get_the_date(); ?></p>
        <div class="article-title col-md-8 no-padding">
          <?php
          $titre = get_field('titre_de_larticle');
          if ($titre):?>
            <h2 class="the-title classique"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
          <?php endif; ?>
        </div>
        <div class="excerpt-article col-md-8 no-padding">
          <div class="paragraphe-italique"><?php the_field('sous_titre_article'); ?></div>
        </div>
      </div> <!-- end scrollme -->
    </a>

  <?php endwhile;
endif;
wp_reset_postdata();?>

</div> <!-- end studio-right -->
</div> <!-- end category-studio -->




<!-- PANORAMIQUE -->
<?php $image = get_field('panoramique');
if (!empty($image)):?>
  <div class="bloc-panoramique-home">
    <div class="panoramique">
      <img class="delete-hover-effect" src="<?php the_field('panoramique');?>" alt="">
    </div>
  </div>
  <?php
endif;?>


<!-- EDITION -->

<div class="home-edition">
  <div class="write-edition">
    <div class="titre-edition">
      <h2><?php the_field('titre_edition'); ?> <span><?php echo wp_get_attachment_image(326); ?></span></h2>
    </div>
    <div class="paragraphe-edition">
      <?php the_field('sous_titre_edition'); ?>
      <?php the_field('paragraphe_edition'); ?>
    </div>
  </div>
  <div class="images-edition">
    <img src="<?php the_field('image1_edition');?>" alt="">
    <img src="<?php the_field('image2_edition');?>" alt="">
  </div>
</div>



<!-- PRESENTATION CATEGORIES -->
<?php  if( have_rows('presentation_categories') ):?>

  <div class="categories-prez">
    <?php  while ( have_rows('presentation_categories') ) : the_row();
      $terms = get_sub_field('lien_vers_categorie');
      if( $terms ): ?>
        <?php foreach( $terms as $term ): ?>
          <a class ="xs-invisible" href="<?php echo get_term_link( $term ); ?>">
          <?php endforeach; ?>
        <?php endif; ?>
        <div class="categorie">
          <h3><?php the_sub_field('titre'); ?></h3>
          <div class="paragraphe">
            <?php the_sub_field('paragraphe'); ?>
          </div>
        </div>
      </a>
    <?php  endwhile; ?>
  </div>
<?php endif ?>
</div> <!-- end container-home -->



<!-- CONTACT -->
<div class="contact-home">
  <h3>Une question ? Un projet ?</h3>
  <div class="legende-francais">
    <p>N’hésitez pas à nous contacter directement par mail ou par téléphone.</p>
  </div>
  <div class="legende-anglais toggle-anglais">
    <p>N’hésitez pas à nous contacter directement par mail ou par téléphone.</p>
  </div>
  <button id="contact" class="button-newsletter button-contactez-nous">NOUS CONTACTER</button>
</div>


<?php get_footer(); ?>
