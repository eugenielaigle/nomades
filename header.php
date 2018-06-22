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

 <nav class="navbar navbar-expand-md navbar-light bg-faded" id="navbar-navigation">
  <a class="xs-visible navbar-search" href="<?php the_permalink(51); ?>">
    <img class="img-responsive recherche-img" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/loupe.svg">
  </a>
  <a class="navbar-brand xs-visible" href="<?php bloginfo('url'); ?>">
    <img class="img-responsive logo" src="<?php bloginfo('stylesheet_directory') ?>/assets/img/logo-nomades.svg">
  </a>
  <button class="navbar-special cubes" type="button" id="cubes">
    <span class="navbar-toggler-icon navbar-toggler-table-icon"></span>

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
    <aside class="sidebar-recherche xs-invisible" id="sidebar-modulable">
    <p class="recherche">
      <span id="counterLayout"></span> <img src="<?php bloginfo('stylesheet_directory') ?>/assets/img/ligne-185.svg"" alt=""> <?php the_title();?>
    </p>
  </aside>
</a>




