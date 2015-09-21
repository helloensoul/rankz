<?php

namespace Ensoul\Rankz\DisableEditors;

// Remove editors for plugins and theme files
function remove_editors() {
  define('DISALLOW_FILE_EDIT', true);
}
add_action('admin_init', __NAMESPACE__ . '\\remove_editors');
