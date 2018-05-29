<?php
/*
*
*
* Template Name: Plan du site
*
*
*/
get_header();?>

<div class="container-content">
  <div class="container-mentions">
    <div class="row">
      <div class="col-md-12">
        <h2 class="titre-page"><?php the_title(); ?></h2>
        <p class="sous-titre-plan-du-site">Naviguer facilement sur notre site</p>
      </div>
    </div>
    <div class="row row-infos">
      <div class="col-md-4 mentions-area">
        <p class="sous-titre-mentions">Pages</p>
        <div class="plan-du-site"><?php wp_nav_menu(array ('theme_location' => 'plan-du-site-pages'));?></div>
      </div>
      <div class="col-md-4 mentions-area">
        <p class="sous-titre-mentions">Rubriques</p>
        <div class="plan-du-site"><?php wp_nav_menu(array ('theme_location' => 'plan-du-site-rubriques'));?></div>
      </div>
      <div class="col-md-4 mentions-area">
        <p class="sous-titre-mentions">Edition</p>
        <div class="plan-du-site"><?php wp_nav_menu(array ('theme_location' => 'plan-du-site-edition'));?></div>
      </div>
    </div>
  </div>
</div>




<?php get_footer(); ?>
