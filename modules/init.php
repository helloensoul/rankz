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
    // Create Primary Navigation menu if doesn't exists
    if (!wp_get_nav_menu_object('Primary Navigation')) {
      set_theme_mod('nav_menu_locations', ['primary_navigation' => wp_create_nav_menu('Primary Navigation')]);
    }
  }
}
init();
