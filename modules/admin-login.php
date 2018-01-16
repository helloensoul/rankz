<?php

namespace Ensoul\Rankz\AdminLogin;

/**
 * Customize login page
 *
 * You can enable/disable this feature in functions.php (or lib/setup.php if you're using Sage):
 * add_theme_support('rankz-admin-login');
 */

/**
 * Change login colors
 */
function login_colors() {
  $color = options('color');
  if (!$color || substr($color, 0, 1) !== "#" || strlen($color) <= 3) {
    return;
  }
  echo '<style type="text/css">
    #login h1 a:focus {
      box-shadow: 0 0 0 1px '.$color.', 0 0 2px 1px '.$color.';
    }
    .login .message {
      border-left-color: #7ad03a;
    }
    input[type=text]:focus, input[type=password]:focus, input[type=radio]:focus, input[type=checkbox]:focus {
      outline: none;
      border-color: '.$color.';
      box-shadow: 0 0 2px '.$color.';
    }
    .wp-core-ui .button-primary, .wp-core-ui .button-primary:visited {
      outline: none;
      color: #fff;
      text-decoration: none;
      background: '.$color.';
      border-color: '.adjust_brightness($color, -50).' '.adjust_brightness($color, -60).' '.adjust_brightness($color, -60).';
      text-shadow: 0 -1px 1px '.adjust_brightness($color, -40).',1px 0 1px '.adjust_brightness($color, -40).',0 1px 1px '.adjust_brightness($color, -40).',-1px 0 1px '.adjust_brightness($color, -40).';
      box-shadow: 0 1px 0 '.adjust_brightness($color, -40).';
    }
    .wp-core-ui .button-primary:hover, .wp-core-ui .button-primary:focus {
      color: #fff;
      background: '.adjust_brightness($color, 10).';
      border-color: '.adjust_brightness($color, -60).';
    }
    .wp-core-ui .button-primary:focus {
      box-shadow: 0 1px 0 '.adjust_brightness($color, -50).',0 0 2px 1px '.adjust_brightness($color, 10).';
    }
    .wp-core-ui .button-primary:active {
      background: '.adjust_brightness($color, -20).';
      border-color: '.adjust_brightness($color, -60).';
      box-shadow: inset 0 2px 0 '.adjust_brightness($color, -60).';
    }
    .login #nav a:hover, .login #backtoblog a:hover {
      color: '.$color.';
    }
    input[type="checkbox"]:checked::before {
      color: '.$color.';
    }
  </style>';
}
add_action('login_head', __NAMESPACE__ . '\\login_colors');

/**
 * Change login logo path
 */
function login_logo_path() {
  $logo_path = options('path');
  if (!$logo_path) { return; }
  if (filter_var($logo_path, FILTER_VALIDATE_URL)) {
    $logo_uri = $logo_path;
  } else {
    $logo_uri = get_theme_file_uri().'/'.$logo_path;
  }
  echo '<style type="text/css">
    #login h1 a {
      background: url('.$logo_uri.') no-repeat top center;
      background-size: auto 100px;
      height: 100px;
      width: auto;
      outline: none;
      transition: none;
    }
  </style>';
}
add_action('login_head', __NAMESPACE__ . '\\login_logo_path');

/**
 * Change login logo url
 */
function login_logo_url(){
  $url = options('url');
  if (!$url) { return 'https://wordpress.org/'; }
  return $url;
}
add_filter('login_headerurl', __NAMESPACE__ . '\\login_logo_url');

/**
 * Options function to get add_theme_support attributes
 */
function options($option) {
  static $options;
  if (!isset($options)) {
    $options = \Ensoul\Rankz\Options::getByFile(__FILE__);
    $options['color'] = &$options[0];
    $options['path'] = &$options[1];
    $options['url'] = &$options[2];
  }
  return $options[$option];
}

/**
 * Function to get darker and ligher colors
 */
function adjust_brightness($hex, $steps) {
  // Steps should be between -255 and 255. Negative = darker, positive = lighter
  $steps = max(-255, min(255, $steps));
  // Normalize into a six character long hex string
  $hex = str_replace('#', '', $hex);
  if (strlen($hex) == 3) {
    $hex = str_repeat(substr($hex, 0, 1), 2).str_repeat(substr($hex, 1, 1), 2).str_repeat(substr($hex, 2, 1), 2);
  }
  // Split into three parts: R, G and B
  $color_parts = str_split($hex, 2);
  $return = '#';
  foreach ($color_parts as $color) {
    // Convert to decimal
    $color   = hexdec($color);
    // Adjust color
    $color   = max(0, min(255, $color + $steps));
    // Make two char hex code
    $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
  }
  return $return;
}
