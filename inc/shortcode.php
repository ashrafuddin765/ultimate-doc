<?php

function ultd__docs_shortcode( $atts ) {
    if ( empty( $atts ) ) {
        $atts = array();
    }
    if ( empty( $atts['stopat'] ) ) {
        $atts['stopat'] = 'h4';
    }
    if ( empty( $atts['offset'] ) ) {
        $atts['offset'] = '20';
    }
    return '<div class="autoc" data-stopat="' . $atts['stopat'] . '" data-offset="' . $atts['offset'] . '"></div>';
}
add_shortcode( 'ultd--doc-toc', 'ultd__docs_shortcode' );

function fd_shortcode( $atts ) {

    extract( shortcode_atts( array(
        'id'       => '',
        'style'    => '01',
        'per_page' => 10,
    ), $atts ) );

    $docs           = get_theme_mod( 'docs_template_design', 'docs-template-01' );
    $section        = get_theme_mod( 'section_select_template', 'section-template-01' );
    $enable_masonry = ultd__get_option( 'docs_enable_masonry', true ) ? 'ultd--masonry' : '';

    $args = array(
        'post_type'      => 'docs',
        'posts_per_page' => $per_page,
        'order'          => 'menu_order',
        'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
    );

    if ( !empty( $id ) ) {
        $class               = $section;
        $args['post_parent'] = $id;
        $args['meta_query']  = array(
            'relation' => 'AND',
            array(
                'key'     => 'doc_type',
                'value'   => 'section',
                'compare' => '=',
                'type'    => 'CHAR',
            ),
        );
    } else {
        $class              = $docs;
        $args['meta_query'] = array(
            'relation' => 'AND',
            array(
                'key'     => 'doc_type',
                'value'   => 'doc',
                'compare' => '=',
                'type'    => 'CHAR',
            ),
        );

    }

    // the query
    $the_query = new WP_Query( $args );

    ?>

<div class="ultd--site-main <?php echo esc_attr( $class ) ?>">
    <div class="ultd--container">
        <div class="row <?php echo esc_attr( $enable_masonry ) ?>">
            <?php if ( $the_query->have_posts() ): ?>
            <?php while ( $the_query->have_posts() ): $the_query->the_post();
        $docs_type = get_post_meta( get_the_ID(), 'doc_type', true );

        if ( !empty( $id ) && 'section' == $docs_type ) {
            // here will be section template
            $section_template = apply_filters( 'ultd__include_section_template', ULTD_DIR . 'templates/section-template/' . $section . '.php' );

            if($section_template){
                include $section_template;
            }

        } elseif ( 'doc' == $docs_type ) {

            $doc_template = apply_filters( 'ultd__include_docs_template', ULTD_DIR . 'templates/docs-template/' . $docs . '.php' );
            // here will show all docs
            if($doc_template){
                include $doc_template;
            }
    }

    ?>

            <?php endwhile;?>
            <?php wp_reset_query();

    ?>

            <?php else: ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' );?></p>
            <?php endif;?>
        </div>
        <?php
//paginations
    echo '<div class="ultd--paginations-wrap">';
    $big = 999999999; // need an unlikely integer
    echo paginate_links( array(
        'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format'    => '?paged=%#%',
        'current'   => max( 1, get_query_var( 'paged' ) ),
        'total'     => $the_query->max_num_pages,
        'next_text' => '>',
        'prev_text' => '<',
    ) );

    echo '</div>';
    ?>
    </div>
</div>
<?Php
}
add_shortcode( 'ultd', 'fd_shortcode' );

