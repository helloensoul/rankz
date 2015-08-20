<?php

namespace Ensoul\Rankz\DisableEditors;


// Remove submenu editors for plugins and theme files
function hide_editors() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
  remove_submenu_page('plugins.php', 'plugin-editor.php');
}
add_action('admin_menu', __NAMESPACE__ . '\\hide_editors');

// Redirect any user trying to access editors page
function editors_admin_menu_redirect() {
  global $pagenow;
  if (($pagenow === 'theme-editor.php') || ($pagenow === 'plugin-editor.php')) {
    wp_redirect(admin_url()); exit;
  }
}
add_action('admin_init', __NAMESPACE__ . '\\editors_admin_menu_redirect');
