<?php get_header(); ?>

<div class="background-404">
  <div class="content-404">
    <p>Il semblerait que
      cette page n’existe plus.
      Nous vous invitons à revenir
    à l’accueil du site.</p>
  </div>
  <a href="<?php bloginfo('url');?>">
    <button class="button-newsletter button-404">REVENIR A L'ACCUEIL</button>
  </a>
</div>

<?php get_footer(); ?>
