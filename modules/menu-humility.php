<?php

namespace Ensoul\Rankz\MenuHumility;

/**
 * Menu Humility plugin
 *
 * @link https://wordpress.org/plugins/menu-humility/
 */
class Menu_Humility {
  static $instance;

  public function __construct() {
    self::$instance =& $this;
    // Tell WordPress we're changing the menu order
    add_filter( 'custom_menu_order', '__return_true' );
    // Add our filter way late, after other plugins have defiled the menu
    add_filter( 'menu_order', array( $this, 'menu_order' ), 9999 );
  }

  public function menu_order( $menu ) {
    $penalty_box = array();

    foreach ( $menu as $key => $item ) {
      if ( 'separator1' == $item ) {
        // Have reached the content area. We're done.
        break;
      } elseif ( 'index.php' != $item ) {
        // Yank it out and put it in the penalty box.
        $penalty_box[] = $item;
        unset( $menu[$key] );
      }
    }

    // Shove the penalty box items onto the end
    return array_merge( $menu, $penalty_box );
  }

}
new Menu_Humility;
