<?php

$content_bg_color = get_theme_mod( 'doc_area_backgound', '#F3F5F7' );
$content_padding  = get_theme_mod( 'content_padding' ) != ' ' ? get_theme_mod( 'content_padding' ) : '';
$contentpadding   = is_array( $content_padding ) ? implode( ' ', $content_padding ) : '';

$docs_bgc     = get_theme_mod( 'content_area_backgound', '#ffffff' );
$docs_padding = get_theme_mod( 'docs_padding' ) != ' ' ? get_theme_mod( 'docs_padding' ) : '';
$docspadding  = is_array( $docs_padding ) ? implode( ' ', $docs_padding ) : '';
// post ttile
$ptitle_font_size  = get_theme_mod( 'post_title_font_size', '28px' );
$ptitle_color      = get_theme_mod( 'post_title_color', '#000000' );
$post_title_margin = get_theme_mod( 'post_title_title_margin', '15px' );

// description
$desc_font_size      = get_theme_mod( 'entry_font_size', '16px' );
$postdesc_color      = get_theme_mod( 'content_desc_color', 'rgba(0, 0, 0, 0.7)' );
$entry_margin_bottom = get_theme_mod( 'entry_margin_bottom', '35px' );

// breadcamp
$brand_font_size     = get_theme_mod( 'bradcrumb_font_size', '15px' );
$bread_font_color    = get_theme_mod( 'bread_font_color', 'rgba(22, 22, 23, 0.6)' );
$hover_bread_color   = get_theme_mod( 'hover_bread_color', '#000000' );
$active_bread_color  = get_theme_mod( 'active_bread_color', '#000000' );
$icon_bread_color    = get_theme_mod( 'icon_bread_color', '#111827' );
$bread_icon_size     = get_theme_mod( 'bread_icon_size', '13px' );
$bread_margin_bottom = get_theme_mod( 'bradcrumb_margin', '25px' );

//table of contents
$table_area_backgound = get_theme_mod( 'table_area_backgound', '#ffffff' );
$docs_table_padding   = get_theme_mod( 'docs_table_padding' ) != ' ' ? get_theme_mod( 'docs_table_padding' ) : '';
$tablepadding         = is_array( $docs_table_padding ) ? implode( ' ', $docs_table_padding ) : '';
$table_content_radius = get_theme_mod( 'table_content_radius', '0px' );

$toc_title_color     = get_theme_mod( 'toc_title_color', 'rgba(0, 0, 0, 0.4)' );
$toc_title_font_size = get_theme_mod( 'toc_title_font_size', '13px' );
$toc_title_bottom    = get_theme_mod( 'toc_title_bottom', '10px' );

//table content title
$table_title_size  = get_theme_mod( 'table_title_font_size', '18px' );
$table_title_color = get_theme_mod( 'table_title_color', '#000000' );
$table_title_hover = get_theme_mod( 'table_title_hover_color', '#000000' );
$table_title_gap   = get_theme_mod( 'table_title_margin_bottom', '15px' );

//  footer button
$footerbutton_bg_color   = get_theme_mod( 'button_bg_color', '' );
$footerbutton_font_size  = get_theme_mod( 'button_font_size', '' );
$footerbutton_font_color = get_theme_mod( 'button_text_color', '' );
$footerbutton_radius     = get_theme_mod( 'fbutton_border_radius', '' );

// social share
$social_title_color     = get_theme_mod( 'social_title_color', '#3a3a3a' );
$social_title_font_size = get_theme_mod( 'social_title_font_size', '18px' );
$social_title_gap       = get_theme_mod( 'social_title_gap', '0px' );
$icon_width_height      = get_theme_mod( 'icon_width_height', '35px' );

//cta title
$cta_title_color     = get_theme_mod( 'cta_title_color', '#000000' );
$cta_title_font_size = get_theme_mod( 'cta_title_font_size', '16px' );
$cta_title_gap       = get_theme_mod( 'cta_title_gap', '5px' );

// cta description
$cta_desc_color     = get_theme_mod( 'cta_desc_color', 'rgba(0, 0, 0, 0.7)' );
$cta_desc_font_size = get_theme_mod( 'cta_desc_font_size', '14px' );

