<?php 
    
    $sidebar_bgc = get_theme_mod( 'sidebar_backgound', '#F8F8FA' );
    $sidebar_padding = get_theme_mod( 'sidebar_padding' ) != ' ' ? get_theme_mod( 'sidebar_padding' ) : '' ;
    $sidebarpadding = is_array($sidebar_padding ) ?  implode(' ', $sidebar_padding) : '';

    $sidebar_radius = get_theme_mod( 'sidebar_border_radius', '0px' );
    $category_font_size = get_theme_mod( 'category_font_size', ' ' );
    $single_category_color = get_theme_mod( 'single_category_color', ' ' );
    $single_category_hover_color = get_theme_mod( 'single_category_hover_color', '#000000' );
    $single_category_margin = get_theme_mod( 'single_category_margin' ) != ' ' ? get_theme_mod( 'single_category_margin' ) : '' ;
    $singlemargin = is_array($single_category_margin ) ?  implode(' ', $single_category_margin) : '';
    
    // subcategory
    $subcate_font_size = get_theme_mod( 'subcate_font_size', ' ' );
    $sub_single_category_color = get_theme_mod( 'sub_single_category_color', ' ' );
    $single_category_hover_color = get_theme_mod( 'sub_category_hover_color', '#000000' );

    // icon
    $icon_font_size = get_theme_mod( 'sidebar_icon_size', '18px' );
    $icon_color = get_theme_mod( 'sidebar_icon_color', '#000000' );
    $sidebar_icon_gap = get_theme_mod( 'sidebar_icon_gap', '20px' );
    $section_margin_bottom = get_theme_mod( 'section_margin_bottom', '15px' );
    $section_font_size = get_theme_mod( 'section_font_size', '18px' );

    // responsive menu
    $open_icon_font_size = get_theme_mod( 'open_icon_color', '20px' );
    $open_icon_color = get_theme_mod( 'open_icon_color', '#cccccc' );
    $close_icon_font_size = get_theme_mod( 'close_icon_size', '20px' );
    $close_icon_color = get_theme_mod( 'close_icon_color', '#cccccc' );

    if($open_icon_color){
        $ultd__dynamic_css .= '.ultd--sidebar #mainnav>.ultd--sidebar-trigger { color:' . esc_attr( $open_icon_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }
    if($open_icon_font_size){
        $ultd__dynamic_css .= '.ultd--sidebar #mainnav>.ultd--sidebar-trigger span.dashicons.dashicons-menu { font-size:' . esc_attr( $open_icon_font_size ) .' } ';
        $ultd__dynamic_css .= "\n";
    }
    if($close_icon_color){
        $ultd__dynamic_css .= '.ultd--sidebar #mainnav .ultd--nav-inner .ultd--sidebar-trigger { color:' . esc_attr( $open_icon_color ) .' } ';
        $ultd__dynamic_css .= "\n";
    }
    if($close_icon_font_size){
        $ultd__dynamic_css .= '.ultd--sidebar #mainnav .ultd--nav-inner .ultd--sidebar-trigger span.dashicons.dashicons-no-alt { font-size:' . esc_attr( $close_icon_font_size ) .' } ';
        $ultd__dynamic_css .= "\n";
    }
    if($sidebar_bgc){
        $ultd__dynamic_css .= '.ultd--single-wrap .ultd--sidebar { background-color:' . esc_attr( $sidebar_bgc ) .' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $sidebarpadding ){
        $ultd__dynamic_css .= '.ultd--single-wrap .ultd--sidebar {padding: ' . esc_attr( $sidebarpadding ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $sidebar_radius ){
        $ultd__dynamic_css .= '.ultd--single-wrap .ultd--sidebar {border-radius: ' . esc_attr( $sidebar_radius ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
   
    if( $category_font_size ){
        $ultd__dynamic_css .= '.ultd--sidebar ul li a {font-size: ' . esc_attr( $category_font_size ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $single_category_color ){
        $ultd__dynamic_css .= '.ultd--sidebar ul li a {color: ' . esc_attr( $single_category_color ) . '!important } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $single_category_hover_color ){
        $ultd__dynamic_css .= '.ultd--sidebar ul li a:hover {color: ' . esc_attr( $single_category_hover_color ) . '!important } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $section_font_size ){
        $ultd__dynamic_css .= '.ultd--sidebar ul li a {font-size: ' . esc_attr( $section_font_size ) . 'px !important } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $singlemargin ){
        $ultd__dynamic_css .= '.ultd--sidebar ul li a {margin: ' . esc_attr( $singlemargin ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    // subcategory

    if( $subcate_font_size ){
        $ultd__dynamic_css .= '.ultd--sidebar ul li ul.children li a {font-size: ' . esc_attr( $subcate_font_size ) . 'px !important } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $sub_single_category_color ){
        $ultd__dynamic_css .= '.ultd--sidebar ul li ul.children li a {color: ' . esc_attr( $sub_single_category_color ) . '!important } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $single_category_hover_color ){
        $ultd__dynamic_css .= '.ultd--sidebar ul li ul.children li a:hover {color: ' . esc_attr( $single_category_hover_color ) . '!important } ';
        $ultd__dynamic_css .= "\n";
    }
    

    // icon 
    
    if( $icon_font_size ){
        $ultd__dynamic_css .= '.ultd--sidebar ul.ultd--nav-list li a span.dashicons {font-size: ' . esc_attr( $icon_font_size ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $icon_font_size ){
        $ultd__dynamic_css .= '.ultd--sidebar ul.ultd--nav-list li a span.dashicons {width: ' . esc_attr( $icon_font_size ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $icon_font_size ){
        $ultd__dynamic_css .= '.ultd--sidebar ul.ultd--nav-list li a span.dashicons {height: ' . esc_attr( $icon_font_size ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $icon_font_size ){
        $ultd__dynamic_css .= '.ultd--sidebar ul.ultd--nav-list li a span.dashicons {line-height: ' . esc_attr( $icon_font_size ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $icon_color ){
        $ultd__dynamic_css .= '.ultd--sidebar ul.ultd--nav-list li a span.dashicons {color: ' . esc_attr( $icon_color ) . ' } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $sidebar_icon_gap ){
        $ultd__dynamic_css .= '.ultd--sidebar ul.ultd--nav-list li a span.dashicons {margin-right: ' . esc_attr( $sidebar_icon_gap ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
    if( $section_margin_bottom ){
        $ultd__dynamic_css .= '.ultd--sidebar ul li {margin-bottom: ' . esc_attr( $section_margin_bottom ) . 'px } ';
        $ultd__dynamic_css .= "\n";
    }
?>