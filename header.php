<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <?php if (is_search()) { ?>
  <meta name="robots" content="noindex, nofollow" /> 
  <?php } ?>
  <title>
    <?php
      if (function_exists('is_tag') && is_tag()) {
         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
      elseif (is_archive()) {
         wp_title(''); echo ' Archive - '; }
      elseif (is_search()) {
         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
      elseif (!(is_404()) && (is_single()) || (is_page())) {
         wp_title(''); echo ' - '; }
      elseif (is_404()) {
         echo 'Not Found - '; }
      if (is_home()) {
         bloginfo('name'); echo ' - '; bloginfo('description'); }
      else {
          bloginfo('name'); }
      if ($paged>1) {
         echo ' - page '. $paged; }
    ?>
  </title>
  <meta name="title" content="<?php
          if (function_exists('is_tag') && is_tag()) {
             single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
          elseif (is_archive()) {
             wp_title(''); echo ' Archive - '; }
          elseif (is_search()) {
             echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
          elseif (!(is_404()) && (is_single()) || (is_page())) {
             wp_title(''); echo ' - '; }
          elseif (is_404()) {
             echo 'Not Found - '; }
          if (is_home()) {
             bloginfo('name'); echo ' - '; bloginfo('description'); }
          else {
              bloginfo('name'); }
          if ($paged>1) {
             echo ' - page '. $paged; }
  ?>">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/_images/favicon.ico">
  <link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/_/_images/apple-touch-icon.png">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
  <?php wp_head(); ?>
  <?php include (TEMPLATEPATH . '/_/parts/global-site-styles.php' ); ?>
</head>

<body <?php body_class(); ?>>

  <header class="header" role="banner">
    <div class="header-wrap">
      <?php global $tt_options;
        $tt_settings = get_option( 'tt_options', $tt_options ); 
      ?>
      <?php if( $tt_settings['logo_url'] != '' ) : ?>
      <a href="<?php echo get_option('home'); ?>/"><img src="<?php echo $tt_settings['logo_url']; ?>" alt="<?php bloginfo('name'); ?> Logo" class="logo"></a>
      <?php else: ?>
      <h1 class="logo"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1> 
      <?php endif; ?>

      <nav class="main-nav" role="navigation">
          <?php wp_nav_menu(array('menu' => 'main_nav')); ?>
      </nav>
    </div> 
  </header>

  <div class="page-wrap group" role="main">
    