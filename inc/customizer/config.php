<?php

if (function_exists('kirki')) {

	Kirki::add_panel( 'ud_panel', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Finest Docs', 'ud-mini-cart' ),
	) );

	// Global
	if ( file_exists(  UD_INC . 'customizer/globla.php' ) ) {
		require_once(  UD_INC . 'customizer/globla.php' );
	}

	//docs-pages
	if ( file_exists(  UD_INC . 'customizer/single-docs-page.php' ) ) {
		require_once(  UD_INC . 'customizer/single-docs-page.php' );
	}

	// sidebar
	if ( file_exists(  UD_INC . 'customizer/sidebar.php' ) ) {
		require_once(  UD_INC . 'customizer/sidebar.php' );
	}

	//search
	if ( file_exists(  UD_INC . 'customizer/search.php' ) ) {
		require_once(  UD_INC . 'customizer/search.php' );
	}

	// archive
	if ( file_exists(  UD_INC . 'customizer/archive-page.php' ) ) {
		require_once(  UD_INC . 'customizer/archive-page.php' );
	}

	// docs page
	if ( file_exists(  UD_INC . 'customizer/docs-page.php' ) ) {
		require_once(  UD_INC . 'customizer/docs-page.php' );
	}

	
	

}
