<?php
function ultd__options_scripts(){

   $ultd__dynamic_css  = '';
 
   if ( file_exists(  ULTD_INC . 'custom-css/sidebar-css.php' ) ) {
        require_once(  ULTD_INC . 'custom-css/sidebar-css.php' );
    };

    if ( file_exists( ULTD_INC . 'custom-css/single-docs-css.php' ) ) {
       require_once ( ULTD_INC . 'custom-css/single-docs-css.php' );
    }

    if ( file_exists( ULTD_INC . 'custom-css/docs-page.php' ) ) {
       require_once ( ULTD_INC . 'custom-css/docs-page.php' );
    }
    if ( file_exists( ULTD_INC . 'custom-css/section-page.php' ) ) {
       require_once ( ULTD_INC . 'custom-css/section-page.php' );
    }
    if ( file_exists( ULTD_INC . 'custom-css/search.php' ) ) {
       require_once ( ULTD_INC . 'custom-css/search.php' );
    }
    if ( file_exists( ULTD_INC . 'custom-css/global-css.php' ) ) {
       require_once ( ULTD_INC . 'custom-css/global-css.php' );
    }

    $ultd__dynamic_css = ultd__css_strip_whitespace( $ultd__dynamic_css );
	wp_add_inline_style( 'ultd--frontend', $ultd__dynamic_css );

}
add_action( 'wp_enqueue_scripts', 'ultd__options_scripts', 5 );