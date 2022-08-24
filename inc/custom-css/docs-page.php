<?php 

    $docs_bg_color = get_theme_mod( 'single_area_backgound', '#F3F5F7' );
    $content_docs_padding = get_theme_mod( 'docs_content_padding' ) != ' ' ? get_theme_mod( 'docs_content_padding' ) : '' ;
    $docspadding = is_array($content_docs_padding ) ?  implode(' ', $content_docs_padding) : '';

    // column normal settings
    $colum_bg_color = get_theme_mod( 'column_background_color', '#ffffff' );
    $column_normal_padding = get_theme_mod( 'column_normal_padding' ) != ' ' ? get_theme_mod( 'column_normal_padding' ) : '' ;
    $columnpadding = is_array($column_normal_padding ) ?  implode(' ', $column_normal_padding) : '';
    $column_normal_margin = get_theme_mod( 'column_normal_margin' ) != ' ' ? get_theme_mod( 'column_normal_margin' ) : '' ;
    $column_margin = is_array($column_normal_margin ) ?  implode(' ', $column_normal_margin) : '';
    $column_border = get_theme_mod( 'border_width_setting', '' );
    $column_border_type = get_theme_mod( 'select_border_type', 'solid' );
    $column_border_color = get_theme_mod( 'column_border_color', 'rgba(45, 45, 49, 0.12)' );
    $column_border_radius = get_theme_mod( 'column_border_radius', '5px' );

     // column hover settings
     $colum_hover_color = get_theme_mod( 'column_hover_bg_color', '#ffffff' );
     $hover_normal_padding = get_theme_mod( 'column_hover_padding' ) != ' ' ? get_theme_mod( 'column_hover_padding' ) : '' ;
     $hoverpadding = is_array($hover_normal_padding ) ?  implode(' ', $hover_normal_padding) : '';
     $hover_border = get_theme_mod( 'hover_border_width_setting', '' );
     $hover_border_type = get_theme_mod( 'hover_border_type', 'solid' );
     $hover_border_color = get_theme_mod( 'hover_border_color', 'rgba(45, 45, 49, 0.12)' );
     $hover_border_radius = get_theme_mod( 'hover_border_radius', '5px' );

    //  thumbnail
    $doc_thumbnail_width = get_theme_mod( 'doc_thumbnail_width', '100%' );
    $doc_thumbnail_height = get_theme_mod( 'doc_thumbnail_height', '190px' );
    // contetnt area
    $contetn_bg_color = get_theme_mod( 'doc_content_area_bg', '#ffffff' );
    $content_area_padding = get_theme_mod( 'text_content_padding' ) != ' ' ? get_theme_mod( 'text_content_padding' ) : '' ;
    $contentpadding = is_array($content_area_padding ) ?  implode(' ', $content_area_padding) : '';
    $doc_title_font_size = get_theme_mod( 'doc_title_font_size', '21px' );
    $doc_title_gap = get_theme_mod( 'doc_title_gap', '15px' );
    $doc_title_font_color = get_theme_mod( 'doc_title_font_color', '#161617' );
    
    //description 
    $doc_decription_font_size = get_theme_mod( 'doc_decription_font_size', '16px' );
    $doc_description_gap = get_theme_mod( 'doc_description_gap', '35px' );
    $doc_description_color = get_theme_mod( 'doc_description_color', 'rgba(0, 0, 0, 0.7)' );

    // content hover
    $hover_contetn_bg_color = get_theme_mod( 'doc_hover_content_area_bg', '#ffffff' );
    $content_hover_padding = get_theme_mod( 'text_hover_padding' ) != ' ' ? get_theme_mod( 'text_hover_padding' ) : '' ;
    $contenthovepadding = is_array($content_hover_padding ) ?  implode(' ', $content_hover_padding) : '';
    $hover_title_font_color = get_theme_mod( 'hover_title_font_color', '#161617' );

    // doc button
    $doc_button_font_size = get_theme_mod( 'doc_button_font_size', '16px' );
    $doc_font_color = get_theme_mod( 'doc_font_color', '#161617' );
    $doc_button_width = get_theme_mod( 'doc_button_width', '150px' );
    $doc_button_height = get_theme_mod( 'doc_button_height', '50px' );
    $doc_button_bg_color = get_theme_mod( 'doc_button_bg_color', 'rgba(22, 22, 23, 0.06)' );
    $button_width_setting = get_theme_mod( 'button_width_setting', '' );
    $button_border_type = get_theme_mod( 'button_border_type', 'solid' );
    $button_border_color = get_theme_mod( 'button_border_color', '#ffffff' );
    $button_border_radius = get_theme_mod( 'button_border_radius', '5px' );
    
    // button hover
    $hover_font_color = get_theme_mod( 'hover_doc_font_color', '#ffffff' );
    $hover_bg_button_color = get_theme_mod( 'hover_button_bg_color', '#161617' );
    $hover_border_button_width = get_theme_mod( 'hover_border_button_width', '' );
    $hoverborder_type = get_theme_mod( 'hover_button_border_type', 'solid' );
    $hover_btn_border_color = get_theme_mod( 'hover_button_border_color', '#ffffff' );
    $btn_border_radius = get_theme_mod( 'button_hover_border_radius', '5px' );
    $doc_count_font_size = get_theme_mod( 'doc_count_font_size', '16px' );
    $item_count_color = get_theme_mod( 'doc_item_count_color', 'rgba(0, 0, 0, 0.7)' );

    // doc title
    $doc_head_title_color = get_theme_mod( 'doc_head_title_color', '#161617' );
    $doc_title_font_size = get_theme_mod( 'doc_title_font_size', '42px' );
    $doc_sec_title_gap = get_theme_mod( 'doc_sec_title_gap', '15px' );

    // doc description
    $doc_head_desc_color = get_theme_mod( 'doc_head_desc_color', '#161617' );
    $doc_desc_font_size = get_theme_mod( 'doc_desc_font_size', '18px' );
    
    if (  $doc_head_desc_color) {
        $ultd__dynamic_css .= '.doc-header-desc p { color:' . esc_attr(  $doc_head_desc_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }
    
    if ( $doc_desc_font_size ) {
        $ultd__dynamic_css .= '.doc-header-desc p { font-size:' . esc_attr( $doc_desc_font_size  ) .'px } ';
        $ultd__dynamic_css .= "\n";
    }

    if ( $doc_head_title_color) {
        $ultd__dynamic_css .= '.doc-header-title h1 { color:' . esc_attr( $doc_head_title_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }

    if (  $doc_title_font_size) {
        $ultd__dynamic_css .= '.doc-header-title h1 { font-size:' . esc_attr(  $doc_title_font_size ) .'px } ';
        $ultd__dynamic_css .= "\n";
    }

    if ( $doc_sec_title_gap) {
        $ultd__dynamic_css .= '.doc-header-title h1 { margin-bottom:' . esc_attr( $doc_sec_title_gap ) .'px } ';
        $ultd__dynamic_css .= "\n";
    }






    if ( $docs_bg_color) {
        $ultd__dynamic_css .= '.ultd--main .ultd--site-main  { background-color:' . esc_attr( $docs_bg_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }

    if( $docspadding ){
        $ultd__dynamic_css .= '.ultd--main .ultd--site-main {padding: ' . esc_attr( $docspadding ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }

    if ( $colum_bg_color) {
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper { background-color:' . esc_attr( $colum_bg_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $columnpadding ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper {padding: ' . esc_attr( $columnpadding ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $column_margin ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper {margin: ' . esc_attr( $column_margin ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $column_border ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper {border-top: ' . esc_attr( $column_border['top-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $column_border ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper {border-right: ' . esc_attr( $column_border['right-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $column_border ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper {border-bottom: ' . esc_attr( $column_border['bottom-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $column_border ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper {border-left: ' . esc_attr( $column_border['left-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $column_border_type ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper {border-style: ' . esc_attr( $column_border_type ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $column_border_color ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper {border-color: ' . esc_attr( $column_border_color ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $column_border_radius ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper {border-radius: ' . esc_attr( $column_border_radius ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    //column hover
    
    if ( $colum_hover_color) {
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper:hover { background-color:' . esc_attr( $colum_hover_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $hoverpadding ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper:hover {padding: ' . esc_attr( $hoverpadding ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $hover_border ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper:hover {border-top: ' . esc_attr( $hover_border['top-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $hover_border){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper:hover {border-right: ' . esc_attr( $hover_border['right-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $hover_border ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper:hover {border-bottom: ' . esc_attr( $hover_border['bottom-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $hover_border ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper:hover {border-left: ' . esc_attr( $hover_border['left-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $hover_border_type ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper:hover {border-style: ' . esc_attr( $hover_border_type ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $hover_border_color ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper:hover {border-color: ' . esc_attr( $hover_border_color ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $hover_border_radius ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-wraper:hover {border-radius: ' . esc_attr( $hover_border_radius ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
    if ( $hover_title_font_color) {
        $ultd__dynamic_css .= '.ultd--single-content .ultd--entry-content h2:hover  { color:' . esc_attr( $hover_title_font_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }
    // content area
    
    if ( $contetn_bg_color) {
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom  { background-color:' . esc_attr( $contetn_bg_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }

    if( $contentpadding ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom {padding: ' . esc_attr( $contentpadding ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $doc_title_font_size ){
        $ultd__dynamic_css .= '.ultd--single-content .ultd--entry-content h2 {font-size: ' . esc_attr( $doc_title_font_size ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
    if ( $doc_title_font_color) {
        $ultd__dynamic_css .= '.ultd--single-content .ultd--entry-content h2  { color:' . esc_attr( $doc_title_font_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }

    if( $doc_title_gap ){
        $ultd__dynamic_css .= '.ultd--single-content .ultd--entry-content h2 {margin-bottom: ' . esc_attr( $doc_title_gap ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
    // description
    if( $doc_decription_font_size ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-content p {font-size: ' . esc_attr( $doc_decription_font_size ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
    if ( $doc_description_color) {
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-content p  { color:' . esc_attr( $doc_description_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }

    if( $doc_description_gap ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-content p {margin-bottom: ' . esc_attr( $doc_description_gap ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }

    // thumbnail
    if ( $doc_thumbnail_width) {
        $ultd__dynamic_css .= '.ultd--site-main .card-top .card-title img { width:' . esc_attr( $doc_thumbnail_width ) .'% } ';
        $ultd__dynamic_css .= "\n";
    }
    if ( $doc_thumbnail_height) {
        $ultd__dynamic_css .= '.ultd--site-main .card-top .card-title img { height:' . esc_attr( $doc_thumbnail_height ) .'px } ';
        $ultd__dynamic_css .= "\n";
    }

    // doc button 
    if( $doc_button_font_size ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a {font-size: ' . esc_attr( $doc_button_font_size ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
    if ( $doc_font_color ) {
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a  { color:' . esc_attr( $doc_font_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }
    if ( $doc_button_width ) {
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a  { width:' . esc_attr( $doc_button_width ) .'px } ';
        $ultd__dynamic_css .= "\n";
    }
    if ( $doc_button_height ) {
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a  { height:' . esc_attr( $doc_button_height ) .'px } ';
        $ultd__dynamic_css .= "\n";
    }
    if ( $doc_button_bg_color ) {
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a  { background-color:' . esc_attr( $doc_button_bg_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $button_width_setting ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a {border-top: ' . esc_attr( $button_width_setting['top-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $button_width_setting ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a {border-right: ' . esc_attr( $button_width_setting['right-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $button_width_setting ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a {border-bottom: ' . esc_attr( $button_width_setting['bottom-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $button_width_setting ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a {border-left: ' . esc_attr( $button_width_setting['left-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $button_border_type ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a {border-style: ' . esc_attr( $button_border_type ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $button_border_color ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a {border-color: ' . esc_attr( $button_border_color ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $button_border_radius ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a {border-radius: ' . esc_attr( $button_border_radius ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
    
    // button hover
    if ( $hover_font_color ) {
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a:hover  { color:' . esc_attr( $hover_font_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }
    if ( $hover_bg_button_color ) {
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a:hover  { background-color:' . esc_attr( $hover_bg_button_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $hover_border_button_width ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a:hover {border-top: ' . esc_attr( $hover_border_button_width['top-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $hover_border_button_width ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a:hover {border-right: ' . esc_attr( $hover_border_button_width['right-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $hover_border_button_width ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a:hover {border-bottom: ' . esc_attr( $hover_border_button_width['bottom-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $hover_border_button_width ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a:hover {border-left: ' . esc_attr( $hover_border_button_width['left-width'] ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $hoverborder_type ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a:hover {border-style: ' . esc_attr( $hoverborder_type ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $button_border_color ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a:hover {border-color: ' . esc_attr( $button_border_color ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $button_border_radius ){
        $ultd__dynamic_css .= '.ultd--site-main .card-bottom .card-button a:hover {border-radius: ' . esc_attr( $button_border_radius ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }

    // count color
    if( $doc_count_font_size ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-templatetwo .docs-article .docs-article-total {font-size: ' . esc_attr( $doc_count_font_size ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $item_count_color ){
        $ultd__dynamic_css .= '.ultd--site-main .docs-templatetwo .docs-article .docs-article-total {color: ' . esc_attr( $item_count_color ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
?>