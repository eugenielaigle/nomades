<?php get_header();

$category = get_the_category();
$mycat = $category[0]->cat_name;
$mycat2 = get_cat_id($mycat);?>

<div class="container-content">
  <div class="category-header">

    <!-- CATEGORIE DESTINATIONS -->
    <?php if (is_category ('destinations') || is_category('destination')):?>
    <h1 class="the-category-title"><?php
    foreach((get_the_category()) as $childcat) {
      $parentcat = $childcat->category_parent;
      if( $parentcat != 0 ) echo '' .get_cat_name($parentcat);}?></h1>
      <p><?php echo category_description(); ?></p>
    </div>
    <div class="categ">
      <?php
      $query = new WP_Query( array( 'category_name' => 'destination','order'=> 'desc', 'orderby' => 'date') );


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
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                    <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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
                    <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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
                </div>
              </div> <!-- end right-part-category -->
              <div class="right-part-category-horizontal">
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
                    <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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
                </div>
              </div> <!-- end right-part-category -->
            </div> <!-- end row -->
            <div class="row-bottom">
              <div class="title-and-sentence-bottom no-padding">
                <div class="category-and-date">
                  <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                  <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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
    <div class="categ">
      <?php
      $query = new WP_Query( array( 'category_name' => 'rencontre','order'=> 'desc', 'orderby' => 'date') );


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
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                    <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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
                    <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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
                </div>
              </div> <!-- end right-part-category -->
              <div class="right-part-category-horizontal">
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
                    <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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
                </div>
              </div> <!-- end right-part-category -->
            </div> <!-- end row -->
            <div class="row-bottom">
              <div class="title-and-sentence-bottom no-padding">
                <div class="category-and-date">
                  <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                  <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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

    <div class="categ">
      <?php
      $query = new WP_Query( array( 'category_name' => 'retrospective','order'=> 'desc', 'orderby' => 'date') );

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
                    <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                    <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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
                    <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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
                </div>
              </div> <!-- end right-part-category -->
              <div class="right-part-category-horizontal">
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
                    <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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
                </div>
              </div> <!-- end right-part-category -->
            </div> <!-- end row -->
            <div class="row-bottom">
              <div class="title-and-sentence-bottom no-padding">
                <div class="category-and-date">
                  <div class="the-category"><?php echo get_cat_name($mycat2);?></div>
                  <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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

    <div class="categ">
      <?php
      $query = new WP_Query( array( 'category_name' => 'studio','order'=> 'desc', 'orderby' => 'date') );


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
                    <div class="the-category"><?php the_category(); ?></div>
                    <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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
                    <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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
                </div>
              </div> <!-- end right-part-category -->
              <div class="right-part-category-horizontal">
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
                    <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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
                </div>
              </div> <!-- end right-part-category -->
            </div> <!-- end row -->
            <div class="row-bottom">
              <div class="title-and-sentence-bottom no-padding">
                <div class="category-and-date">
                  <div class="the-category"><?php the_category(); ?></div>
                  <div class="the-date"><p><?php echo get_the_date(); ?></p></div>
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
