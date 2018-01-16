<?php

namespace Ensoul\Rankz\DisableComments;

/**
 * Disable comments
 *
 * You can enable/disable this feature in functions.php (or lib/setup.php if you're using Sage):
 * add_theme_support('rankz-disable-comments');
 */

/**
 * Disable post types support for comments and trackbacks
 */
function disable_post_types_comments_and_trackbacks() {
  $post_types = get_post_types();
  foreach ($post_types as $post_type) {
    if (post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    }
  }
}
add_action('admin_init', __NAMESPACE__ . '\\disable_post_types_comments_and_trackbacks');

/**
 * Disable posts comments and pings
 */
function disable_posts_comments_and_pings() {
  return false;
}
add_filter('comments_open', __NAMESPACE__ . '\\disable_posts_comments_and_pings', 20, 2);
add_filter('pings_open', __NAMESPACE__ . '\\disable_posts_comments_and_pings', 20, 2);

/**
 * Hide existing comments
 */
function hide_existing_comments($comments) {
  $comments = array();
  return $comments;
}
add_filter('comments_array', __NAMESPACE__ . '\\hide_existing_comments', 10, 2);

/**
 * Disable comments from admin menu
 */
function disable_comments_admin_menu() {
  remove_menu_page('edit-comments.php');
  remove_submenu_page('options-general.php', 'options-discussion.php');
}
add_action('admin_menu', __NAMESPACE__ . '\\disable_comments_admin_menu');

/**
 * Disable comments from admin bar
 */
function disable_comments_admin_bar() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', __NAMESPACE__ . '\\disable_comments_admin_bar');

/**
 * Redirect any user trying to access comments page
 */
function comments_admin_menu_redirect() {
  global $pagenow;
  if (($pagenow === 'edit-comments.php') || ($pagenow === 'options-discussion.php')) {
    wp_redirect(admin_url());
    exit;
  }
}
add_action('admin_init', __NAMESPACE__ . '\\comments_admin_menu_redirect');
