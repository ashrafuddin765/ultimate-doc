<?php

// if (function_exists('kirki')) {

	new \Kirki\Panel(
		'ultd__panel',
		[
			'priority'    => 10,
			'title'       => esc_html__( 'Ultimate Docs', 'ultimate-doc' ),
			'description' => esc_html__( 'Ultimate Docs.', 'ultimate-doc' ),
		]
	);

	// Global
	if ( file_exists(  ULTD_INC . 'customizer/globla.php' ) ) {
		require_once(  ULTD_INC . 'customizer/globla.php' );
	}

	//docs-pages
	if ( file_exists(  ULTD_INC . 'customizer/single-docs-page.php' ) ) {
		require_once(  ULTD_INC . 'customizer/single-docs-page.php' );
	}

	// sidebar
	if ( file_exists(  ULTD_INC . 'customizer/sidebar.php' ) ) {
		require_once(  ULTD_INC . 'customizer/sidebar.php' );
	}

	//search
	if ( file_exists(  ULTD_INC . 'customizer/search.php' ) ) {
		require_once(  ULTD_INC . 'customizer/search.php' );
	}

	// archive
	if ( file_exists(  ULTD_INC . 'customizer/archive-page.php' ) ) {
		require_once(  ULTD_INC . 'customizer/archive-page.php' );
	}

	// docs page
	if ( file_exists(  ULTD_INC . 'customizer/docs-page.php' ) ) {
		require_once(  ULTD_INC . 'customizer/docs-page.php' );
	}

	
	

// }
