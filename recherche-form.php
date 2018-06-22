<?php
/*
*
* Template Name: Cherche
*
*
*/?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Nomades Studio | Recherche</title>
  <?php wp_head(); ?>
</head>
<body>

<div class="container-recherche">
  <h2 class="recherche-titre"><?php the_title(); ?></h2>

<a id="close-recherche" href="javascript:history.go(-1)">+</a>
  <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-mots">
      <input type="text" name="s" id="s" />
      <input type="submit" id="searchsubmit" value="Rechercher" />
    </div>
    <div id="choix">
      <p class="filtres">Filtres</p>
      <label for="destination">Destinations</label>
      <input type="radio" name="choix" value="destination" id="destination" /> /
      <label for="rencontre">Rencontres</label>
      <input type="radio" name="choix" value="rencontre" id="rencontre" /> /
      <label for="retrospective">Rétrospectives</label>
      <input type="radio" name="choix" value="retrospective" id="retrospective"/> /
      <label for="studio">Studio</label>
      <input type="radio" name="choix" value="studio" id="studio" />
    </div>
  </form>
</div>

 <?php wp_footer(); ?>
</body>
</html>
