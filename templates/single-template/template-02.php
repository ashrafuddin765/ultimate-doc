<?php
    $class = 'ud-container';
    ud_get_template_part( 'ultimate-doc', 'sidebar' );
 ?>
<div class="ud-single-content">
    <?php ud_breadcrumbs(); ?>
    <article id="post-<?php the_ID(); ?>">

        <?php the_title( '<h1 class="ud-single-title">', '</h1>' ) ?>
        <?php
        $docs_enable_print = ud_get_option( 'docs_enable_print', true );
        if(true == $docs_enable_print ) : ?>
        <div class="ud-print"><span class="dashicons dashicons-printer"></span></div>
        <?php endif; ?>

        <div class="ud-entry-content" itemprop="articleBody">

            <div class="ud-autoc-wrap ud-auto-in-content <?php echo $class; ?>">
                <div class="autoc" data-stopat='h2' data-offset='1'></div>
            </div> 
            <?php
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ultimate-doc' ), [ 'span' => [ 'class' => [] ] ] ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );

         
            ?>
        </div>
        <div class="ud-article-footer">
            <div class="ud-meta-area">
                <div class="ud-footer-meta">
                    <?php printf('%s %s',
                            esc_html__( 'Updated on ', 'ud'),
                            get_the_modified_time('M d, Y'));
                        ?>
                </div>
                <?php printf('%s', ud_feedback_html()) ?>
            </div>
            <?php 
            $socialenable = get_theme_mod( 'switch_social_share', true );
            if ( true == $socialenable ) {
                echo do_shortcode( '[ud_social_share]' );
            }    
            ?>
        </div>
        <div class="ud-single-post-navigation">
            <?php ud_post_navigation(get_the_ID(  ));?>
        </div>
        <div class="ud-related-articles">
            <?php ud_related_article(wp_get_post_parent_id( get_the_ID() )) ?>
        </div>
        <?php 
            $cta_title = get_theme_mod( 'cta_title', 'Still no luck? We can help!' );
            $cta_description = get_theme_mod( 'cta_description', 'Contact us and we’ll get back to you as soon as possible' );
            $supporturl = get_theme_mod( 'contact_url_page', 'http://example.com/' );
            $cta_text = get_theme_mod( 'cta_button_text', 'Contact support' );
        ?>
        <div class="ud-ctn">
            <div class="footer-area">
                <div class="footer-content">
                    <h3><?php echo esc_html(  $cta_title ) ?> </h3>
                    <p><?php echo esc_html( $cta_description ); ?></p>
                </div>
                <div class="footer-button ud-cta">
                    <?php printf('<a href="%s">%s</a>',esc_url_raw($supporturl), esc_html( $cta_text));
                    ?>

                </div>
            </div>
        </div>
        <div class="ud-powered">
            <span class="ud-copyright">
                <?php printf('%s <a href="%s">%s</a>', 
                        esc_html( 'Powered by '),
                        esc_url( 'https://finestdevs.com' ),
                        esc_html( 'UltimateDoc' )
                     ) ?>
            </span>
        </div>

    </article><!-- #post-## -->
</div><!-- .ud-single-content -->