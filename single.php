<?php get_header(); ?>

<?php while ( have_posts() ) : the_post();
  $category = get_the_category();
  $mycat = $category[0]->cat_name;
  $mycat2 = get_cat_id($mycat);?>

  <div class="loader-single">
    <div class="loader-left">
      <h3 class="the-category"><?php echo get_cat_name($mycat2);?></h3>
      <p class="lieu-article"><?php the_field('lieu'); ?></p>
      <p class="the-date"><?php echo get_the_date(); ?></p>
    </div>
    <div class="article-title">
      <?php
      $titre = get_field('titre_de_larticle');
      if ($titre):?>
        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span>.</h2>
      <?php endif; ?>
    </div>
  </div>

  <div class="container-content" id="galerie" data-chocolat-title="<?php echo get_cat_name($mycat2);?> <?php the_title(); ?>">
    <div class="article-header">
      <h2><?php echo get_cat_name($mycat2);?></h2>
      <div class="chapeau col-md-4"><?php the_field('chapeau'); ?></div>
      <div class="article-title">
        <?php
        $titre = get_field('titre_de_larticle');
        if ($titre):?>
          <h1 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h1>
        <?php endif; ?>
        <p><?php echo get_the_date(); ?></p>
      </div>

      <?php
      $image = get_field('photo_header');
      $video = get_field('video_header');

      if (!empty($image)):?> <!-- si image -> afficher image -->
      <a href="<?php the_field('photo_header');?>" class="chocolat-image">
       <div class="image-full-size">
        <img src="<?php the_field('photo_header');?>">
        <div class="legende-image-full-size xs-invisible">
          <?php the_field('paragraphe_image'); ?>
        </div>
        <div class="plus-upright">
          <img src="http://localhost/nomades/wp-content/uploads/2018/04/plus.svg">
        </div>
      </div>
    </a>

    <?php elseif ($video):?> <!-- sinon -> afficher video -->
    <a href="">
     <div class="video-full-size">
      <video width="100%" height="auto" autoplay="true" loop>
       <source src="<?php the_field('video_header');?>" type="video/mp4" />
       </video>
       <div class="legende-image-full-size xs-invisible">
        <?php the_field('paragraphe_image'); ?>
      </div>
      <!-- <div class="plus-upright">
        <img src="http://localhost/nomades/wp-content/uploads/2018/04/plus.svg">
      </div> -->
    </div>
  </a>

<?php endif;?>

<?php
$article = get_field('article');

if( $article ): ?>
  <div class="row row-article">
    <div class="legende-sous-image col-md-6 xs-invisible">
      <?php echo $article['legende_sous_image']; ?>
    </div>
    <div class="xs-visible col-md-3">
      <button class="button-english" id="english-text">English Text</button>
      <div class="article-anglais" id="article-anglais">
        <?php echo $article['article_sous_image_anglais']; ?>
      </div>
    </div>
    <div class="article-francais col-md-3 ">
      <?php echo $article['article_sous_image_francais']; ?>
    </div>
    <div class="article-anglais col-md-3 xs-invisible">
      <?php echo $article['article_sous_image_anglais']; ?>
    </div>
  </div>
<?php endif; ?>

