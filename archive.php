<?php get_header(); ?>

  <?php if (have_posts()) : ?>

  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works ?>

  <?php if (is_category()) { ?>
  <h1 class="archive-page-title h3"><?php single_cat_title(); ?></h1>

  <?php } elseif( is_tag() ) { ?>
  <h1 class="archive-page-title h3">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>

  <?php } elseif (is_day()) { ?>
  <h1 class="archive-page-title h3">Archive for <?php the_time('F jS, Y'); ?></h1>

  <?php } elseif (is_month()) { ?>
  <h1 class="archive-page-title h3">Archive for <?php the_time('F, Y'); ?></h1>

  <?php } elseif (is_year()) { ?>
  <h1 class="archive-page-title h3">Archive for <?php the_time('Y'); ?></h1>

  <?php } elseif (is_author()) { ?>
  <h1 class="archive-page-title h3">Author Archive</h1>

  <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
  <h1 class="archive-page-title h3">Blog Archives</h1>

  <?php } ?>

  <ul class="archive-list">

    <?php
    global $query_string;
    query_posts( $query_string . '&posts_per_page=-1' );
    while (have_posts()) : the_post(); ?>
        
    <li>
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - <time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F jS, Y') ?></time>
</h2>
    </li>

    <?php endwhile; ?>
    
    <?php else : ?>
      <h2>Nothing found</h2>
    <?php endif; ?>
  </ul>

  <div class="pagination group">
    <p class="alignleft"><?php previous_posts_link('&laquo; Newer') ?></p><p class="alignright"><?php next_posts_link('Older &raquo;') ?></p>
  </div>

<?php get_footer(); ?>