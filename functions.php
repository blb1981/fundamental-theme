<?php 

// CSS & JS
function fundamental_files() {
  wp_enqueue_style('fontawesome', get_theme_file_uri('/css/main.min.css'));
  wp_enqueue_style('fundamental_main_styles', get_theme_file_uri('/css/fontawesome.min.css'));

  wp_enqueue_script('bootstrap', get_theme_file_uri('/js/bootstrap.bundle.min'), array(), 1.0, true);
  wp_enqueue_script('fundamental_main_script', get_theme_file_uri('/js/script.js'), array(), 1.0, true);
}
add_action('wp_enqueue_scripts', 'fundamental_files');

// Theme features
function fundamental_features() {
  add_theme_support('title-tag');
  add_theme_support('widgets');
  add_theme_support('post-thumbnails');
  
  register_nav_menu('header_menu_location', 'Header Menu Location');
  register_nav_menu('footer_menu_location_left', 'Footer Left Menu Location');
  register_nav_menu('footer_menu_location_middle', 'Footer Middle Menu Location');
  register_nav_menu('footer_menu_location_right', 'Footer Right Menu Location');
  register_nav_menu('mobile_menu_location', 'Mobile Menu Location');
  
  $logo_args = array(
    'height' => 50,
    'width' => 50,
    'flex-height' => true,
    'flex-width' => true,
    'header-text' => array('img-fluid'),
  );
  add_theme_support('custom-logo', $logo_args);
}
add_action('after_setup_theme', 'fundamental_features');


// Give user option to change author nicename (their slug)
// Credit: https://weusewp.com/tutorial/change-author-url-slug-base/
if (current_user_can('manage_options')) {
  function lwp_2629_user_edit_ob_start() {ob_start();}
  add_action( 'personal_options', 'lwp_2629_user_edit_ob_start' );

  function lwp_2629_insert_nicename_input( $user ) {
      $content = ob_get_clean();
      $regex = '/<tr(.*)class="(.*)\buser-user-login-wrap\b(.*)"(.*)>([\s\S]*?)<\/tr>/';
      $nicename_row = sprintf(
          '<tr class="user-user-nicename-wrap"><th><label for="user_nicename">%1$s</label></th><td><input type="text" name="user_nicename" id="user_nicename" value="%2$s" class="regular-text" />' . "\n" . '<span class="description">%3$s</span></td></tr>',
          esc_html__( 'Nicename' ),
          esc_attr( $user->user_nicename ),
          esc_html__( 'Must be unique.' )
      );
      echo preg_replace( $regex, '\0' . $nicename_row, $content );
  }
  add_action( 'show_user_profile', 'lwp_2629_insert_nicename_input' );
  add_action( 'edit_user_profile', 'lwp_2629_insert_nicename_input' );

  function lwp_2629_profile_update( $errors, $update, $user ) {
      if ( !$update ) return;
      if ( empty( $_POST['user_nicename'] ) ) {
          $errors->add(
              'empty_nicename',
              sprintf(
                  '<strong>%1$s</strong>: %2$s',
                  esc_html__( 'Error' ),
                  esc_html__( 'Please enter a Nicename.' )
              ),
              array( 'form-field' => 'user_nicename' )
          );
      } else {
          $user->user_nicename = $_POST['user_nicename'];
      }
  }
  add_action( 'user_profile_update_errors', 'lwp_2629_profile_update', 10, 3 );
}


//Comment Field Order
function mo_comment_fields_custom_order( $fields ) {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = $fields['url'];
    $cookies_field = $fields['cookies'];
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    unset( $fields['cookies'] );
    // the order of fields is the order below, change it as needed:
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;
    $fields['url'] = $url_field;
    $fields['comment'] = $comment_field;
    $fields['cookies'] = $cookies_field;
    // done ordering, now return the fields:
    return $fields;
}
add_filter( 'comment_form_fields', 'mo_comment_fields_custom_order' );

// Sidebars
function fundamental_sidebars() {
    register_sidebar(array(
        'id' => 'main_sidebar',
        'name' => 'Main Sidebar',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init', 'fundamental_sidebars');