<?php

namespace Ensoul\Rankz\DisableUpdateNotice;

/**
 * Disable core update notice for non admin users
 *
 * You can enable/disable this feature in functions.php (or lib/setup.php if you're using Sage):
 * add_theme_support('rankz-disable-update-notice');
 */

function disable_update_notice() {
  if (!current_user_can('update_core')) {
    remove_action('admin_notices', 'update_nag', 3);
    remove_action('network_admin_notices', 'update_nag', 3);
  }
}
add_action('admin_init', __NAMESPACE__ . '\\disable_update_notice');
