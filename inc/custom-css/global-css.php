<?php

    $docs_content_width = get_theme_mod( 'docs_page_width', '1300px' );
    $ultd__body_bg_color = get_theme_mod( 'ultd__body_bg_color', '#ffffff' );
    $ultd__body_color = get_theme_mod( 'body_primary_color', 'rgba(0, 0, 0, 0.7)' );
    $ultd__body_font = get_theme_mod( 'ultd__typhography', [] );

    if( isset( $ultd__body_font['font-family'] ) ){
        $ultd__dynamic_css .= '.ultd--container {font-family:' . esc_attr( $ultd__body_font['font-family'] ) .' } ';
        $ultd__dynamic_css .= "\n";
    }

    if( isset( $ultd__body_font['variant'] ) ){
        $ultd__dynamic_css .= '.ultd--container { font-weight:' . esc_attr( $ultd__body_font['variant'] ) .' } ';
        $ultd__dynamic_css .= "\n";
    }

    if( isset( $ultd__body_font['font-size'] ) ){
        $ultd__dynamic_css .= '.ultd--container { font-size:' . esc_attr( $ultd__body_font['font-size'] ) .' } ';
        $ultd__dynamic_css .= "\n";
    }

    if( isset( $ultd__body_font['line-height'] ) ){
        $ultd__dynamic_css .= '.ultd--container { line-height:' . esc_attr( $ultd__body_font['line-height'] ) .' } ';
        $ultd__dynamic_css .= "\n";
    }

    if( isset( $ultd__body_font['text-transform'] ) ){
        $ultd__dynamic_css .= '.ultd--container { text-transform:' . esc_attr( $ultd__body_font['text-transform'] ) .' } ';
        $ultd__dynamic_css .= "\n";
    }

    if($docs_content_width){
        $ultd__dynamic_css .= '.ultd--container { max-width:' . esc_attr( $docs_content_width ) .'px } ';
        $ultd__dynamic_css .= "\n";
    }

    if($ultd__body_bg_color){
        $ultd__dynamic_css .= 'body.ultd--body { background-color:' . esc_attr( $ultd__body_bg_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }

    if($ultd__body_color){
        $ultd__dynamic_css .= 'body.ultd--body { color:' . esc_attr( $ultd__body_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }

?>