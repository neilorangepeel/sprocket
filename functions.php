<?php 
  // ADD THEME OPTIONS
  include('theme-options.php');

  // Translations can be filed in the /languages/ directory
  load_theme_textdomain( 'html5reset', TEMPLATEPATH . '/languages' );

  $locale = get_locale();
  $locale_file = TEMPLATEPATH . "/languages/$locale.php";
  if ( is_readable($locale_file) )
      require_once($locale_file);
  
  // LOAD JQUERY SCRIPTS
  function tinktank_add_scripts() {
      wp_enqueue_script('jquery');
      wp_register_script( 'add-custom-js', get_template_directory_uri() . '/_/_js/custom-ck.js', array('jquery'),'',true  ); // TO FOOTER
      wp_enqueue_script( 'add-custom-js' );
  }
  add_action( 'wp_enqueue_scripts', 'tinktank_add_scripts' );

  // Clean up the <head>
  function removeHeadLinks() {
      remove_action('wp_head', 'rsd_link');
      remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');

  // MENUS
  function your_function_name() {
  add_theme_support( 'menus' );
  }
  add_action( 'after_setup_theme', 'your_function_name' );

  // ADD SVG SUPPORT
  function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );

  // ADD CUSTOM META BOX
  add_action( 'add_meta_boxes', 'cd_meta_box_add' );
  function cd_meta_box_add()
  {
    add_meta_box( 'my-meta-box-id', 'Custom Page Styles', 'cd_meta_box_cb', 'post', 'normal', 'high' );
    add_meta_box( 'my-meta-box-id', 'Custom Page Styles', 'cd_meta_box_cb', 'page', 'normal', 'high' );

  }

  function cd_meta_box_cb( $post )
  {
    $values = get_post_custom( $post->ID );
    $header_image = isset( $values['header_image'] ) ? esc_attr( $values['header_image'][0] ) : '';
    $header_color = isset( $values['header_color'] ) ? esc_attr( $values['header_color'][0] ) : '';
    $header_link = isset( $values['header_link'] ) ? esc_attr( $values['header_link'][0] ) : '';
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
      <label for="header_image">Header Image</label>
      <input placeholder="http://" class="widefat" type="text" name="header_image" id="header_image" value="<?php echo $header_image; ?>" />
    </p>

    <p>
      <label for="header_color">Header Background Color</label>
      <input placeholder="#454545" class="widefat" type="text" name="header_color" id="header_color" value="<?php echo $header_color; ?>" />
    </p>

    <p>
      <label for="header_link">Header Link Color</label>
      <input placeholder="#454545" class="widefat" type="text" name="header_link" id="header_link" value="<?php echo $header_link; ?>" />
    </p>
    
    <?php 
  }


  add_action( 'save_post', 'cd_meta_box_save' );
  function cd_meta_box_save( $post_id )
  {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
    
    if( !current_user_can( 'edit_post' ) ) return;
    
    $allowed = array( 
      'a' => array(
        'href' => array()
      )
    );
    
    // Make sure data is set.
    if( isset( $_POST['header_image'] ) )
      update_post_meta( $post_id, 'header_image', wp_kses( $_POST['header_image'], $allowed ) );

    if( isset( $_POST['header_color'] ) )
      update_post_meta( $post_id, 'header_color', wp_kses( $_POST['header_color'], $allowed ) );

    if( isset( $_POST['header_link'] ) )
      update_post_meta( $post_id, 'header_link', wp_kses( $_POST['header_link'], $allowed ) );
  }

 ?>