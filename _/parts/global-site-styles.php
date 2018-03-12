<?php global $tt_options;
  $tt_settings = get_option( 'tt_options', $tt_options ); 
?>

<style>
<?php # Theme Option Settings ?>
<?php if( $tt_settings['header-background-color'] != '' ) : ?>
  .header { background-color:<?php echo $tt_settings['header-background-color']; ?>;}
<?php endif; ?>
<?php if( $tt_settings['header-background-image'] != '' ) : ?>
  .header { background-image: url('<?php echo $tt_settings['header-background-image']; ?>');}
<?php endif; ?>
<?php if( $tt_settings['site-link-color'] != '' ) : ?>
  a { color:<?php echo $tt_settings['site-link-color']; ?>;}
  .btn { background-color:<?php echo $tt_settings['site-link-color']; ?>; }
<?php endif; ?>
<?php if( $tt_settings['header-link-color'] != '' ) : ?>
  .header .logo a, .header .main-nav a { color:<?php echo $tt_settings['header-link-color']; ?>;}
  .header .main-nav a:hover, .header .main-nav a:focus { border-bottom: 2px solid <?php echo $tt_settings['header-link-color']; ?>;}
<?php endif; ?>
</style>