// CTA button
$cta_button_text_color    = get_theme_mod( 'button_text_color', '' );
$cta_button_border_radius = get_theme_mod( 'button_border_radius', '' );
$cta_button_font_size     = get_theme_mod( 'button_font_size', '' );
$cta_button_bg_color      = get_theme_mod( 'button_bg_color', '' );

if ( $cta_desc_color ) {
    $ud_dynamic_css .= '.ud-ctn .footer-content p { color:' . esc_attr( $cta_desc_color ) . '} ';
    $ud_dynamic_css .= "\n";
}

if ( $cta_desc_font_size ) {
    $ud_dynamic_css .= '.ud-ctn .footer-content p { font-size:' . esc_attr( $cta_desc_font_size ) . 'px} ';
    $ud_dynamic_css .= "\n";
}

if ( $cta_title_color ) {
    $ud_dynamic_css .= '.ud-ctn .footer-content h3 { color:' . esc_attr( $cta_title_color ) . '} ';
    $ud_dynamic_css .= "\n";
}

if ( $cta_title_font_size ) {
    $ud_dynamic_css .= '.ud-ctn .footer-content h3 { font-size:' . esc_attr( $cta_title_font_size ) . 'px } ';
    $ud_dynamic_css .= "\n";
}
if ( $cta_title_gap ) {
    $ud_dynamic_css .= '.ud-ctn .footer-content h3 { margin-bottom:' . esc_attr( $cta_title_gap ) . 'px } ';
    $ud_dynamic_css .= "\n";
}

if ( $cta_button_text_color ) {
    $ud_dynamic_css .= '.ud-ctn .footer-button a { color:' . esc_attr( $cta_button_text_color ) . '} ';
    $ud_dynamic_css .= "\n";
}

if ( $cta_button_font_size ) {
    $ud_dynamic_css .= '.ud-ctn .footer-button a { font-size:' . esc_attr( $cta_button_font_size ) . 'px } ';
    $ud_dynamic_css .= "\n";
}

if ( $cta_button_bg_color ) {
    $ud_dynamic_css .= '.ud-ctn .footer-button a { background-color:' . esc_attr( $cta_button_bg_color ) . '} ';
    $ud_dynamic_css .= "\n";
}

if ( $cta_button_border_radius ) {
    $ud_dynamic_css .= '.ud-ctn .footer-button a { border-radius:' . esc_attr( $cta_button_border_radius ) . 'px } ';
    $ud_dynamic_css .= "\n";
}

if ( $icon_width_height ) {
    $ud_dynamic_css .= '.ud-social-share ul.ud-social-share-links li a img { width:' . esc_attr( $icon_width_height ) . 'px } ';
    $ud_dynamic_css .= "\n";
}

if ( $icon_width_height ) {
    $ud_dynamic_css .= '.ud-social-share ul.ud-social-share-links li a img { height:' . esc_attr( $icon_width_height ) . 'px } ';
    $ud_dynamic_css .= "\n";
}
if ( $social_title_color ) {
    $ud_dynamic_css .= '.ud-socshare-heading h5 { color:' . esc_attr( $social_title_color ) . ' } ';
    $ud_dynamic_css .= "\n";
}
if ( $social_title_font_size ) {
    $ud_dynamic_css .= '.ud-socshare-heading h5 { font-size:' . esc_attr( $social_title_font_size ) . 'px } ';
    $ud_dynamic_css .= "\n";
}
if ( $social_title_gap ) {
    $ud_dynamic_css .= '.ud-socshare-heading h5 { margin-bottom:' . esc_attr( $social_title_gap ) . 'px } ';
    $ud_dynamic_css .= "\n";
}

if ( $footerbutton_bg_color ) {
    $ud_dynamic_css .= '.ud-cta a { background-color:' . esc_attr( $footerbutton_bg_color ) . ' } ';
    $ud_dynamic_css .= "\n";
}
if ( $footerbutton_font_size ) {
    $ud_dynamic_css .= '.ud-cta a { font-size:' . esc_attr( $footerbutton_font_size ) . 'px } ';
    $ud_dynamic_css .= "\n";
}
if ( $footerbutton_font_color ) {
    $ud_dynamic_css .= '.ud-cta a { color:' . esc_attr( $footerbutton_font_color ) . ' } ';
    $ud_dynamic_css .= "\n";
}
if ( $footerbutton_radius ) {
    $ud_dynamic_css .= '.ud-cta a { border-radius:' . esc_attr( $footerbutton_radius ) . 'px } ';
    $ud_dynamic_css .= "\n";
}

