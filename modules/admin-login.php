<?php

namespace Ensoul\Rankz\AdminLogin;

// Change logo url
function login_logo_url(){
  $url = options('url');
  if ((empty($url)) || ($url == 1)) {
    $url = 'ensoul.it';
  }
  return $url;
}
add_filter('login_headerurl', __NAMESPACE__ . '\\login_logo_url');

// Change logo path and styles
function login_styles() {
  $color = options('color');
  if ((empty($color)) || ($color == 1)) {
    $color = '#E41B44';
  }
  echo '<style type="text/css">
    #login h1 a {
      background: url('.get_template_directory_uri().'/dist/images/login-logo.png) no-repeat top center;
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
    input[type=text]:focus, input[type=password]:focus {
      border-color: '.$color.';
      -webkit-box-shadow: 0 0 2px '.$color.';
              box-shadow: 0 0 2px '.$color.';
    }
    .wp-core-ui .button-primary {
      background: '.$color.';
      border-color: '.adjustBrightness($color, -50).';
      -webkit-box-shadow: inset 0 1px 0 '.adjustBrightness($color, 40).',0 1px 0 rgba(0,0,0,.15);
              box-shadow: inset 0 1px 0 '.adjustBrightness($color, 40).',0 1px 0 rgba(0,0,0,.15);
    }
    .wp-core-ui .button-primary:hover {
      background: '.adjustBrightness($color, -20).';
      border-color: '.adjustBrightness($color, -70).';
      -webkit-box-shadow: inset 0 1px 0 '.adjustBrightness($color, 30).',0 1px 0 rgba(0,0,0,.15);
              box-shadow: inset 0 1px 0 '.adjustBrightness($color, 30).',0 1px 0 rgba(0,0,0,.15);
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

// Options function to get add_theme_support attributes
function options($option) {
  static $options;
  if (!isset($options)) {
    $options = \Ensoul\Rankz\Options::getByFile(__FILE__);
    $options['url'] = &$options[0];
    $options['color'] = &$options[1];
  }
  return $options[$option];
}

// adjustBrightness function to get darker and ligher colors
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
    $color   = hexdec($color); // Convert to decimal
    $color   = max(0, min(255, $color + $steps)); // Adjust color
    $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
  }
  return $return;
}
