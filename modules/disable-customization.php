<?php

namespace Ensoul\Rankz\DisableCustomization;

/**
 * Disable WordPress customization
 *
 * You can enable/disable this feature in functions.php (or lib/setup.php if you're using Sage):
 * add_theme_support('rankz-disable-customization');
 */

/**
 * Remove theme customization from admin menu
 */
function remove_customization_theme() {
  global $submenu;
  unset($submenu['themes.php'][6]);
}
add_action('admin_menu', __NAMESPACE__ . '\\remove_customization_theme');

/**
 * Redirect any user trying to access customize page
 */
function customize_admin_menu_redirect() {
  global $pagenow;
  if ($pagenow === 'customize.php') {
    wp_redirect(admin_url());
    exit;
  }
}
add_action('admin_init', __NAMESPACE__ . '\\customize_admin_menu_redirect');

/**
 * Hide customize buttons from admin area
 */
function hide_customize_theme_buttons() {
  echo '<style type="text/css">.hide-if-no-customize {display: none !important;}</style>';
}
add_action('admin_head', __NAMESPACE__ . '\\hide_customize_theme_buttons');

/**
 * Remove theme customization from admin bar
 */
function remove_customize_admin_bar() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('customize');
}
add_action('wp_before_admin_bar_render', __NAMESPACE__ . '\\remove_customize_admin_bar');
