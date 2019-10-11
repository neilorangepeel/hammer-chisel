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

  // FEATURED IMAGE
  if ( function_exists( 'add_theme_support' ) )
  add_theme_support( 'post-thumbnails' );

  // ALLOW SVG UPLOADS
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );

  // TIME AGO FORMAT
  add_filter('the_time', 'timeago');

  function timeago()
  {
      global $post;
      $date = $post->post_date;
      $time = get_post_time('G', true, $post);
      $time_diff = time() - $time;
      if( $time_diff > 0 && $time_diff < 24*60*60 )
          $display = sprintf( __('%s ago'), human_time_diff( $time ) );
      else
          $display = date(get_option('date_format'), strtotime($date) );
      return $display;
  }

  // ADD READ MORE TO EXCERPT
  function new_excerpt_more($more) {
    global $post;
    return ' ... <a href="'. get_permalink($post->ID) . '">Read more</a>';
  }
  add_filter('excerpt_more', 'new_excerpt_more');

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
    $background_image = isset( $values['background_image'] ) ? esc_attr( $values['background_image'][0] ) : '';
    $background_color = isset( $values['background_color'] ) ? esc_attr( $values['background_color'][0] ) : '';
    $link_color = isset( $values['link_color'] ) ? esc_attr( $values['link_color'][0] ) : '';
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
      <label for="background_image">Background Image</label>
      <input placeholder="http://" class="widefat" type="text" name="background_image" id="background_image" value="<?php echo $background_image; ?>" />
    </p>

    <p>
      <label for="background_color">Background Color</label>
      <input placeholder="#454545" class="widefat" type="text" name="background_color" id="background_color" value="<?php echo $background_color; ?>" />
    </p>

    <p>
      <label for="link_color">Link Color</label>
      <input placeholder="#454545" class="widefat" type="text" name="link_color" id="link_color" value="<?php echo $link_color; ?>" />
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

    // Make sure data is set
    if( isset( $_POST['background_image'] ) )
      update_post_meta( $post_id, 'background_image', wp_kses( $_POST['background_image'], $allowed ) );

    if( isset( $_POST['background_color'] ) )
      update_post_meta( $post_id, 'background_color', wp_kses( $_POST['background_color'], $allowed ) );

    if( isset( $_POST['link_color'] ) )
      update_post_meta( $post_id, 'link_color', wp_kses( $_POST['link_color'], $allowed ) );
  }

?>