/* Ud Search  */
function ultd__search_shortcode( $atts ) {

    extract( shortcode_atts( array(
        'id'    => '',
        'style' => '01',
    ), $atts ) );
    $placeholder = ultd__get_option( 'docs_search_placeholder', __( 'Search for articles...', 'placeholder', 'ultimate-doc' ) );
    $search_icon = '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M14.75 14.75L10.25 10.25M11.75 6.5C11.75 9.39949 9.39949 11.75 6.5 11.75C3.60051 11.75 1.25 9.39949 1.25 6.5C1.25 3.60051 3.60051 1.25 6.5 1.25C9.39949 1.25 11.75 3.60051 11.75 6.5Z" stroke="#161617" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    ';
    $dropdown_args = [
        'post_type'         => 'docs',
        'echo'              => 0,
        'depth'             => 1,
        'show_option_none'  => __( 'All Docs', 'ultimate-doc' ),
        'option_none_value' => 'all',
        'name'              => 'search_in_doc',
    ];

    if ( isset( $_GET['search_in_doc'] ) && 'all' != $_GET['search_in_doc'] ) {
        $dropdown_args['selected'] = (int) sanitize_text_field( $_GET['search_in_doc'] );
    }

    $form = '<form role="search" method="get" class="search-form ultd--search-form" action="' . esc_url( home_url( '/' ) ) . '">
    <div class="ultd--search-input">
        <span class="screen-reader-text">' . _x( 'Search for:', 'label', 'ultimate-doc' ) . '</span>
        <input type="search" class="search-field" placeholder="' . $placeholder . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'ultimate-doc' ) . '" />
        <input type="hidden" name="post_type" value="docs" />
        <input type="hidden" name="post_id" value="' . esc_html( $id ) . '" />
        <button class="search-submit" type="submit">' . $search_icon . '</button>
    </div>

</form>';
    return $form;
}
add_shortcode( 'ultd__search', 'ultd__search_shortcode' );

// socila share shortcode
function ultd__social_share() {
    $social_title = get_theme_mod( 'social_share_ttile', 'Share this article:' );
    $onfacebook   = get_theme_mod( 'switch_facebook_share', true );
    $ontwitter    = get_theme_mod( 'enable_Twitter_sharing', true );
    $onlinkdin    = get_theme_mod( 'enable_linkedin_sharing', true );
    $onpinterest  = get_theme_mod( 'enable_pinterest_sharing', true );
    ?>
<div class="ultd--social-share">
    <div class="ultd--socshare-heading">
        <?php echo '<strong>' . esc_html( $social_title ) . '</strong>'; ?>
    </div>
    <ul class="ultd--social-share-links">
        <?php if ( true == $onfacebook ): ?>
        <li><a href="https://www.facebook.com/sharer.php?u=<?php the_permalink();?>" target="_blank"><img
                    src="<?php echo esc_attr(ULTD_ASSETS_ASSETS . 'facebook.svg') ?>" alt="Facebook"></a></li>
        <?php endif;?>

        <?php if ( true == $ontwitter ): ?>
        <li><a href="https://twitter.com/intent/tweet?url=<?php the_permalink();?>" target="_blank"><img
                    src="<?php echo esc_attr(ULTD_ASSETS_ASSETS . 'twitter.svg') ?>" alt="Twitter"></a></li>
        <?php endif;?>

        <?php if ( true == $onlinkdin ): ?>
        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>" target="_blank"><img
                    src="<?php echo esc_attr(ULTD_ASSETS_ASSETS . 'linkedin.svg') ?>" alt="LinkedIn"></a></li>
        <?php endif;?>

        <?php if ( true == $onpinterest ): ?>
        <li><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink();?>" target="_blank"><img
                    src="<?php echo esc_attr(ULTD_ASSETS_ASSETS . 'pinterest.svg') ?>" alt="Pinterest"></a></li>
        <?php endif;?>
    </ul>
</div>
<?php }

add_shortcode( 'ultd__social_share', 'ultd__social_share' );

