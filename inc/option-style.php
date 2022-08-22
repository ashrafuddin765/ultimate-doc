<?php
function ud_options_scripts(){

   $ud_dynamic_css  = '';
 
   if ( file_exists(  UD_INC . 'custom-css/sidebar-css.php' ) ) {
        require_once(  UD_INC . 'custom-css/sidebar-css.php' );
    };

    if ( file_exists( UD_INC . 'custom-css/single-docs-css.php' ) ) {
       require_once ( UD_INC . 'custom-css/single-docs-css.php' );
    }

    if ( file_exists( UD_INC . 'custom-css/docs-page.php' ) ) {
       require_once ( UD_INC . 'custom-css/docs-page.php' );
    }
    if ( file_exists( UD_INC . 'custom-css/section-page.php' ) ) {
       require_once ( UD_INC . 'custom-css/section-page.php' );
    }
    if ( file_exists( UD_INC . 'custom-css/search.php' ) ) {
       require_once ( UD_INC . 'custom-css/search.php' );
    }
    if ( file_exists( UD_INC . 'custom-css/global-css.php' ) ) {
       require_once ( UD_INC . 'custom-css/global-css.php' );
    }

    $ud_dynamic_css = ud_css_strip_whitespace( $ud_dynamic_css );
	wp_add_inline_style( 'ud-frontend', $ud_dynamic_css );

}
add_action( 'wp_enqueue_scripts', 'ud_options_scripts', 5 );