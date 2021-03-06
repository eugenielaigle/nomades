<?php get_header(); ?>

<?php while ( have_posts() ) : the_post();
  $category = get_the_category();
  $mycat = $category[0]->cat_name;
  $mycat2 = get_cat_id($mycat);?>
  <div style="display:none;"><?php the_tags(); ?></div>

  <div class="loader-single">
    <div class="loader-left">
      <h3 class="the-category"><?php echo get_cat_name($mycat2);?></h3>
      <p class="lieu-article xs-invisible"><?php the_field('lieu'); ?></p>
      <p class="the-date xs-invisible"><?php echo get_the_date(); ?></p>
    </div>
    <div class="article-title">
      <?php
      $titre = get_field('titre_de_larticle');
      if ($titre):?>
        <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span>.</h2>
      <?php endif; ?>
    </div>
    <div class="xs-visible">
      <p class="lieu-article"><?php the_field('lieu'); ?></p>
      <p class="the-date"><?php echo get_the_date(); ?></p>
    </div>
  </div>

  <div class="container-content container-article" id="galerie" data-chocolat-category="<?php echo get_cat_name($mycat2); ?>" data-chocolat-title="<?php the_title(); ?>">
    <div class="article-header">
      <div class="layout layout-1" data-count="1">
        <h2><?php echo get_cat_name($mycat2);?></h2>
        <div class="chapeau col-md-4"><?php the_field('chapeau'); ?></div>
        <div class="article-title">
          <?php
          $titre = get_field('titre_de_larticle');
          if ($titre):?>
            <h1 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h1>
          <?php endif; ?>
          <p class="the-date"><?php echo get_the_date(); ?></p>
        </div>

        <?php
        $image = get_field('photo_header');
        $video = get_field('video_header');

        if (!empty($image)):?> <!-- si image -> afficher image -->
        <a href="<?php the_field('photo_header');?>" class="chocolat-image" title="<?php the_field('chapeau'); ?> <?php the_field('paragraphe_image'); ?>">
         <div class="image-full-size">
          <img src="<?php the_field('photo_header');?>">
          <div class="legende-image-full-size xs-invisible">
            <p><?php the_field('paragraphe_image'); ?></p>
          </div>
          <div class="plus-upright xs-invisible">
            <img src="https://nomades.studio/wp-content/uploads/2018/04/plus.svg">
          </div>
        </div>
      </a>

      <?php elseif ($video):?> <!-- sinon -> afficher video -->
      <div class="video-full-size">
        <video width="100%" height="auto" autoplay="true" loop muted id="video<?php echo get_row_index()+1;?>">
         <source src="<?php the_field('video_header');?>" type="video/mp4" />
         </video>
         <div class="legende-image-full-size xs-invisible">
          <p><?php the_field('paragraphe_image'); ?></p>
        </div>
      </div>

    <?php endif;?>
  </div>
  <?php
  if( have_rows('article') ):

    while( have_rows('article') ): the_row(); ?>
      <div class="row row-article">
        <div class="legende-sous-image col-md-6 xs-invisible">
          <?php the_sub_field('legende_sous_image_header'); ?>
        </div>
        <div class="xs-visible col-md-3">
          <button class="button-english" id="english-text">English Text</button>
          <div id="article-anglais">
          </div>
        </div>
        <div class="article-francais col-md-3 ">
          <?php the_sub_field('article_sous_image_francais'); ?>
          <div class="article-anglais xs-visible col-md-12">
            <?php the_sub_field('article_sous_image_anglais'); ?>
          </div>
        </div>
        <div class="article-anglais col-md-3 xs-invisible">
          <?php the_sub_field('article_sous_image_anglais'); ?>
        </div>
      </div>
      <?php
    endwhile;
  endif; ?>

  <!-- ARTICLE FLEXIBLE -->
  <?php
  if( have_rows('article_flexible') ):

    while ( have_rows('article_flexible') ) : the_row();



      /**** LAYOUT PANORAMIQUE ****/
      if( get_row_layout() == 'panoramique' ):
        $image = get_sub_field('image_panoramique');
        $video = get_sub_field('video_panoramique');?>
        <div class="layout layout-<?php echo get_row_index();?>" data-count="<?php echo get_row_index()+1;?>">
          <?php if (!empty($image)):?>
            <a href="<?php the_sub_field('image_panoramique');?>" class="chocolat-image" title="<?php the_sub_field('legende_panoramique_1');?> <?php the_sub_field('legende_panoramique_2');?> ">
              <div class="bloc-panoramique">
                <div class="panoramique">
                  <img class="delete-hover-effect" src="<?php the_sub_field('image_panoramique');?>" alt="panoramique">
                  <div class="legende-panoramique1 legende-francais xs-invisible">
                    <?php the_sub_field('legende_panoramique_1');?>
                  </div>
                  <div class="legende-panoramique2 legende-anglais xs-invisible xs-invisible">
                    <?php the_sub_field('legende_panoramique_2');?>
                  </div>
                </div>
              </div>
            </a>
            <?php elseif ($video):?> <!-- sinon -> afficher video -->
            <div class="bloc-panoramique">
              <div class="panoramique">
                <video width="100%" height="auto" number="<?php echo get_row_index()+1;?>" autoplay="true" muted loop id="video<?php echo get_row_index()+1;?>">
                 <source src="<?php the_sub_field('video_panoramique');?>" type="video/mp4" />
                 </video>

                 <div class="legende-panoramique1 xs-invisible">
                  <?php the_sub_field('legende_panoramique_1');?>
                </div>
                <div class="legende-panoramique2 xs-invisible">
                  <?php the_sub_field('legende_panoramique_2');?>
                </div>
              </div>
            </div>

          <?php endif;?>
        </div><!--  end layout -->

        <!-- LAYOUT IMAGE TEXTE SCROLLABLE -->
        <?php elseif( get_row_layout() == 'image_texte_scrollable' ):?>
          <div class="layout layout-<?php echo get_row_index();?>" data-count="<?php echo get_row_index()+1;?>" >
            <div class="image-texte-scrollable">

              <div id="sticker">
                <div class="image-legende-gauche sticky-wrapper" >
                  <?php $image = get_sub_field('image');
              if ($image):?>
                  <a href="<?php the_sub_field('image'); ?>" class="chocolat-image" title="<?php the_sub_field('legende_image');?> <?php the_sub_field('legende_image_anglais');?>">
                    <img class="image-gauche" src="<?php the_sub_field('image'); ?>" alt="">
                    <div class="plus-upright xs-invisible">
                      <img src="https://nomades.studio/wp-content/uploads/2018/04/plus.svg">
                    </div>
                  </a>
                <?php endif; ?>
                  <div class="legende-francais xs-invisible">
                    <?php the_sub_field('legende_image');?>
                  </div>
                  <div class="legende-anglais xs-invisible">
                    <?php the_sub_field('legende_image_anglais');?>
                  </div>
                </div>
              </div>
              <div class="position-texte col-md-6">
                <div class="texte-scrollable-droite">
                  <?php if( have_rows('texte_scrollable_francais') ): ?>
                    <div class="legende-francais col-md-6">
                      <?php  while ( have_rows('texte_scrollable_francais') ) : the_row();?>
                        <div class="question">
                          <?php the_sub_field('question');?>
                        </div>
                        <div class="reponse">
                          <?php the_sub_field('reponse');?>
                        </div>
                      <?php endwhile; ?>
                      <?php if( have_rows('texte_scrollable_anglais') ): ?>
                    <div class="legende-anglais xs-visible col-md-12">
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
                  <?php endif; ?>

                  <?php if( have_rows('texte_scrollable_anglais') ): ?>
                    <div class="legende-anglais xs-invisible col-md-6">
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
              <?php $image = get_sub_field('image');
              if($image): ?>
              <div class="xs-visible sticker">
                <div class="image-legende-gauche sticky-wrapper" >
                  <a href="<?php the_sub_field('image'); ?>" class="chocolat-image" title="<?php the_sub_field('legende_image');?> <?php the_sub_field('legende_image_anglais');?>">
                    <img class="image-gauche" src="<?php the_sub_field('image'); ?>" alt="">
                    <div class="plus-upright xs-invisible">
                      <img src="https://nomades.studio/wp-content/uploads/2018/04/plus.svg">
                    </div>
                  </a>
                  <div class="legende-francais xs-invisible">
                    <p><?php the_sub_field('legende_image');?></p>
                  </div>
                  <div class="legende-anglais xs-invisible">
                    <p><?php the_sub_field('legende_image_anglais');?></p>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            </div>
          </div> <!-- end layout -->

          <!-- LAYOUT DYPTIQUE -->
          <?php elseif( get_row_layout() == 'dyptique' ):?>
            <div class="layout layout-<?php echo get_row_index();?>" data-count="<?php echo get_row_index()+1;?>">
              <?php if( get_sub_field('couleur_fond') == 'Blanc' ): ?>
                <div class="container-dyptique fond-blanc xs-invisible tablet-visible">
                  <div class="dyptique">
                    <a href="<?php the_sub_field('image_gauche');?>" class="chocolat-image" title="<?php the_sub_field('legende_francais');?> <?php the_sub_field('legende_anglais');?>">
                      <img class="image-gauche" src="<?php the_sub_field('image_gauche');?>" alt="dyptique nomades">
                    </a>
                    <a href="<?php the_sub_field('image_droite');?>" class="chocolat-image image-relative" title="<?php the_sub_field('legende_francais');?> <?php the_sub_field('legende_anglais');?>">
                      <img class="image-droite" src="<?php the_sub_field('image_droite');?>" alt="dyptique nomades">
                      <div class="plus-upright xs-invisible">
                        <img src="https://nomades.studio/wp-content/uploads/2018/04/plus.svg">
                      </div>
                    </a>
                  </div>
                  <div class="legendes-dyptique xs-invisible">
                    <div class="legende-dyp legende-francais-dyptique">
                      <p><?php the_sub_field('legende_francais');?></p>
                    </div>
                    <div class="legende-dyp legende-anglais-dyptique xs-invisible">
                      <p><?php the_sub_field('legende_anglais');?></p>
                    </div>
                  </div>
                </div>
                <?php else:?>
                  <div class="container-dyptique xs-invisible tablet-visible">
                    <div class="dyptique">
                      <a href="<?php the_sub_field('image_gauche');?>" class="chocolat-image" title="<?php the_sub_field('legende_francais');?> <?php the_sub_field('legende_anglais');?>">
                        <img class="image-gauche" src="<?php the_sub_field('image_gauche');?>" alt="dyptique nomades">
                      </a>
                      <a href="<?php the_sub_field('image_droite');?>" class="chocolat-image image-relative" title="<?php the_sub_field('legende_francais');?> <?php the_sub_field('legende_anglais');?>">
                        <img class="image-droite" src="<?php the_sub_field('image_droite');?>" alt="dyptique nomades">
                        <div class="plus-upright xs-invisible">
                          <img src="https://nomades.studio/wp-content/uploads/2018/04/plus.svg">
                        </div>
                      </a>
                    </div>
                    <div class="legendes-dyptique xs-invisible">
                      <div class="legende-dyp legende-francais-dyptique">
                        <p><?php the_sub_field('legende_francais');?></p>
                      </div>
                      <div class="legende-dyp legende-anglais-dyptique">
                        <p><?php the_sub_field('legende_anglais');?></p>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              </div> <!-- end layout -->
              <div class="container-dyptique-edito dypt xs-visible tablet-invisible">
                <div class="swiper-container xs-visible">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <img src="<?php the_sub_field('image_gauche');?>" alt="dyptique nomades">
                    </div>
                    <div class="swiper-slide">
                      <img src="<?php the_sub_field('image_droite');?>" alt="dyptique nomades">
                      <div class="plus-upright xs-invisible">
                        <img src="https://nomades.studio/wp-content/uploads/2018/04/plus.svg">
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <!-- LAYOUT VIDEO -->
              <?php elseif( get_row_layout() == 'video' ):?>
                <div class="layout layout-<?php echo get_row_index();?>" data-count="<?php echo get_row_index()+1;?>">
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
                </div> <!-- end layout -->

                <!-- LAYOUT IMAGE CENTREE HORIZONTALE-->
                <?php elseif( get_row_layout() == 'image_centree' ):?>
                 <div class="layout layout-<?php echo get_row_index();?>" data-count="<?php echo get_row_index()+1;?>">
                  <?php if( get_sub_field('couleur_fond') == 'Blanc' ): ?>

                    <div class="image-centree fond-blanc"><a class="image-relative chocolat-image" href="<?php the_sub_field('image');?>" title="<?php the_sub_field('legende_image'); ?> <?php the_sub_field('legende_image_anglais'); ?>">
                      <img class="image" src="<?php the_sub_field('image');?>" alt="">
                      <div class="plus-upright xs-invisible">
                        <img src="https://nomades.studio/wp-content/uploads/2018/04/plus.svg">
                      </div>
                      <div class="legendes xs-invisible">
                        <div class="legende-francais">
                          <?php the_sub_field('legende_image'); ?>
                        </div>
                        <div class="legende-anglais xs-invisible">
                          <?php the_sub_field('legende_image_anglais'); ?>
                        </div>
                      </div>
                    </a>

                  </div>
                  <?php else:?>
                    <div class="image-centree">
                      <a class="image-relative chocolat-image" href="<?php the_sub_field('image');?>" title="<?php the_sub_field('legende_image'); ?> <?php the_sub_field('legende_image_anglais'); ?>">
                        <img class="image" src="<?php the_sub_field('image');?>" alt="">
                        <div class="plus-upright xs-invisible">
                          <img src="https://nomades.studio/wp-content/uploads/2018/04/plus.svg">
                        </div>
                        <div class="legendes xs-invisible">
                          <div class="legende-francais">
                            <p><?php the_sub_field('legende_image'); ?></p>
                          </div>
                          <div class="legende-anglais">
                            <p><?php the_sub_field('legende_image_anglais'); ?></p>
                          </div>
                        </div>
                      </a>

                    </div>
                  <?php endif; ?>
                </div> <!-- end layout -->

                <!-- LAYOUT IMAGE CENTREE VERTICALE-->
                <?php elseif( get_row_layout() == 'image_centree_verticale' ):?>
                 <div class="layout layout-<?php echo get_row_index();?>" data-count="<?php echo get_row_index()+1;?>">
                  <?php if( get_sub_field('couleur_fond_verticale') == 'Blanc' ): ?>

                    <div class="image-centree-verticale fond-blanc"><a class="image-relative chocolat-image" href="<?php the_sub_field('image_verticale');?>" title="<?php the_sub_field('legende_image_verticale'); ?> <?php the_sub_field('legende_image_anglais_verticale'); ?>">
                      <img class="image" src="<?php the_sub_field('image_verticale');?>" alt="">
                      <div class="plus-upright xs-invisible">
                        <img src="https://nomades.studio/wp-content/uploads/2018/04/plus.svg">
                      </div>
                      <div class="legendes xs-invisible">
                        <div class="legende-francais">
                          <?php the_sub_field('legende_image_verticale'); ?>
                        </div>
                        <div class="legende-anglais">
                          <?php the_sub_field('legende_image_anglais_verticale'); ?>
                        </div>
                      </div>
                    </a>

                  </div>
                  <?php else:?>
                    <div class="image-centree-verticale">
                      <a class="image-relative chocolat-image" href="<?php the_sub_field('image_verticale');?>" title="<?php the_sub_field('legende_image_verticale'); ?> <?php the_sub_field('legende_image_anglais_verticale'); ?>">
                        <img class="image" src="<?php the_sub_field('image_verticale');?>" alt="">
                        <div class="plus-upright xs-invisible">
                          <img src="https://nomades.studio/wp-content/uploads/2018/04/plus.svg">
                        </div>
                        <div class="legendes xs-invisible">
                          <div class="legende-francais">
                            <?php the_sub_field('legende_image_verticale'); ?>
                          </div>
                          <div class="legende-anglais">
                            <?php the_sub_field('legende_image_anglais_verticale'); ?>
                          </div>
                        </div>
                      </a>

                    </div>
                  <?php endif; ?>
                </div> <!-- end layout -->

                <!-- LAYOUT CITATION -->
                <?php elseif( get_row_layout() == 'citation' ):?>
                  <div class="layout layout-<?php echo get_row_index();?>" data-count="<?php echo get_row_index()+1;?>">
                    <div class="citation">
                      <hr class="hr-citation xs-visible">
                      <div class="titre">
                        <?php the_sub_field('citation_titre');?>
                      </div>
                      <div class="sous-titre">
                        <?php the_sub_field('citation_sous_titre');?>
                      </div>
                      <hr class="hr-citation xs-visible">
                    </div>
                  </div> <!-- end layout -->

                  <!-- LAYOUT DYPTIQUE ASYMETRIQUE-->
                  <?php elseif( get_row_layout() == 'dyptique_asymetrique' ):?>
                    <div class="layout layout-<?php echo get_row_index();?>" data-count="<?php echo get_row_index()+1;?>">
                      <?php if( get_sub_field('couleur_fond') == 'Blanc' ): ?>
                        <div class="dyptique-asymetrique fond-blanc">
                          <?php else:?>
                            <div class="dyptique-asymetrique">
                            <?php endif; ?>
                            <div class="images-dyptique-asymetrique">
                              <a href="<?php the_sub_field('image_gauche');?>" class="image-relative chocolat-image" title="<?php the_sub_field('legende_francais');?> <?php the_sub_field('legende_anglais');?>">
                                <!-- <div class="black-background"> -->
                                  <img class="image-gauche" src="<?php the_sub_field('image_gauche');?>" alt="">
                                  <div class="plus-upleft xs-invisible">
                                    <img src="https://nomades.studio/wp-content/uploads/2018/04/plus.svg">
                                  </div>
                                  <!--  </div> -->
                                </a>
                                <a href="<?php the_sub_field('image_droite');?>" class="chocolat-image" title="<?php the_sub_field('legende_francais');?> <?php the_sub_field('legende_anglais');?>">
                                  <div class="image-right">
                                    <!--   <div class="black-background"> -->
                                      <img class="image-dyptique-asymetrique-right" src="<?php the_sub_field('image_droite');?>" alt="">
                                      <!-- </div> -->
                                      <div class="legende-dyptique-asymetrique">
                                        <div class="legende-francais xs-invisible">
                                          <?php the_sub_field('legende_francais');?>
                                        </div>
                                        <div class="legende-anglais xs-invisible">
                                          <?php the_sub_field('legende_anglais');?>
                                        </div>
                                      </div>
                                    </div>
                                  </a>
                                </div>

                              </div>
                            </div> <!-- end layout -->

                          <?php endif;

                        endwhile;
                      else :
                        endif;?> <!-- end layout -->


                      </div> <!-- end article-header -->

                      <div class="article-footer">
                        <div class="remerciements">
                          <div class="remerciements-left xs-invisible">
                            <h2 class="the-category"><?php echo get_cat_name($mycat2);?></h2>
                            <p class="the-date"><?php echo get_the_date();?></p>
                          </div>
                          <div class="remerciements-right">
                            <div class="article-title xs-invisible">
                              <?php
                              $titre = get_field('titre_de_larticle');
                              if ($titre):?>
                                <h2 class="normal-title"><?php echo $titre['titre_1']; ?> <span class="italic"><?php echo $titre['titre_2']; ?></span> <?php echo $titre['titre_3']; ?> <span class="italic"><?php echo $titre['titre_4']; ?></span></h2>
                              <?php endif; ?>
                            </div>
                            <div class="paragraphe-remerciements">
                              <?php the_field('remerciements'); ?>
                            </div>
                            <div class="interview-traduction xs-visible">
                              <div class="infos-finales">
                                <p>Photos et Interview:<br></p>
                                <?php the_field('photos_et_interview'); ?>
                              </div>
                              <div class="infos-finales">
                                <p>Traduction: <br>
                                  <?php the_field('traduction_article'); ?></p>
                                </div>
                                <div class="infos-finales">
                                  <p>Publié le <br>
                                    <?php echo get_the_date(); ?></p>
                                  </div>
                                </div>
                                <div class="partage">
                                  <?php
                                  $lien = get_permalink();
                                  $titre = strip_tags(get_the_title());
                                  $facebook_link  = 'https://www.facebook.com/sharer/sharer.php?u='.$lien;
                                  $twitter_link  = 'https://twitter.com/share?url=' . $lien . '&text=' . $titre ;
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
                            <div class="histoires col-md-4">
                              <?php if (get_cat_name($mycat2) == 'Studio'):?>
                                <h4>Projets<br> qui pourraient<br> vous inspirer</h4>
                                <?php else: ?>
                                  <h4>Histoires<br> qui pourraient<br> vous inspirer</h4>
                                <?php endif; ?>
                              </div>
                              <?php
                                $post_objects = get_field('articles_a_la_une');
                                if( $post_objects ): ?>
                              <div class="col-md-8 histoire">
                                  <div class="articles-inspirants">
                                    <?php foreach( $post_objects as $post): ?>
                                      <?php setup_postdata($post); ?>
                                      <div class="article-inspirant col-md-4 col-xs-6">
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

                              </div>
                              <?php endif;?>
                            </div> <!-- end articles à la une -->

                          </div> <!-- end container-content -->

                        <?php endwhile; ?>
                        <?php get_footer(); ?>
