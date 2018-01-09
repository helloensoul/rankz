<?php

namespace Ensoul\Rankz\AdminLogin;

/**
 * Customize Wordpress login page
 *
 * You can enable/disable this feature in functions.php (or lib/setup.php if you're using Sage):
 * add_theme_support('rankz-admin-login');
 */

/**
 * Change logo url
 */
function login_logo_url(){
  $url = options('url');
  if ((empty($url)) || ($url == 1)) {
    $url = 'ensoul.it';
  }
  return $url;
}
add_filter('login_headerurl', __NAMESPACE__ . '\\login_logo_url');

/**
 * Change logo path and styles
 */
function login_styles() {
  $color = options('color');
  if ((empty($color)) || ($color == 1)) {
    $color = '#E41B44';
  }
  $logo_uri = get_theme_file_uri().'/dist/images/login-logo.png';
  $logo_path = get_theme_file_path().'/dist/images/login-logo.png';
  if(file_exists($logo_path)) {
    echo '<style type="text/css">
      #login h1 a {
        background: url('.$logo_uri.') no-repeat top center;
        background-size: auto 100px;
        height: 100px;
        width: auto;
        outline: none;
        -webkit-transition: none;
           -moz-transition: none;
            -ms-transition: none;
             -o-transition: none;
                transition: none;
      }
    </style>';
  }
  echo '<style type="text/css">
    #login h1 a:focus {
      color: transparent;
      -webkit-box-shadow: none;
         -moz-box-shadow: none;
          -ms-box-shadow: none;
           -o-box-shadow: none;
              box-shadow: none;
    }
    .login .message {
      border-left: 4px solid #7ad03a;
    }
    input[type=text]:focus, input[type=password]:focus, input[type=radio]:focus, input[type=checkbox]:focus {
      outline: none;
      border-color: '.$color.';
      -webkit-box-shadow: 0 0 2px '.$color.';
         -moz-box-shadow: 0 0 2px '.$color.';
          -ms-box-shadow: 0 0 2px '.$color.';
           -o-box-shadow: 0 0 2px '.$color.';
              box-shadow: 0 0 2px '.$color.';
    }
    .wp-core-ui .button-primary, .wp-core-ui .button-primary:visited {
      outline: none;
      color: #fff;
      text-decoration: none;
      background: '.$color.';
      border-color: '.adjustBrightness($color, -50).' '.adjustBrightness($color, -60).' '.adjustBrightness($color, -60).';
      text-shadow: 0 -1px 1px '.adjustBrightness($color, -40).',1px 0 1px '.adjustBrightness($color, -40).',0 1px 1px '.adjustBrightness($color, -40).',-1px 0 1px '.adjustBrightness($color, -40).';
      -webkit-box-shadow: 0 1px 0 '.adjustBrightness($color, -40).';
         -moz-box-shadow: 0 1px 0 '.adjustBrightness($color, -40).';
          -ms-box-shadow: 0 1px 0 '.adjustBrightness($color, -40).';
           -o-box-shadow: 0 1px 0 '.adjustBrightness($color, -40).';
              box-shadow: 0 1px 0 '.adjustBrightness($color, -40).';
    }
    .wp-core-ui .button-primary:hover, .wp-core-ui .button-primary:focus {
      color: #fff;
      background: '.adjustBrightness($color, 10).';
      border-color: '.adjustBrightness($color, -60).';
    }
    .wp-core-ui .button-primary:focus {
      -webkit-box-shadow: 0 1px 0 '.adjustBrightness($color, -50).',0 0 2px 1px '.adjustBrightness($color, 10).';
         -moz-box-shadow: 0 1px 0 '.adjustBrightness($color, -50).',0 0 2px 1px '.adjustBrightness($color, 10).';
          -ms-box-shadow: 0 1px 0 '.adjustBrightness($color, -50).',0 0 2px 1px '.adjustBrightness($color, 10).';
           -o-box-shadow: 0 1px 0 '.adjustBrightness($color, -50).',0 0 2px 1px '.adjustBrightness($color, 10).';
              box-shadow: 0 1px 0 '.adjustBrightness($color, -50).',0 0 2px 1px '.adjustBrightness($color, 10).';
    }
    .wp-core-ui .button-primary:active {
      background: '.adjustBrightness($color, -20).';
      border-color: '.adjustBrightness($color, -60).';
      -webkit-box-shadow: inset 0 2px 0 '.adjustBrightness($color, -60).';
         -moz-box-shadow: inset 0 2px 0 '.adjustBrightness($color, -60).';
          -ms-box-shadow: inset 0 2px 0 '.adjustBrightness($color, -60).';
           -o-box-shadow: inset 0 2px 0 '.adjustBrightness($color, -60).';
              box-shadow: inset 0 2px 0 '.adjustBrightness($color, -60).';
    }
    .login #nav a:hover, .login #backtoblog a:hover {
      color: '.$color.';
    }
    .login form .input {
      margin: 5px 6px 16px 0;
    }
    input[type="checkbox"]:checked::before {
      color: '.$color.';
    }
  </style>';
}
add_action('login_head', __NAMESPACE__ . '\\login_styles');

/**
 * Options function to get add_theme_support attributes
 */
function options($option) {
  static $options;
  if (!isset($options)) {
    $options = \Ensoul\Rankz\Options::getByFile(__FILE__);
    $options['url'] = &$options[0];
    $options['color'] = &$options[1];
  }
  return $options[$option];
}

/**
 * Function to get darker and ligher colors
 */
function adjustBrightness($hex, $steps) {
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