<!-- ARTICLE FLEXIBLE -->
<?php
if( have_rows('article_flexible') ):

  while ( have_rows('article_flexible') ) : the_row();

    if( get_row_layout() == 'panoramique' ):?>
      <a href="<?php the_sub_field('image_panoramique');?>" class="chocolat-image">
        <div class="bloc-panoramique">
          <div class="panoramique">
            <img class="delete-hover-effect" src="<?php the_sub_field('image_panoramique');?>" alt="panoramique">
            <div class="legende-panoramique1">
              <?php the_sub_field('legende_panoramique_1');?>
            </div>
            <div class="legende-panoramique2">
              <?php the_sub_field('legende_panoramique_2');?>
            </div>
          </div>
        </div>
      </a>
      <?php elseif( get_row_layout() == 'image_texte_scrollable' ):?>

        <div class="image-texte-scrollable">
          <div id="sticker">
            <div class="image-legende-gauche sticky-wrapper" >
              <a href="<?php the_sub_field('image'); ?>" class="chocolat-image">
                <img class="image-gauche" src="<?php the_sub_field('image'); ?>" alt="">
                <div class="plus-upright">
                  <img src="http://localhost/nomades/wp-content/uploads/2018/04/plus.svg">
                </div>
              </a>
              <div class="legende-francais">
                <?php the_sub_field('legende_image');?>
              </div>
              <div class="legende-anglais">
                <?php the_sub_field('legende_image_anglais');?>
              </div>
            </div>
          </div>
          <div class="position-texte">
            <div class="texte-scrollable-droite">
              <?php if( have_rows('texte_scrollable_francais') ): ?>
                <div class="legende-francais">
                  <?php  while ( have_rows('texte_scrollable_francais') ) : the_row();?>
                    <div class="question">
                      <?php the_sub_field('question');?>
                    </div>
                    <div class="reponse">
                      <?php the_sub_field('reponse');?>
                    </div>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>

              <?php if( have_rows('texte_scrollable_anglais') ): ?>
                <div class="legende-anglais">
                  <?php  while ( have_rows('texte_scrollable_anglais') ) : the_row();?>
                    <div class="question">
                      <?php the_sub_field('question');?>
                    </div>
                    <div class="reponse">
                      <?php the_sub_field('reponse');?>
                    </div>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <?php elseif( get_row_layout() == 'dyptique' ):?>

          <?php if( get_sub_field('couleur_fond') == 'Blanc' ): ?>
            <div class="container-dyptique fond-blanc">
              <?php else:?>
                <div class="container-dyptique">
                <?php endif; ?>


                  <div class="dyptique">
                    <a href="<?php the_sub_field('image_gauche');?>" class="chocolat-image">
                    <img class="image-gauche" src="<?php the_sub_field('image_gauche');?>" alt="dyptique nomades">
                    </a>
                    <a href="<?php the_sub_field('image_droite');?>" class="chocolat-image">
                    <img class="image-droite" src="<?php the_sub_field('image_droite');?>" alt="dyptique nomades">
                  </a>
                    <div class="plus-upright">
                      <img src="http://localhost/nomades/wp-content/uploads/2018/04/plus.svg">
                    </div>
                  </div>
                  <div class="legendes-dyptique">
                    <div class="legende-dyp legende-francais-dyptique">
                      <?php the_sub_field('legende_francais');?>
                    </div>
                    <div class="legende-dyp legende-anglais-dyptique">
                      <?php the_sub_field('legende_anglais');?>
                    </div>
                  </div>

              </div>

              <?php elseif( get_row_layout() == 'video' ):?>
                <div class="container-video">
                  <div class="video">
                    <?php  the_sub_field('video');?>
                  </div>
                  <div class="legende-video row">

                    <div class="direction-artistique col-md-6">
                      <?php
                      $direction = get_sub_field('direction_artistique');
                      if(!empty($direction)): ?>
                        <p class="title">Direction artistique et Réalisation</p>
                        <div class="legende">
                          <?php the_sub_field('direction_artistique'); ?>
                        </div>
                      <?php endif; ?>
                    </div>
                    <div class="lieu-video col-md-2">
                      <?php
                      $direction = get_sub_field('lieu');
                      if(!empty($direction)): ?>
                        <p class="title">Lieu</p>
                        <div class="legende">
                          <?php the_sub_field('lieu'); ?>
                        </div>
                      <?php endif; ?>
                    </div>
                    <div class="vues-aeriennes col-md-2">
                      <?php
                      $direction = get_sub_field('vues');
                      if(!empty($direction)): ?>
                        <p class="title">Vues aériennes</p>
                        <div class="legende">
                          <?php the_sub_field('vues'); ?>
                        </div>
                      <?php endif; ?>
                    </div>
                    <div class="musique-originale col-md-2">
                      <?php
                      $direction = get_sub_field('musique');
                      if(!empty($direction)): ?>
                        <p class="title">Musique originale</p>
                        <div class="legende">
                          <?php the_sub_field('musique'); ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <?php elseif( get_row_layout() == 'image_centree' ):?>

                  <?php if( get_sub_field('couleur_fond') == 'Blanc' ): ?>

                    <div class="image-centree fond-blanc">
                      <?php else:?>
                        <div class="image-centree">
                        <?php endif; ?>

                        <a class="image-relative chocolat-image" href="<?php the_sub_field('image');?>">
                          <img class="image" src="<?php the_sub_field('image');?>" alt="">
                          <div class="plus-upright">
                            <img src="http://localhost/nomades/wp-content/uploads/2018/04/plus.svg">
                          </div>
                        </a>
                        <div class="legendes">
                          <div class="legende-francais">
                            <?php the_sub_field('legende_image'); ?>
                          </div>
                          <div class="legende-anglais">
                            <?php the_sub_field('legende_image_anglais'); ?>
                          </div>
                        </div>
                      </div>

                      <?php elseif( get_row_layout() == 'citation' ):?>
                        <div class="citation">
                          <div class="titre">
                            <?php the_sub_field('citation_titre');?>
                          </div>
                          <div class="sous-titre">
                            <?php the_sub_field('citation_sous_titre');?>
                          </div>
                        </div>

                        <?php elseif( get_row_layout() == 'dyptique_asymetrique' ):?>
                          <?php if( get_sub_field('couleur_fond') == 'Blanc' ): ?>
                            <div class="dyptique-asymetrique fond-blanc">
                              <?php else:?>
                                <div class="dyptique-asymetrique">
                                <?php endif; ?>
                                <div class="images-dyptique-asymetrique">
                                  <a href="<?php the_sub_field('image_gauche');?>" class="image-relative chocolat-image">
                                    <!-- <div class="black-background"> -->
                                      <img class="image-gauche" src="<?php the_sub_field('image_gauche');?>" alt="">
                                      <div class="plus-upleft">
                                        <img src="http://localhost/nomades/wp-content/uploads/2018/04/plus.svg">
                                      </div>
                                      <!--  </div> -->
                                    </a>
                                    <a href="<?php the_sub_field('image_droite');?>" class="chocolat-image">
                                      <div class="image-right">
                                        <!--   <div class="black-background"> -->
                                          <img class="image-dyptique-asymetrique-right" src="<?php the_sub_field('image_droite');?>" alt="">
                                          <!-- </div> -->
                                          <div class="legende-dyptique-asymetrique">
                                            <div class="legende-francais">
                                              <?php the_sub_field('legende_francais');?>
                                            </div>
                                            <div class="legende-anglais">
                                              <?php the_sub_field('legende_anglais');?>
                                            </div>
                                          </div>
                                        </div>
                                      </a>
                                    </div>

                                  </div>
                                <?php endif;
                              endwhile;
                            else :
                              endif;?> <!-- end layout -->


                            </div> <!-- end article-header -->

                            <div class="article-footer">
                              <div class="remerciements">
                                <div class="remerciements-left">
                                  <h2 class="the-category"><?php echo get_cat_name($mycat2);?></h2>
                                  <p class="the-date"><?php echo get_the_date();?></p>
                                </div>
                                <div class="remerciements-right">
                                  <div class="article-title">
                                    <?php
                                    $titre = get_field('titre_de_larticle');
                                    if ($titre):?>
                                      <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                                    <?php endif; ?>
                                  </div>
                                  <div class="paragraphe-remerciements">
                                    <?php the_field('remerciements'); ?>
                                  </div>
                                  <div class="partage">
                                    <?php
                                    $lien = get_permalink();
                                    $titre = strip_tags(get_the_title());
                                    $facebook_link  = 'https://www.facebook.com/sharer/sharer.php?u='.$lien;
                                    $twitter_link  = 'http://twitter.com/share?url=' . $lien . '&text=' . $titre ;
                                    $mail_link = 'mailto:?subject=' . $titre . '&body=' . $titre . ' - ' . $lien ;
                                    ?>
                                    <p class="partagez">PARTAGER:</p>
                                    <a class="partage-facebook" href="<?php echo $facebook_link;?>" target="_blank">FACEBOOK</a>
                                    <a class="partage-twitter" href="<?php echo $twitter_link; ?>" target="_blank">TWITTER</a>
                                    <a class="partage-email" href="<?php echo $mail_link;?>">EMAIL</a>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="articles-a-la-une row">
                              <div class="histoires col-md-3">
                                <p><?php the_field('titre_histoires'); ?></p>
                              </div>
                              <div class="col-md-9">
                                <?php
                                $post_objects = get_field('articles_a_la_une');
                                if( $post_objects ): ?>
                                  <div class="articles-inspirants">
                                    <?php foreach( $post_objects as $post): ?>
                                      <?php setup_postdata($post); ?>
                                      <div class="article-inspirant col-md-4">
                                        <a href="<?php the_permalink(); ?>">
                                          <?php the_post_thumbnail(); ?>
                                          <h2 class="the-category"><?php echo get_cat_name($mycat2);?></h2>
                                          <div class="article-title">
                                            <?php
                                            $titre = get_field('titre_de_larticle');
                                            if ($titre):?>
                                              <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                                            <?php endif; ?>
                                          </div>
                                        </a>
                                      </div>
                                    <?php endforeach; ?>
                                  </div>
                                  <?php wp_reset_postdata(); ?>
                                <?php endif;?>
                              </div>
                            </div> <!-- end articles à la une -->

                          </div> <!-- end container-content -->

                        <?php endwhile; ?>
                        <?php get_footer(); ?>
