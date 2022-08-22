<?php
get_header();

$section_id = isset( $_GET['post_id'] ) ? intval( $_GET['post_id'] ) : 0;
$class      = '';?>
<div class="ud-search-page">
    <div class="ud-search-bar">
        <div class="ud-container">
            <div class="fddox-search-title">
                <h2><?php esc_html_e( 'Search for articles', 'ud' )?></h2>
                <p><?php esc_html_e( 'You can search for a question here. It will help you get the most common anwers easily.', 'ud' )?>
                </p>
            </div>

            <div class="ud-search-wrap">
                <?php printf( do_shortcode( '[ud_search id=' . $section_id . ']' ) )?>
            </div>
        </div>
    </div>

    <div class="ud-search-results">

        <div class="ud-container">
            <div class="ud-search-restult-title">
                <?php
printf(
    /* translators: %s: Search term. */
    '<h4>%s <strong>%s</strong></h4>',
    esc_html__( 'You are searching for:', 'finestdos' ),
    esc_html( get_search_query() )
);
?>
            </div>
            <div class="ud-result-single-wrap">
                <?php if ( have_posts() ):
    $found_post = 0;
    while ( have_posts() ):
        the_post();
        $doc_type      = get_post_meta( get_the_ID(), 'doc_type', true );
        $first_parent  = wp_get_post_parent_id( get_the_ID() );
        $second_parent = wp_get_post_parent_id( $first_parent );

        ob_start();
        ?>

                <div class="ud-single-search-item ud-single-content">
                    <ul class="ud-breadcrumb" itemscope="">
                        <li itemprop="itemListElement" itemscope="">
                            <a itemprop="item" href="<?php the_permalink( $second_parent )?>">
                                <span
                                    itemprop="name"><?php echo esc_html( get_the_title( $second_parent ) ) ?></span></a>
                        </li>
                        <li class="delimiter"><span class="dashicons dashicons-arrow-right-alt2"></span></li>
                        <li><span class="current">Article T copied</span>
                        </li>
                        <li><span class="current"><?php the_title()?></span></li>
                    </ul>
                    <a href="<?php the_permalink()?>"><?php the_title( '<h4>', '</h4>' )?></a>
                    <?php echo wp_trim_words( get_the_excerpt(), '25' ) ?>
                </div>
                <?php

        if ( 0 != $section_id ) {

            if ( $section_id == $second_parent ) {
                printf( '%s', ob_get_clean() );
            }
        } elseif ( 'article' == $doc_type ) {
        printf( '%s', ob_get_clean() );

    }
    ?>
                <?php
endwhile;
echo '<div class="ud-paginations-wrap">';
echo paginate_links( [
    'next_text' => '>',
    'prev_text' => '<',
] );
echo '</div>';

else:

    printf( '<h4>%s</h4>', esc_html( ud_get_option( 'docs_search_not_found_text', __( 'Sorry nothing matched!', 'ultimatedoc' ) ) ) );

endif;

?>

            </div><!-- .ud-single-wrap -->
        </div>
    </div>

</div>
<?php get_footer();?>