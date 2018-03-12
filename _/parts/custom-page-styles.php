<style>
<?php # Custom Page Styles ?>
<?php if ( get_post_meta(get_the_ID(), 'header_color', true) ) : ?>
  .header {background-color:<?php echo get_post_meta($post->ID, 'header_color', true); ?>;}
<?php endif; ?>
<?php if ( get_post_meta(get_the_ID(), 'header_image', true) ) : ?>
  .header { background-image: url('<?php echo get_post_meta($post->ID, 'header_image', true); ?>');}
<?php endif; ?>
<?php if ( get_post_meta(get_the_ID(), 'header_link', true) ) : ?>
  .header .logo a, .header .main-nav a { color:<?php echo get_post_meta($post->ID, 'header_link', true); ?>;}
  .header .main-nav a:hover, .header .main-nav a:focus { border-bottom: 2px solid <?php echo get_post_meta($post->ID, 'header_link', true); ?>;}
<?php endif; ?>
</style>