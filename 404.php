<?php get_header(); the_post(); ?>

<article class="page-article">
  <h1 class="post-title">404 - No page found</h1>
  <p style="text-align:center;"><a href="<?php echo get_option('home'); ?>/"  >&larr; Home</a></p>
</article>
  
<?php get_footer(); ?>