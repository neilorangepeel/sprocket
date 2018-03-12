<?php get_header(); the_post(); ?>

<?php include (TEMPLATEPATH . '/_/parts/custom-page-styles.php' ); ?>

<article class="page-article">
  <h1 class="post-title"><?php the_title(); ?></h1>
  <?php the_content(); ?>
</article>

<?php get_footer(); ?>
