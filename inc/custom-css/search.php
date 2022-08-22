<?php 
    $search_width = get_theme_mod( 'search_width', '100%' );
    $search_height = get_theme_mod( 'search_height', '60px' );
    $search_filed_color = get_theme_mod( 'search_filed_color', '#161617' );
    $search_field_size = get_theme_mod( 'search_field_size', '16px' );
    $docs_bg_color = get_theme_mod( 'search_bag_color', '#FAFAFA' );
    $search_border_setting = get_theme_mod( 'search_border_setting', '' );
    $search_border_type = get_theme_mod( 'search_border_type', 'solid' );
    $search_border_color = get_theme_mod( 'search_border_color', 'rgba(22, 22, 23, 0.15)' );
    $search_text_padding = get_theme_mod( 'search_text_padding', '50px' );
    $search_border_radius = get_theme_mod( 'search_border_radius', '5px' );

    if($search_width){
        $ud_dynamic_css .= 'form.search-form.ud-search-form input.search-field { width:' . esc_attr( $search_width ) .'% } ';
        $ud_dynamic_css .= "\n";
    }
    if($search_height){
        $ud_dynamic_css .= 'form.search-form.ud-search-form input.search-field { height:' . esc_attr( $search_height ) .'px } ';
        $ud_dynamic_css .= "\n";
    }

    if ( $search_filed_color) {
        $ud_dynamic_css .= 'form.search-form.ud-search-form input.search-field  { color:' . esc_attr( $search_filed_color ) .' } ';
        $ud_dynamic_css .= "\n";
    }
    if ( $search_field_size ) {
        $ud_dynamic_css .= 'form.search-form.ud-search-form input.search-field  { font-size:' . esc_attr( $search_field_size ) .' } ';
        $ud_dynamic_css .= "\n";
    }

    if( $docs_bg_color ){
        $ud_dynamic_css .= 'form.search-form.ud-search-form input.search-field {background-color: ' . esc_attr( $docs_bg_color ) . ' } ';
        $ud_dynamic_css .= "\n";
    }
    if(  $search_text_padding ){
        $ud_dynamic_css .= 'form.search-form.ud-search-form input.search-field {padding-left: ' . esc_attr(  $search_text_padding ) . ' } ';
        $ud_dynamic_css .= "\n";
    }

    if( $search_border_setting ){
        $ud_dynamic_css .= 'form.search-form.ud-search-form input.search-field {border-top: ' . esc_attr( $search_border_setting['top-width'] ) . ' } ';
        $ud_dynamic_css .= "\n";
    }
    if( $search_border_setting ){
        $ud_dynamic_css .= 'form.search-form.ud-search-form input.search-field {border-right: ' . esc_attr( $search_border_setting['right-width'] ) . ' } ';
        $ud_dynamic_css .= "\n";
    }
    if( $search_border_setting ){
        $ud_dynamic_css .= 'form.search-form.ud-search-form input.search-field {border-bottom: ' . esc_attr( $search_border_setting['bottom-width'] ) . ' } ';
        $ud_dynamic_css .= "\n";
    }
    if( $search_border_setting ){
        $ud_dynamic_css .= 'form.search-form.ud-search-form input.search-field {border-left: ' . esc_attr( $search_border_setting['left-width'] ) . ' } ';
        $ud_dynamic_css .= "\n";
    }
    if(  $search_border_type ){
        $ud_dynamic_css .= 'form.search-form.ud-search-form input.search-field {border-style: ' . esc_attr(  $search_border_type ) . ' } ';
        $ud_dynamic_css .= "\n";
    }
    if( $search_border_color ){
        $ud_dynamic_css .= 'form.search-form.ud-search-form input.search-field {border-color: ' . esc_attr( $search_border_color ) . ' } ';
        $ud_dynamic_css .= "\n";
    }
    if(  $search_border_radius ){
        $ud_dynamic_css .= 'form.search-form.ud-search-form input.search-field {border-radius: ' . esc_attr(  $search_border_radius ) . ' } ';
        $ud_dynamic_css .= "\n";
    }
   
?>