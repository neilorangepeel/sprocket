<?php get_header(); ?>

<?php $i = 1 ; ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php if ($i == 1): ?>
    <?php include (TEMPLATEPATH . '/_/parts/custom-page-styles.php' ); ?>
    <?php endif; ?>

    <article class="post-article">
        <time class="post-date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F jS, Y') ?></time>
        <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <?php the_content(); ?>
        <p><?php the_tags(); ?></p>
    </article>

<?php $i++; endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<div class="pagination group">
  <p class="alignleft"><?php previous_posts_link('&laquo; Newer') ?></p><p class="alignright"><?php next_posts_link('Older &raquo;') ?></p>
</div>

<?php get_footer(); ?>