function ultd__instant_answer( $atts ) {

    extract( shortcode_atts( array(
        'per_page' => 10,
    ), $atts ) );

    $args = array(
        'post_type'      => 'docs',
        'posts_per_page' => $per_page,
        'paged'          => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
    );

    $args['meta_query'] = array(
        'relation' => 'AND',
        array(
            'key'     => 'doc_type',
            'value'   => 'article',
            'compare' => '=',
            'type'    => 'CHAR',
        ),
    );

    $ia_show_all_doc        = ultd__get_option( 'ia_show_all_doc', 'on' );
    $ia_select_doc          = ultd__get_option( 'ia_select_doc', [] );
    $ia_name_placeholder    = ultd__get_option( 'ia_name_placeholder', 'Name' );
    $ia_email_placeholder   = ultd__get_option( 'ia_email_placeholder', 'Email' );
    $ia_subject_placeholder = ultd__get_option( 'ia_subject_placeholder', 'Subject' );
    $ia_message_placeholder = ultd__get_option( 'ia_message_placeholder', 'How we can help?' );
    $select_ia_position     = ultd__get_option( 'select_ia_position', 'right' );
    $ia_doc_show_type       = ultd__get_option( 'ia_doc_show_type', 'normal' );

    ?>
<div class="ultd--ia-wrapper ia-position-<?php echo esc_attr( $select_ia_position ) ?>">
    <div class="ultd--ia-toggler">
        <div class="ultd--ia-open active">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19 20H5C3.89543 20 3 19.1046 3 18L3 6C3 4.89543 3.89543 4 5 4L15 4C16.1046 4 17 4.89543 17 6V7M19 20C17.8954 20 17 19.1046 17 18L17 7M19 20C20.1046 20 21 19.1046 21 18V9C21 7.89543 20.1046 7 19 7L17 7M13 4L9 4M7 16H13M7 8H13V12H7V8Z"
                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <span><?php esc_html_e( 'Read Doc', 'ultimate-doc' )?></span>
        </div>
        <div class="ultd--ia-close">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 13L13 1M1 1L13 13" stroke="white" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span><?php esc_html_e( 'Close Doc', 'ultimate-doc' )?></span>
        </div>
    </div>
    <div class="ultd--ia-main" id="ultd--ia">
        <ul id="tabs" class="ultd--setting-tabs-menu">
            <li><button class="ultd--tab-link active" onclick="udTabs(event,'ultd--ia-answer' ); ">Answer</button>
            </li>
            <li><button class="ultd--tab-link" onclick="udTabs(event, 'ultd--ia-chat')">chat</button>
            </li>
        </ul>

        <div id="ultd--ia-answer" class="ultd--tab-content" style="display: block;">
            <p>
                <?php esc_html_e( 'Learn more about this product here! Popular articles are listed below. You can also contact us if you don’t find the article.', 'ultimate-doc' )?>
            </p>
            <div class="ultd--ia-search-form">
                <form role="search" method="get" v-on:submit.prevent class="search-form ultd--search-form" action="">
                    <div class="ultd--search-input">
                        <span class="screen-reader-text"></span>
                        <input v-model="doc_search" type="search" class="search-field" placeholder="" value=""
                            name="doc_search"
                            placeholder="<?php esc_attr_e( 'Search for articles...', 'ultimate-doc' )?>" />

                        <button class="search-submit" type="submit"><span
                                class="dashicons dashicons-search"></span></button>
                    </div>
                </form>
            </div>
            <?php if (  ( 'on' != $ia_show_all_doc && 1 == count( $ia_select_doc ) ) || 'condition' == $ia_doc_show_type ): ?>
            <ul class="articles">
                <li v-for="article of searchDoc(docs)">
                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4.75 8H9.25M4.75 11H9.25M10.75 14.75H3.25C2.42157 14.75 1.75 14.0784 1.75 13.25V2.75C1.75 1.92157 2.42157 1.25 3.25 1.25H7.43934C7.63825 1.25 7.82902 1.32902 7.96967 1.46967L12.0303 5.53033C12.171 5.67098 12.25 5.86175 12.25 6.06066V13.25C12.25 14.0784 11.5784 14.75 10.75 14.75Z"
                            stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <h3 v-on:click="showArticle($event, article)" v-html="article.post.title" class="ultd--title">
                        {{ article.post.title }}
                    </h3>
                    <div class="full-article">
                        <span v-on:click="hideArticle($event)" class="ia-article-closer">
                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.33333 12.8337L1.5 7.00033M1.5 7.00033L7.33333 1.16699M1.5 7.00033L16.5 7.00032"
                                    stroke="#A1A1AA" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <?php esc_html_e( 'Back to all articles', 'ultimate-doc' )?>
                        </span>
                        <div class="ultd--entry-content">

                        </div>
                    </div>

                </li>
            </ul>
            <?php else: ?>
            <ul class="docs ">

                <li class="single-doc doc-title" v-for="doc of searchDoc(docs)" :key="doc.post.id"
                    :data-id="doc.post.id">
                    <div class="doc-icon">
                        <span>{{ doc.post.title.charAt(0) }}</span>
                    </div>
                    <div class="doc-content-wrap">
                        <h3 v-on:click="showArticles($event)" v-html="doc.post.title">
                        </h3>
                        <span class="doc-article-count">{{ doc.post.count }}
                            {{ pluralize(doc.post.count, '<?php esc_html_e( 'Article', 'ultimate-doc' )?>') }}</span>
                    </div>

                    <ul class="sections">
                        <span v-on:click="hideArticles($event)" class="ia-article-closer"><svg width="18" height="14"
                                viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.33333 12.8337L1.5 7.00033M1.5 7.00033L7.33333 1.16699M1.5 7.00033L16.5 7.00032"
                                    stroke="#A1A1AA" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <?php esc_html_e( 'Back to all docs', 'ultimate-doc' )?>
                        </span>
                        <p>
                            <?php esc_html_e( 'Learn more about this product here! Popular articles are listed below. You can also contact us if you don’t find the article.', 'ultimate-doc' )?>
                        </p>
                        <form role="search" method="get" v-on:submit.prevent="searchArticle"
                            class="search-form ultd--search-form" action="">
                            <div class="ultd--search-input">
                                <span class="screen-reader-text"></span>
                                <input v-model="article_search" type="search" class="search-field" placeholder=""
                                    value="" name="article_search" title="" />

                                <button class="search-submit" type="submit"><span
                                        class="dashicons dashicons-search"></span></button>
                            </div>
                        </form>
                        <li v-for="(section, index) in doc.post.child">
                            <ul class="articles">
                                <li v-for="article of searchAeticle(section.post.child)">
                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.75 8H9.25M4.75 11H9.25M10.75 14.75H3.25C2.42157 14.75 1.75 14.0784 1.75 13.25V2.75C1.75 1.92157 2.42157 1.25 3.25 1.25H7.43934C7.63825 1.25 7.82902 1.32902 7.96967 1.46967L12.0303 5.53033C12.171 5.67098 12.25 5.86175 12.25 6.06066V13.25C12.25 14.0784 11.5784 14.75 10.75 14.75Z"
                                            stroke="#111827" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                    <h3 v-on:click="showArticle($event, article)" v-html="article.post.title"
                                        class="ultd--title">
                                        {{ section.post.title }}
                                    </h3>
                                    <div class="full-article">
                                        <span v-on:click="hideArticle($event)" class="ia-article-closer">
                                            <svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7.33333 12.8337L1.5 7.00033M1.5 7.00033L7.33333 1.16699M1.5 7.00033L16.5 7.00032"
                                                    stroke="#A1A1AA" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <?php esc_html_e( 'Back to all articles', 'ultimate-doc' )?>
                                        </span>
                                        <div class="ultd--entry-content">
                                            <h3 v-on:click="showArticle($event, article)" v-html="article.post.title"
                                                class="ultd--title">
                                                {{ section.post.title }}
                                            </h3>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </li>
            </ul>
            <?php endif;?>

        </div>
        <div id="ultd--ia-chat" class="ultd--tab-content">
            <form action="" method="POST" class="ultd--ia-chat-form" v-on:submit.prevent="sendMail">
                <div class="ultd--ia-form-field">
                    <label for="name">Name</label>
                    <input type="text" v-model="name" name="name"
                        placeholder="<?php echo esc_html( $ia_name_placeholder ) ?>">
                </div>
                <div class="ultd--ia-form-field">
                    <label for="email">Email</label>
                    <input type="email" name="email" v-model="email"
                        placeholder="<?php echo esc_html( $ia_email_placeholder ) ?>">
                </div>
                <div class="ultd--ia-form-field">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" v-model="subject"
                        placeholder="<?php echo esc_html( $ia_subject_placeholder ) ?>">
                </div>
                <div class="ultd--ia-form-field">
                    <label for="message">Message</label>
                    <textarea name="message" v-model="message" id="message"
                        placeholder="<?php echo esc_html( $ia_message_placeholder ) ?>" cols="30" rows="10"></textarea>
                </div>
                <div class="ultd--ia-action">
                    <button type="submit">Send</button>
                </div>
            </form>
        </div>
        <div class="ultd--ia-copyright-text">
            <p> <?php esc_html_e( 'Proudly using', 'ultimatedoc' )?> <a href="https://www.finestdevs.com"
                    target="_blank"><?php esc_html_e( 'UltimateDoc', 'ultimate-doc' )?></a></p>
        </div>
    </div>
</div>

<?Php
}
add_shortcode( 'ultd__ia', 'ultd__instant_answer' );

?>