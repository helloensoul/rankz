<?php

namespace Ensoul\Rankz\CleanUp;

/**
 * Remove unnecessary dashboard widgets
 *
 * @link http://www.deluxeblogtips.com/2011/01/remove-dashboard-widgets-in-wordpress.html
 */
function remove_dashboard_widgets() {
  remove_action('welcome_panel', 'wp_welcome_panel'); // Hide Welcome Panel
  remove_meta_box('dashboard_primary', 'dashboard', 'side'); // Hide WordPress News
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // Hide Quick Draft
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // Hide At a Glance
  remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // Hide Activity
}
add_action('admin_init', __NAMESPACE__ . '\\remove_dashboard_widgets');

// Clean posts
function clean_posts() {
  remove_meta_box('trackbacksdiv', 'post', 'normal');
  remove_meta_box('postcustom', 'post', 'normal');
  remove_meta_box('slugdiv', 'post', 'normal');
}
add_action('admin_menu', __NAMESPACE__ . '\\clean_posts');

// Clean pages
function clean_pages() {
  remove_meta_box('postcustom', 'page', 'normal');
  remove_meta_box('slugdiv', 'page', 'normal');
}
add_action('admin_menu', __NAMESPACE__ . '\\clean_pages');

// Remove theme customization from admin menu
function remove_customization_theme() {
  global $submenu;
  unset($submenu['themes.php'][6]);
}
add_action('admin_menu', __NAMESPACE__ . '\\remove_customization_theme');

// Redirect any user trying to access customize page
function customize_admin_menu_redirect() {
  global $pagenow;
  if ($pagenow === 'customize.php') {
    wp_redirect(admin_url());
    exit;
  }
}
add_action('admin_init', __NAMESPACE__ . '\\customize_admin_menu_redirect');

// Hide customize buttons from admin area
function hide_customize_theme_buttons() {
  echo '<style type="text/css">.hide-if-no-customize {display: none !important;}</style>';
}
add_action('admin_head', __NAMESPACE__ . '\\hide_customize_theme_buttons');

// Remove theme customization from admin bar
function remove_customize_admin_bar() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('customize');
}
add_action('wp_before_admin_bar_render', __NAMESPACE__ . '\\remove_customize_admin_bar');

// Remove core update notice for non admin users
function remove_update_notice() {
  if (!current_user_can('update_core')) {
    remove_action('admin_notices', 'update_nag', 3);
    remove_action('network_admin_notices', 'update_nag', 3);
  }
}
add_action('admin_init', __NAMESPACE__ . '\\remove_update_notice');

// Change dashboard footer
function dashboard_footer() {
  echo '<span id="footer-thankyou">Using Shaba responsive theme by <a href="http://www.ensoul.it">Ensoul</a>.</span>';
}
add_filter('admin_footer_text', __NAMESPACE__ . '\\dashboard_footer');
