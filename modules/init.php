<?php

namespace Ensoul\Rankz\Init;

// Rankz options for first activation
function init() {
  // Check if rankz_activation already exists and if not sets theme options
  if (!get_option('rankz_activation')) {

    // Change shaba_activtion value
    add_option('rankz_activation', 'actived');

    // Change admin email
    update_option('admin_email', 'hello@ensoul.it');

    // Change time zone
    update_option('timezone_string', 'Europe/Rome');

    // Change default users role
    update_option('default_role', 'editor');

    // Change default blog description
    update_option('blogdescription', '');

    // Change default admin color on first user
    update_user_meta(1, 'admin_color', 'midnight');

    // Change permalink structure
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
    $wp_rewrite->flush_rules();

    // Delete WordPress default post
    wp_delete_post(1, true);

    // Delete WordPress default page
    wp_delete_post(2, true);

    // Setup primary menu with home page
    $menu_exists = wp_get_nav_menu_object('Primary Navigation');
    if(!$menu_exists){
      // Create primary_navigation menu
      $menu_id = wp_create_nav_menu('Primary Navigation');
      // Assign primary_navigation to nav menu location created in init.php
      set_theme_mod('nav_menu_locations', ['primary_navigation' => $menu_id]);
      $home_page_options = [
        'post_content'  => 'Home page content.',
        'post_status'   => 'publish',
        'post_title'    => 'Home',
        'post_type'     => 'page',
        'page_template' => 'template-home.php'
      ];
      if ($home_page_id = wp_insert_post($home_page_options, false)) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home_page_id);
        $home_page_id && wp_update_nav_menu_item($menu_id, 0, [
          'menu-item-title'     => $home_page_options['post_title'],
          'menu-item-object'    => $home_page_options['post_type'],
          'menu-item-object-id' => $home_page_id,
          'menu-item-type'      => 'post_type',
          'menu-item-status'    => 'publish'
        ]);
      }
    }
  }
}
init();

// Change user color
function admin_color($user_id) {
  update_user_meta($user_id, 'admin_color', 'midnight');
}
add_action('user_register', __NAMESPACE__ . '\\admin_color');

