<?php

// Default options values
$tt_options = array(
  'logo_url' => '',
  'site-link-color' => '',
  'header-background-color' => '',
  'header-background-image' => '',
  'header-link-color' => '',
);


if ( is_admin() ) :

function tt_register_settings() {
  register_setting( 'tt_theme_options', 'tt_options', 'tt_validate_options' );
}

add_action( 'admin_init', 'tt_register_settings' );

function tt_theme_options() {
  add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'tt_theme_options_page' );
}

add_action( 'admin_menu', 'tt_theme_options' );


function tt_theme_options_page() {
  global $tt_options, $tt_categories, $tt_layouts;

  if ( ! isset( $_REQUEST['updated'] ) )
    $_REQUEST['updated'] = false; ?>

  <div class="wrap">

  <?php echo $theme_name;screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h1>"; ?>

  <?php if ( false !== $_REQUEST['updated'] ) : ?>
  <div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
  <?php endif;?>

  <form method="post" action="options.php">

  <?php $settings = get_option( 'tt_options', $tt_options ); ?>
  
  <?php settings_fields( 'tt_theme_options' ); ?>

  <table class="form-table">

  <tr valign="top"><th scope="row"><label for="logo_url">Site Logo URL:</label></th>
  <td>
  <input id="logo_url" name="tt_options[logo_url]" type="text" value="<?php  esc_attr_e($settings['logo_url']); ?>" />
  <p>Upload logo via <a href="<?php echo get_option('siteurl'); ?>/wp-admin/media-new.php">Add new media</a></p>
  </td>
  </tr>
  <tr valign="top"><th scope="row"><label for="site-link-color">Site link color:</label></th>
  <td>
  <input id="site-link-color" name="tt_options[site-link-color]" type="text" value="<?php  esc_attr_e($settings['site-link-color']); ?>" />
  </td>
  </tr>


  <tr valign="top"><th scope="row"><label for="header-background-color">Header background color:</label></th>
  <td>
  <input id="header-background-color" name="tt_options[header-background-color]" type="text" value="<?php  esc_attr_e($settings['header-background-color']); ?>" />
  </td>
  </tr>
  <tr valign="top"><th scope="row"><label for="header-background-image">Header background image:</label></th>
  <td>
  <input id="header-background-image" name="tt_options[header-background-image]" type="text" value="<?php  esc_attr_e($settings['header-background-image']); ?>" />
  <p>1200px x 500px<br>Upload logo via <a href="<?php echo get_option('home'); ?>/wp-admin/media-new.php">Add new media</p>
  </td>
  </tr>
  <tr valign="top"><th scope="row"><label for="header-link-color">Header link color:</label></th>
  <td>
  <input id="header-link-color" name="tt_options[header-link-color]" type="text" value="<?php  esc_attr_e($settings['header-link-color']); ?>" />
  </td>
  </tr>

  </table>

  <p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>

  </form>

  </div>

  <?php
}

function tt_validate_options( $input ) {
  global $tt_options, $tt_categories, $tt_layouts;

  $settings = get_option( 'tt_options', $tt_options );
  
  return $input;
}

endif;  // EndIf is_admin()