<?php

// Include NavWalker Class For Bootstrap Navigation Menu

require_once('wp-bootstrap-navwalker.php');


    /**
     * Function To Add My Custom Styles
     * Added By @Yassine
     * wp_enqueue_style()
     */

function elzero_added_styles() {
    wp_enqueue_style('bootstrap-css',   get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/css/fontawesome.min.css' );
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css' );
}


/**
 * Function To Add My Custom Scripts
 * Added By @Yassine
 * wp_enqueue_script()
 */

function elzero_added_scripts() {

    wp_deregister_script('jquery'); // Remove Registration For Jquery
    wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, '', true);   // Register A New Jquery In Footer
    wp_enqueue_script('jquery');    //Enqueue The New Jquery 
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js' , array('jquery'), false, true);
    wp_enqueue_script('bootstrap-bundle-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js' , array('jquery'), false, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js' , array(), false, true);

}

/**
 * Add action
 * Added By @Yassine
 * add_action
 */

add_action('wp_enqueue_scripts','elzero_added_styles');
add_action('wp_enqueue_scripts','elzero_added_scripts');


/**
 * Add A Custom Menu Support
 * Added By @Yassine
 */

 function elzero_register_custom_menu() {
   // register_nav_menu('boostrap-menu', __('Navigation bar'));
    register_nav_menus(array(
        'boostrap-menu' => 'Navigation bar',
        'footer-menu' => 'Footer Menu',
    ));
 }

 add_action('init','elzero_register_custom_menu');


 function elzero_bootstrap_menu(){
    wp_nav_menu(array(
        'theme_location' => 'boostrap-menu',
        'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
        'container'      =>  false,
        'depth'          => 2,
        'walker'         => new WP_Bootstrap_Navwalker()
    ));
 }



//  add_filter( 'nav_menu_link_attributes', 'bootstrap5_dropdown_fix' );

//  function bootstrap5_dropdown_fix( $atts ) {
//      if ( array_key_exists( 'data-toggle', $atts ) ) {
//          unset( $atts['data-toggle'] );
//          $atts['data-bs-toggle'] = 'dropdown';
//      }
//      return $atts;
// }
