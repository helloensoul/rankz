<?php

namespace Ensoul\Rankz\DisableCustomizer;

/**
 * Disable Customizer
 *
 * You can enable/disable this feature in functions.php (or lib/setup.php if you're using Sage):
 * add_theme_support('rankz-disable-customizer');
 */

/**
 * Disable Customizer from admin menu
 */
function disable_customizer_admin_menu() {
  global $submenu;
  unset($submenu['themes.php'][6]);
}
add_action('admin_menu', __NAMESPACE__ . '\\disable_customizer_admin_menu');

/**
 * Disable Customizer from admin bar
 */
function disable_customizer_admin_bar() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('customize');
}
add_action('wp_before_admin_bar_render', __NAMESPACE__ . '\\disable_customizer_admin_bar');

/**
 * Redirect any user trying to access Customizer page
 */
function customizer_admin_menu_redirect() {
  global $pagenow;
  if ($pagenow === 'customize.php') {
    wp_redirect(admin_url());
    exit;
  }
}
add_action('admin_init', __NAMESPACE__ . '\\customizer_admin_menu_redirect');

/**
 * Hide Customizer buttons from admin area
 */
function hide_customizer_buttons() {
  echo '<style type="text/css">.hide-if-no-customize {display: none !important;}</style>';
}
add_action('admin_head', __NAMESPACE__ . '\\hide_customizer_buttons');
