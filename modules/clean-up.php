<?php

namespace Ensoul\Rankz\CleanUp;


/**
 * Remove unnecessary dashboard widgets
 *
 * @link http://www.deluxeblogtips.com/2011/01/remove-dashboard-widgets-in-wordpress.html
 */
function remove_dashboard_widgets() {
  remove_action( 'welcome_panel', 'wp_welcome_panel' ); // Hide Welcome Panel
  remove_meta_box('dashboard_primary', 'dashboard', 'side'); // Hide WordPress News
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // Hide Quick Draft
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // Hide At a Glance
  remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // Hide Activity
}
add_action('admin_init', __NAMESPACE__ . '\\remove_dashboard_widgets');