if ( $content_bg_color ) {
    $ud_dynamic_css .= '.ud-single-wrap  { background-color:' . esc_attr( $content_bg_color ) . ' } ';
    $ud_dynamic_css .= "\n";
}

if ( $contentpadding ) {
    $ud_dynamic_css .= '.ud-single-wrap {padding: ' . esc_attr( $contentpadding ) . ' } ';
    $ud_dynamic_css .= "\n";
}

if ( $docs_bgc ) {
    $ud_dynamic_css .= '.ud-single-wrap .ud-single-content { background-color:' . esc_attr( $docs_bgc ) . ' } ';
    $ud_dynamic_css .= "\n";
}
if ( $docspadding ) {
    $ud_dynamic_css .= '.ud-single-wrap .ud-single-content {padding: ' . esc_attr( $docspadding ) . ' } ';
    $ud_dynamic_css .= "\n";
}

if ( $ptitle_font_size ) {
    $ud_dynamic_css .= '.ud-single-content .ud-entry-content h2 {font-size: ' . esc_attr( $ptitle_color ) . ' } ';
    $ud_dynamic_css .= "\n";
}

if ( $ptitle_color ) {
    $ud_dynamic_css .= '.ud-single-content .ud-entry-content h2 {color: ' . esc_attr( $ptitle_color ) . ' } ';
    $ud_dynamic_css .= "\n";
}

if ( $post_title_margin ) {
    $ud_dynamic_css .= '.ud-single-content .ud-entry-content h2 {margin-bottom: ' . esc_attr( $post_title_margin ) . 'px } ';
    $ud_dynamic_css .= "\n";
}

if ( $desc_font_size ) {
    $ud_dynamic_css .= '.ud-single-content .ud-entry-content, .ud-single-content .ud-entry-content p {font-size: ' . esc_attr( $desc_font_size ) . 'px } ';
    $ud_dynamic_css .= "\n";
}
if ( $postdesc_color ) {
    $ud_dynamic_css .= '.ud-single-content .ud-entry-content, .ud-single-content .ud-entry-content p {color: ' . esc_attr( $postdesc_color ) . ' } ';
    $ud_dynamic_css .= "\n";
}
if ( $entry_margin_bottom ) {
    $ud_dynamic_css .= '.ud-single-content .ud-entry-content, .ud-single-content .ud-entry-content p {margin-bottom: ' . esc_attr( $entry_margin_bottom ) . 'px } ';
    $ud_dynamic_css .= "\n";
}

// Bradcamp

if ( $brand_font_size ) {
    $ud_dynamic_css .= '.ud-single-content ul.ud-breadcrumb li a,
        .ud-single-content ul.ud-breadcrumb li .current {font-size: ' . esc_attr( $brand_font_size ) . ' } ';
    $ud_dynamic_css .= "\n";
}

if ( $bread_font_color ) {
    $ud_dynamic_css .= '.ud-single-content ul.ud-breadcrumb li a {color: ' . esc_attr( $bread_font_color ) . ' } ';
    $ud_dynamic_css .= "\n";
}
if ( $hover_bread_color ) {
    $ud_dynamic_css .= '.ud-single-content ul.ud-breadcrumb li a:hover {color: ' . esc_attr( $hover_bread_color ) . ' } ';
    $ud_dynamic_css .= "\n";
}
if ( $active_bread_color ) {
    $ud_dynamic_css .= '.ud-single-content ul.ud-breadcrumb li .current {color: ' . esc_attr( $active_bread_color ) . ' } ';
    $ud_dynamic_css .= "\n";
}

if ( $brand_font_size ) {
    $ud_dynamic_css .= '.ud-single-content ul.ud-breadcrumb li span.dashicons {font-size: ' . esc_attr( $brand_font_size ) . ' } ';
    $ud_dynamic_css .= "\n";
}

