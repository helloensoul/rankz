<?php

namespace Ensoul\Rankz\DisableEditors;

/**
 *
 * You can enable/disable this feature in functions.php (or lib/setup.php if you're using Shaba):
 * add_theme_support('rankz-disable-editors');
 */

// Remove editors for plugins and theme files
function remove_editors() {
  define('DISALLOW_FILE_EDIT', true);
}
add_action('admin_init', __NAMESPACE__ . '\\remove_editors');
