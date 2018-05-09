<?php get_header(); ?>

<?php while ( have_posts() ) : the_post();?>

<div class="container-content">
  <div class="article-header">
      <h2><?php the_category(); ?></h2>
      <div class="chapeau col-md-4"><?php the_field('chapeau'); ?></div>
      <div class="article-title">
        <?php
    $titre = get_field('titre_de_larticle');

    if ($titre):?>
        <h1 class="normal-title"><?php echo $titre['titre']; ?><span class="italic-title"><?php echo $titre['sous-titre']; ?></span></h1>
      <?php endif; ?>
      <p><?php the_date(); ?></p>
      </div>

    <?php
    $image = get_field('photo_header');
    $video = get_field('video_header');

      if (!empty($image)):?> <!-- si image -> afficher image -->
      <a href="#" class="zoombox zgallery2">
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
      <a href="#" class="zoombox zgallery2">
       <div class="video-full-size">
        <video width="100%" height="auto" autoplay="true" loop>
           <source src="<?php the_field('video_header');?>" type="video/mp4" />
        </video>
        <div class="legende-image-full-size xs-invisible">
          <?php the_field('paragraphe_image'); ?>
        </div>
        <div class="plus-upright">
          <img src="http://localhost/nomades/wp-content/uploads/2018/04/plus.svg">
        </div>
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






  </div> <!-- end article-header -->
</div> <!-- end container-content -->


<?php endwhile; ?>
<?php get_footer(); ?>
