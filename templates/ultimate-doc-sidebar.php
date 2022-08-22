<?php
$template = get_theme_mod( 'single_doc_template', 'template-01' );
$icon_pos = get_theme_mod( 'open_icon_position', 'left-bottom' );
$class    = $template;

$ancestors        = [];
$root             = $parent             = false;
$enabled_multidoc = get_option( 'ud_sidebar_all_docs', true );
$link_before      = '';
if ( 'template-01' == $template ) {
    $link_before = '';
}

if ( $enabled_multidoc ) {
    if ( $post->post_parent ) {
        $ancestors = get_post_ancestors( $post->ID );
        $root      = count( $ancestors ) - 1;
        $parent    = $ancestors[$root];
    } else {
        $parent = $post->ID;
    }
}

$children = wp_list_pages( [
    'title_li'    => '',
    'order'       => 'menu_order',
    'child_of'    => $parent,
    'echo'        => false,
    'post_type'   => 'docs',
    // 'link_after' => '<span class="toggle-menu dashicons dashicons-arrow-up-alt2"></span>',
    'link_before' => $link_before,
    'walker'      => new UD_walker(),
] );
?>

<div class="ud-sidebar <?php echo esc_attr( $icon_pos ) ?> <?php echo esc_attr( $class ); ?>">
    <nav id="mainnav">
        <div id="menu" class="ud-sidebar-trigger"><span class="dashicons dashicons-menu"></span></div>
        <?php if ( $children ) {
    ?>
        <div class="ud-nav-inner">
            <div id="menu" class="ud-sidebar-trigger"><span class=" dashicons dashicons-no-alt"></span></div>
            <ul class="ud-nav-list">
                <?php
echo $children;
    ?>
            </ul>
        </div>
        <?php }?>
    </nav>
</div>