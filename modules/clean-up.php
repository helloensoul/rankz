<?php

namespace Ensoul\Rankz\CleanUp;

/**
 * Remove unnecessary dashboard widgets, clean pages and posts
 *
 * @link http://www.deluxeblogtips.com/2011/01/remove-dashboard-widgets-in-wordpress.html
 * You can enable/disable this feature in functions.php (or lib/setup.php if you're using Sage):
 * add_theme_support('rankz-clean-up');
 */

/**
 * Remove unnecessary dashboard widgets
 */
function remove_dashboard_widgets() {
  remove_action('welcome_panel', 'wp_welcome_panel'); // Hide Welcome Panel
  remove_meta_box('dashboard_primary', 'dashboard', 'side'); // Hide WordPress.com Blog
  remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); // Hide other WordPress News
  remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); // Hide Plugins
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); // Hide Incoming Links
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // Hide Quick Press
  remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); // Hide Recent Drafts
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // Hide At a Glance
  remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // Hide Activity
}
add_action('admin_init', __NAMESPACE__ . '\\remove_dashboard_widgets');

/**
 * Clean posts
 */
function clean_posts() {
  remove_meta_box('trackbacksdiv', 'post', 'normal');
  remove_meta_box('postcustom', 'post', 'normal');
}
add_action('admin_menu', __NAMESPACE__ . '\\clean_posts');

/**
 * Clean pages
 */
function clean_pages() {
  remove_meta_box('postcustom', 'page', 'normal');
}
add_action('admin_menu', __NAMESPACE__ . '\\clean_pages');
