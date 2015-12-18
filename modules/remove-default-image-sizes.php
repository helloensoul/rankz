<?php

namespace Ensoul\Rankz\RemoveDefaultImageSizes;

// Remove default wordpress image sizes
function remove_default_image_sizes($sizes) {
    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['large']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', __NAMESPACE__ . '\\remove_default_image_sizes');

// Remove media page from admin menu
function remove_media_admin_menu() {
  remove_submenu_page('options-general.php', 'options-media.php');
}
add_action('admin_menu', __NAMESPACE__ . '\\remove_media_admin_menu');

// Redirect any user trying to access media page
function media_admin_menu_redirect() {
  global $pagenow;
  if ($pagenow === 'options-media.php') {
    wp_redirect(admin_url());
    exit;
  }
}
add_action('admin_init', __NAMESPACE__ . '\\media_admin_menu_redirect');
