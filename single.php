<?php get_header(); the_post(); ?>

<?php include (TEMPLATEPATH . '/_/parts/custom-page-styles.php' ); ?>

  <article class="post-article">
    <time class="post-date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F jS, Y') ?></time>
    <h1 class="post-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <p><?php the_tags(); ?></p>
  </article>

<div class="pagination group">
  <p class="alignleft"><?php next_post_link('Next post: %link', '%title'); ?></p>
  <p class="alignright"><?php previous_post_link('Previous post: %link', '%title'); ?></p>
</div>

<?php comments_template(); ?>

<?php get_footer(); ?>