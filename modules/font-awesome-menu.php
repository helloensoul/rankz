<?php

namespace Ensoul\Rankz\FontAwesomeMenu;


/**
 * Font Awesome icons on menus
 */
class FontAwesomeMenu {
  function menu( $nav ){
    $menu_item = preg_replace_callback(
      '/(<li[^>]+class=")([^"]+)("?[^>]+>[^>]+>)([^<]+)<\/a>/',
      array( $this, 'replace' ),
      $nav
    );
    return $menu_item;
  }
  function replace( $a ){
    $start = $a[ 1 ];
    $classes = $a[ 2 ];
    $rest = $a[ 3 ];
    $text = $a[ 4 ];
    $before = true;
    $class_array = explode( ' ', $classes );
    $fontawesome_classes = array();
    foreach( $class_array as $key => $val ){
      if( 'fa' == substr( $val, 0, 2 ) ){
        if( 'fa' == $val ){
          unset( $class_array[ $key ] );
        } elseif( 'fa-after' == $val ){
          $before = false;
          unset( $class_array[ $key ] );
        } else {
          $fontawesome_classes[] = $val;
          unset( $class_array[ $key ] );
        }
      }
    }
    if( !empty( $fontawesome_classes ) ){
      $fontawesome_classes[] = 'fa';
      if( $before ){
        $newtext = '<i class="'.implode( ' ', $fontawesome_classes ).'"></i><span class="fontawesome-text">'.$text.'</span>';
      } else {
        $newtext = '<span class="fontawesome-text">'.$text.'</span><i class="'.implode( ' ', $fontawesome_classes ).'"></i>';
      }
    } else {
      $newtext = $text;
    }
    $item = $start.implode( ' ', $class_array ).$rest.$newtext.'</a>';
    return $item;
  }
  function shortcode_icon( $atts ){
    extract( shortcode_atts( array(
      'class' => '',
    ), $atts ) );
    if( !empty( $class ) ){
      $fa_exists = false;
      $class_array = explode( ' ', $class );
      foreach( $class_array as $c ){
        if( 'fa' == $c ){
          $fa_exists = true;
        }
      }
      if( !$fa_exists ){
        array_unshift( $class_array, 'fa' );
      }
      return '<i class="'.implode( ' ', $class_array ).'"></i>';
    }
  }
  function shortcode_stack( $atts, $content = null ){
    extract( shortcode_atts( array(
      'class' => '',
    ), $atts ) );
    if( empty( $class ) ){
      $class_array = array( 'fa-stack' );
    } else {
      $fa_stack_exists = false;
      $class_array = explode( ' ', $class );
      foreach( $class_array as $c ){
        if( 'fa-stack' == $c ){
          $fa_stack_exists = true;
        }
      }
      if( !$fa_stack_exists ){
        array_unshift( $class_array, 'fa-stack' );
      }
    }
    return '<span class="'.implode( ' ', $class_array ).'">'.do_shortcode( $content ).'</span>';
  }
  function __construct(){
    add_filter( 'wp_nav_menu' , array( $this, 'menu' ), 10, 2 );
    add_shortcode( 'fa', array( $this, 'shortcode_icon' ) );
    add_shortcode( 'fa-stack', array( $this, 'shortcode_stack' ) );
  }
}
$font_awesome_menu = new FontAwesomeMenu();