if ( $icon_bread_color ) {
    $ud_dynamic_css .= '.ud-single-content ul.ud-breadcrumb li span.dashicons {color: ' . esc_attr( $icon_bread_color ) . ' } ';
    $ud_dynamic_css .= "\n";
}
if ( $icon_bread_color ) {
    $ud_dynamic_css .= '.ud-single-content ul.ud-breadcrumb li span.dashicons {color: ' . esc_attr( $icon_bread_color ) . ' } ';
    $ud_dynamic_css .= "\n";
}

if ( $bread_margin_bottom ) {
    $ud_dynamic_css .= '.ud-single-wrap .ud-single-content ul.ud-breadcrumb {margin-bottom: ' . esc_attr( $bread_margin_bottom ) . 'px } ';
    $ud_dynamic_css .= "\n";
}

// Toc area
if ( $table_area_backgound ) {
    $ud_dynamic_css .= '.ud-single-wrap .ud-auto-in-content.ud-autoc-wrap, .ud-single-wrap .ud-autoc-wrap{ background-color:' . esc_attr( $table_area_backgound ) . ' } ';
    $ud_dynamic_css .= "\n";
}
if ( $tablepadding ) {
    $ud_dynamic_css .= '.ud-single-wrap .ud-auto-in-content.ud-autoc-wrap, .ud-single-wrap .ud-autoc-wrap {padding: ' . esc_attr( $tablepadding ) . ' } ';
    $ud_dynamic_css .= "\n";
}
if ( $table_content_radius ) {
    $ud_dynamic_css .= '.ud-single-wrap .ud-auto-in-content.ud-autoc-wrap, .ud-single-wrap .ud-autoc-wrap {border-radius: ' . esc_attr( $table_content_radius ) . 'px } ';
    $ud_dynamic_css .= "\n";
}

if ( $toc_title_color ) {
    $ud_dynamic_css .= '.ud-single-wrap .ud-auto-in-content.ud-autoc-wrap, .ud-single-wrap .ud-autoc-wrap .autoc h2 {color: ' . esc_attr( $toc_title_color ) . '} ';
    $ud_dynamic_css .= "\n";
}

if ( $toc_title_font_size ) {
    $ud_dynamic_css .= '.ud-single-wrap .ud-auto-in-content.ud-autoc-wrap, .ud-single-wrap .ud-autoc-wrap .autoc h2 {font-size: ' . esc_attr( $toc_title_font_size ) . 'px } ';
    $ud_dynamic_css .= "\n";
}

if ( $toc_title_bottom ) {
    $ud_dynamic_css .= '.ud-single-wrap .ud-auto-in-content.ud-autoc-wrap, .ud-single-wrap .ud-autoc-wrap .autoc h2 {margin-bottom: ' . esc_attr( $toc_title_bottom ) . 'px } ';
    $ud_dynamic_css .= "\n";
}

if ( $table_title_size ) {
    $ud_dynamic_css .= '.ud-single-wrap .ud-auto-in-content.ud-autoc-wrap, .ud-single-wrap .ud-autoc-wrap .autoc ul li a {font-size: ' . esc_attr( $table_title_size ) . 'px } ';
    $ud_dynamic_css .= "\n";
}

if ( $table_title_color ) {
    $ud_dynamic_css .= '.ud-single-wrap .ud-auto-in-content.ud-autoc-wrap, .ud-single-wrap .ud-autoc-wrap .autoc ul li a {color: ' . esc_attr( $table_title_color ) . '} ';
    $ud_dynamic_css .= "\n";
}
if ( $table_title_hover ) {
    $ud_dynamic_css .= '.ud-single-wrap .ud-auto-in-content.ud-autoc-wrap, .ud-single-wrap .ud-autoc-wrap .autoc ul li a:hover {color: ' . esc_attr( $table_title_hover ) . '} ';
    $ud_dynamic_css .= "\n";
}

if ( $table_title_gap ) {
    $ud_dynamic_css .= '.ud-single-wrap .ud-auto-in-content.ud-autoc-wrap, .ud-single-wrap .ud-autoc-wrap .autoc ul li {padding-bottom: ' . esc_attr( $table_title_gap ) . 'px } ';
    $ud_dynamic_css .= "\n";
}

?>