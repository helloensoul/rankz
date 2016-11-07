<?php

namespace Ensoul\Rankz\Init;

/**
 *
 * You can enable/disable this feature in functions.php (or lib/setup.php if you're using Sage):
 * add_theme_support('rankz-init');
 */

function init() {
  // Check if rankz_activation already exists and if not sets theme options
  if (!get_option('rankz_activation')) {
    // Change rankz_activtion value
    add_option('rankz_activation', 'actived');
    // Change default users role
    update_option('default_role', 'editor');
    // Change default blog description
    update_option('blogdescription', '');
    // Delete WordPress default post
    wp_delete_post(1, true);
    // Delete WordPress default page
    wp_delete_post(2, true);
    // Setup primary menu with home page
    $menu_exists = wp_get_nav_menu_object('Primary Navigation');
    if (!$menu_exists) {
      // Create primary_navigation menu
      $menu_id = wp_create_nav_menu('Primary Navigation');
      // Assign primary_navigation to nav menu location created in init.php
      set_theme_mod('nav_menu_locations', ['primary_navigation' => $menu_id]);
      $home_page_options = [
        'post_content'  => 'Home page content.',
        'post_status'   => 'publish',
        'post_title'    => 'Home',
        'post_type'     => 'page'
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
