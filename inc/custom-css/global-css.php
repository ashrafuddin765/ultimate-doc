<?php

    $docs_content_width = get_theme_mod( 'docs_page_width', '1300px' );
    $ud_body_bg_color = get_theme_mod( 'ud_body_bg_color', '#ffffff' );
    $ud_body_color = get_theme_mod( 'body_primary_color', 'rgba(0, 0, 0, 0.7)' );
    $ud_body_font = get_theme_mod( 'ud_typhography', [] );

    if( isset( $ud_body_font['font-family'] ) ){
        $ud_dynamic_css .= '.ud-container {font-family:' . esc_attr( $ud_body_font['font-family'] ) .' } ';
        $ud_dynamic_css .= "\n";
    }

    if( isset( $ud_body_font['variant'] ) ){
        $ud_dynamic_css .= '.ud-container { font-weight:' . esc_attr( $ud_body_font['variant'] ) .' } ';
        $ud_dynamic_css .= "\n";
    }

    if( isset( $ud_body_font['font-size'] ) ){
        $ud_dynamic_css .= '.ud-container { font-size:' . esc_attr( $ud_body_font['font-size'] ) .' } ';
        $ud_dynamic_css .= "\n";
    }

    if( isset( $ud_body_font['line-height'] ) ){
        $ud_dynamic_css .= '.ud-container { line-height:' . esc_attr( $ud_body_font['line-height'] ) .' } ';
        $ud_dynamic_css .= "\n";
    }

    if( isset( $ud_body_font['text-transform'] ) ){
        $ud_dynamic_css .= '.ud-container { text-transform:' . esc_attr( $ud_body_font['text-transform'] ) .' } ';
        $ud_dynamic_css .= "\n";
    }

    if($docs_content_width){
        $ud_dynamic_css .= '.ud-container { max-width:' . esc_attr( $docs_content_width ) .'px } ';
        $ud_dynamic_css .= "\n";
    }

    if($ud_body_bg_color){
        $ud_dynamic_css .= 'body.ud-body { background-color:' . esc_attr( $ud_body_bg_color ) .' } ';
        $ud_dynamic_css .= "\n";
    }

    if($ud_body_color){
        $ud_dynamic_css .= 'body.ud-body { color:' . esc_attr( $ud_body_color ) .' } ';
        $ud_dynamic_css .= "\n";
    }

?>