
<?php get_header(); ?>

<div class="container-content">
  <a href="<?php the_permalink(); ?>">
    <?php the_title(); ?>
  <?php the_content(); ?>
  </a>
</div>


<?php get_footer(); ?>

