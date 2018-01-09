<?php

namespace Ensoul\Rankz\RemoveDefaultImageSizes;

/**
 *
 * You can enable/disable this feature in functions.php (or lib/setup.php if you're using Sage):
 * add_theme_support('rankz-remove-default-image-sizes');
 */

/**
 * Remove default WordPress image sizes
 */
function remove_default_image_sizes($sizes) {
  unset($sizes['thumbnail']);
  unset($sizes['medium']);
  unset($sizes['medium_large']);
  unset($sizes['large']);
  return $sizes;
}
add_filter('intermediate_image_sizes_advanced', __NAMESPACE__ . '\\remove_default_image_sizes');
