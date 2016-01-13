<?php

namespace Ensoul\Rankz\YoastSeoACF;

/**
 * Validate all ACF fields with Yoast SEO plugin
 *
 * You can enable/disable this feature in functions.php (or lib/setup.php if you're using Sage):
 * add_theme_support('rankz-yoast-seo-acf');
 */

function enqueue_yoast_seo_acf_js() {
    wp_enqueue_script('yoast_seo_acf_js', plugin_dir_url(__DIR__) . 'js/yoast-seo-acf.min.js');
}
add_action('admin_enqueue_scripts', __NAMESPACE__ . '\\enqueue_yoast_seo_acf_js');
