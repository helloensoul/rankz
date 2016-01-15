<?php
/*
Plugin Name:        Rankz
Plugin URI:         http://ensoul.it/
Description:        A WordPress plugin which contains a bunch of customizations for Sage WordPress theme.
Version:            1.2.1
Author:             Ensoul
Author URI:         http://ensoul.it/
License:            MIT License
License URI:        http://opensource.org/licenses/MIT
*/

namespace Ensoul\Rankz;

class Options {
  protected static $modules = [];
  protected $options = [];
  public static function init($module, $options = []) {
    if (!isset(self::$modules[$module])) {
      self::$modules[$module] = new static((array) $options);
    }
    return self::$modules[$module];
  }
  public static function getByFile($file) {
    if (file_exists($file) || file_exists(__DIR__ . '/modules/' . $file)) {
      return self::get('rankz-' . basename($file, '.php'));
    }
    return [];
  }
  public static function get($module) {
    if (isset(self::$modules[$module])) {
      return self::$modules[$module]->options;
    }
    if (substr($module, 0, 5) !== 'rankz-') {
      return self::get('rankz-' . $module);
    }
    return [];
  }
  protected function __construct($options) {
    $this->set($options);
  }
  public function set($options) {
    $this->options = $options;
  }
}

require_once __DIR__ . '/lib/utils.php';

function load_modules() {
  global $_wp_theme_features;
  foreach (glob(__DIR__ . '/modules/*.php') as $file) {
    $feature = 'rankz-' . basename($file, '.php');
    if (isset($_wp_theme_features[$feature])) {
      Options::init($feature, $_wp_theme_features[$feature]);
      require_once $file;
    }
  }
}
add_action('after_setup_theme', __NAMESPACE__ . '\\load_modules', 100);
