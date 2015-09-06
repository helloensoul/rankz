<?php

namespace Ensoul\Rankz\DisableEditors;


// Remove editors from backend with disallow file mods constant
function disallow_file_mods() {
  define('DISALLOW_FILE_MODS',true);
}
add_action('admin_init', __NAMESPACE__ . '\\disallow_file_mods');

// Redirect any user trying to access editors page
function editors_admin_menu_redirect() {
  global $pagenow;
  if (($pagenow === 'theme-editor.php') || ($pagenow === 'plugin-editor.php')) {
    wp_redirect(admin_url()); exit;
  }
}
add_action('admin_init', __NAMESPACE__ . '\\editors_admin_menu_redirect');
