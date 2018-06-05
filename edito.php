<?php
/*
*
* Template Name: Edito
*
*
*/

get_header();?>


<div class="container-content">
  <div class="container-fluid container-edito">
    <div class="row row-edito">
      <div class="col-md-5 edito-left xs-invisible">
        <div class="legende-anglais toggle-anglais">
          <?php the_field('legende_intro_edito'); ?>
        </div>
      </div> <!-- end edito-left -->
      <div class="col-md-7 edito-right row">
        <div class="edito-title">
          <?php the_title(); ?>
        </div>
        <div class="edito-sous-titre">
          <?php the_field('sous_titre_edito'); ?>
        </div>
        <button class="button-english xs-visible" id="english-text">English Text</button>
        <div class="col-md-6 legende-francais">
          <?php the_field('colonne_gauche_intro'); ?>
        </div>
        <div class="col-md-6 legende-anglais toggle-anglais xs-invisible">
          <?php the_field('colonne_droite_intro'); ?>
        </div>
        <div class="xs-visible col-md-12">
          <div class="article-anglais toggle-anglais">
            <?php the_field('colonne_droite_intro'); ?>
          </div>
        </div>
      </div> <!-- end edito-right -->
    </div> <!-- end row -->
  </div> <!-- end container-fluid -->


  <!-- DYPTIQUE AREA -->
  <div class="container-dyptique-edito">
    <div class="swiper-container xs-visible">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="<?php the_field('dyptique_edito_image_1');?>" alt="Natacha">
        </div>
        <div class="swiper-slide">
          <img src="<?php the_field('dyptique_edito_image_2');?>" alt="Mathieu">
        </div>
      </div>
    </div>
    <div class="legende-sous-dyptique xs-visible">
      <?php the_field('legende_images_dyptique'); ?>
    </div>


  <div class="row-dyptique-edito xs-invisible">
    <img class="swiper-slide" src="<?php the_field('dyptique_edito_image_1');?>" alt="Natacha">
    <img class="swiper-slide" src="<?php the_field('dyptique_edito_image_2');?>" alt="Mathieu">
    <div class="legende-sous-dyptique">
      <?php the_field('legende_images_dyptique'); ?>
    </div>
  </div>
</div> <!-- end container-dyptique -->







<div class="container-fluid container-edito">
  <div class="row">
    <div class="col-md-5 dyptique-edito-left xs-invisible">
      <div class="legende-anglais toggle-anglais">
        <?php the_field('legende_dyptique_edito'); ?>
      </div>
    </div> <!-- end edito-left -->
    <div class="col-md-7 edito-right row">
      <div class="edito-sous-titre edito-sous-titre-xs">
        <?php the_field('titre_dyptique'); ?>
      </div>
      <div class="col-md-6 legende-francais">
        <?php the_field('colonne_gauche_dyptique_edito'); ?>
      </div>
      <div class="col-md-6 legende-anglais toggle-anglais xs-invisible">
        <?php the_field('colonne_droite_dyptique_edito'); ?>
      </div>
      <div class="xs-visible col-md-12">
     <!--    <button class="button-english" id="english-text-2">English Text</button> -->
        <div class="article-anglais toggle-anglais">
          <?php the_field('colonne_droite_dyptique_edito'); ?>
        </div>
      </div>
    </div> <!-- end edito-right -->
  </div> <!-- end row -->
</div> <!-- end container-fluid -->


<!-- PANORAMIQUE AREA -->
<?php $image = get_field('image_panoramique_edito');
if (!empty($image)):?>
  <div class="bloc-panoramique-home">
    <div class="panoramique">
      <img class="delete-hover-effect" src="<?php the_field('image_panoramique_edito');?>" alt="">
    </div>
  </div>
  <?php
endif;?>
<div class="container-fluid container-edito">
  <div class="row">
    <div class="col-md-5 dyptique-edito-left xs-invisible">
      <div class="legende-anglais toggle-anglais">
        <?php the_field('legende_panoramique_edito'); ?>
      </div>
    </div> <!-- end edito-left -->
    <div class="col-md-7 edito-right row">
      <div class="edito-sous-titre edito-sous-titre-xs">
        <?php the_field('titre_panoramique'); ?>
      </div>
      <div class="col-md-6 legende-francais">
        <?php the_field('colonne_gauche_panoramique_edito'); ?>
      </div>
      <div class="col-md-6 legende-anglais toggle-anglais xs-invisible">
        <?php the_field('colonne_droite_panoramique_edito'); ?>
      </div>
      <div class="xs-visible col-md-12">
        <!-- <button class="button-english" id="english-text-3">English Text</button> -->
        <div class="article-anglais toggle-anglais">
          <?php the_field('colonne_droite_panoramique_edito'); ?>
        </div>
      </div>
    </div> <!-- end edito-right -->
  </div> <!-- end row -->
</div> <!-- end container-fluid -->


<!-- CONTACT -->
<div class="contact-home contact-edito">
  <h3>Une question ? Un projet ?</h3>
  <div class="legende-francais">
    <p>N’hésitez pas à nous contacter directement par mail ou par téléphone.</p>
  </div>
  <div class="legende-anglais toggle-anglais">
    <p>N’hésitez pas à nous contacter directement par mail ou par téléphone.</p>
  </div>
  <button id="contact" class="button-newsletter button-contactez-nous">NOUS CONTACTER</button>
</div>
</div> <!-- end container-content -->


<?php get_footer(); ?>
