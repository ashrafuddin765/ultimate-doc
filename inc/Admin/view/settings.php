<?php
$checked = '';
// if ( isset( $_POST['save_changes'] ) ) {

//     update_option( 'ud_sidebar_all_docs', false );

//     if ( array_key_exists( 'ia_show_all_doc', $_POST ) && 'on' == $_POST['ia_show_all_doc'] ) {

//         update_option( 'ud_sidebar_all_docs', true );
//     }
// }

// if ( true == get_option( 'ud_sidebar_all_docs' ) ) {
//     $checked = 'checked';
// }

// if ( isset( $_POST['save_changes'] ) ) {

//     if ( isset( $_POST['select_doc_homepage'] ) ) {

//         update_option( 'ud_documentation_page', $_POST['select_doc_homepage'] );
//     }
// }

$fields = [
    'select_doc_homepage',
    'docs_page_title',
    'docs_root_slug',
    'docs_support_page_link',
    'docs_enable_print',
    'ia_select_doc',
    // 'docs_enable_social_share',
    'docs_enable_feedback',
    // 'docs_search_not_found_text',
    'docs_search_placeholder',
    'docs_enable_masonry',
    'docs_posts_per_page',
    'article_enable_post_count',
    'article_count_text',
    'article_count_text_singular',
    'ia_show_all_doc',
    'ia_name_placeholder',
    'ia_email_placeholder',
    'ia_subject_placeholder',
    'ia_message_placeholder',
    'select_ia_position',
    'ia_doc_show_type',
];

$options = [];

if ( isset( $_POST['ud_save_changes'] ) ) {
    foreach ( $fields as $setting ) {

        if ( isset( $_POST[$setting] ) ) {
            if ( is_array( $_POST[$setting] ) ) {

                $value = $_POST[$setting];

            } else {

                $value = sanitize_text_field( $_POST[$setting] );
            }
            $options[$setting] = $value;
        } elseif ( 'ia_select_doc' == $setting ) {

            if ( !isset( $_POST[$setting] ) ) {
                $value = [];
            } else {

                $value = $_POST[$setting];
            }
        } else {
            $options[$setting] = '';
        }
    }
}

if ( !empty( $options ) ) {
    update_option( 'ud_settings', $options, false );
}

$select_doc_homepage    = ud_get_option( 'select_doc_homepage', false );
$ia_name_placeholder    = ud_get_option( 'ia_name_placeholder', 'Name' );
$ia_email_placeholder   = ud_get_option( 'ia_email_placeholder', 'Email' );
$ia_subject_placeholder = ud_get_option( 'ia_subject_placeholder', 'Subject' );
$ia_message_placeholder = ud_get_option( 'ia_message_placeholder', 'How we can help' );
$select_ia_position     = ud_get_option( 'select_ia_position', 'right' );
$ia_doc_show_type       = ud_get_option( 'ia_doc_show_type', 'normal' );

$docs_page_title        = ud_get_option( 'docs_page_title', __( 'FinestDevs Products', 'ultimate-doc' ) );
$docs_root_slug         = ud_get_option( 'docs_root_slug', 'docs' );
$docs_support_page_link = ud_get_option( 'docs_support_page_link', 'https://finestdevs.com' );
$docs_enable_feedback   = ud_get_option( 'docs_enable_feedback', true );
$ia_show_all_doc        = ud_get_option( 'ia_show_all_doc', true );
$ia_select_doc          = ud_get_option( 'ia_select_doc', [] );

$docs_enable_print = ud_get_option( 'docs_enable_print', true );
// $docs_enable_social_share = ud_get_option( 'docs_enable_social_share', true );
// $docs_search_not_found_text  = ud_get_option( 'docs_search_not_found_text', __( 'Sorry nothing matched', 'ultimate-doc' ) );
$docs_search_placeholder     = ud_get_option( 'docs_search_placeholder', __( 'Search for articles... ', 'ultimate-doc' ) );
$docs_enable_masonry         = ud_get_option( 'docs_enable_masonry', true );
$docs_posts_per_page         = ud_get_option( 'docs_posts_per_page', 10 );
$article_enable_post_count   = ud_get_option( 'article_enable_post_count', true );
$article_count_text          = ud_get_option( 'article_count_text', __( 'Articles', 'ultimate-doc' ) );
$article_count_text_singular = ud_get_option( 'article_count_text_singular', __( 'Article', 'ultimate-doc' ) );

?>
<!-- general  -->
<div class="wrap" id="ud-settings">
    <form  method="post">

        <!-- ud setting menu  -->
        <ul id="tabs" class="ud-setting-tabs-menu">
            <li><button class="ud-tab-link active"
                    onclick="udTabs(event,'ud-settings-general' ); ">General</button>
            </li>
            <li><button class="ud-tab-link" onclick="udTabs(event, 'ud-settings-layout')">Layout</button>
            </li>
            <li><button class="ud-tab-link" onclick="udTabs(event, 'ud-settings-Design')">Design</button>
            <li style="display: none ;"><button class="ud-tab-link" onclick="udTabs(event, 'ud-settings-ia')">Chatbox</button>
            </li>
            <?php do_action( 'ud_add_setting_tab_link' ) ?>
        </ul>
        <!-- general -->
        <div id="ud-settings-general" class="ud-tab-content" style="display: block;">
            <!-- doc home  -->
            <div class="ud-setting-field ud-docs-home">

                <label for="select_doc_homepage"><?php esc_html_e( 'Select Documentation Page', 'ultimatedoc' )?></label>
                <?php
                    wp_dropdown_pages( [
                        'name'     => 'select_doc_homepage',
                        'selected' => ud_get_option( 'select_doc_homepage' ),
                    ] );
                    ?>

            </div>

            <!-- doc pag title  -->
            <div class="ud-setting-field ud-docs-page-title">

                <label for="docs_page_title"><?php esc_html_e( 'Docs Pate Title', 'ultimatedoc' )?></label>

                <input type="text" name="docs_page_title" id="docs_page_title"
                    value="<?php echo esc_attr( $docs_page_title ) ?>">
            </div>

            <!-- doc root slug  -->
            <div class="ud-setting-field ud-docs-root-slug">

                <label for="docs_root_slug"><?php esc_html_e( 'Docs Root Slug', 'ultimatedoc' )?></label>

                <input type="text" name="docs_root_slug" id="docs_root_slug"
                    value="<?php echo esc_attr( $docs_root_slug ) ?>">
            </div>

            <!-- Support page link  -->
            <div class="ud-setting-field ud-suppport-page-link">

                <label for="docs_support_page_link"><?php esc_html_e( 'Support Page link', 'ultimatedoc' )?></label>

                <input type="text" name="docs_support_page_link" id="docs_support_page_link"
                    value="<?php echo esc_url( $docs_support_page_link ) ?>">
            </div>


            <!-- Enable feedback  -->
            <div class="ud-setting-field ud-print-article">
                <label for="docs_enable_print"><?php esc_html_e( 'Print Article', 'ultimatedoc' )?></label>
                <div class="ud-setting-checkbox">

                    <input type="checkbox" name="docs_enable_print" id="docs_enable_print"
                        <?php echo $docs_enable_print ? 'checked' : ''; ?>>
                    <span class="ud-checkmark"></span>
                </div>
            </div>
            <!-- Social Share  -->
            <!-- <div class="ud-setting-field ud-print-article">
                <label for="docs_enable_social_share"><?php esc_html_e( 'Social Share', 'ultimate-doc' )?></label>
                <div class="ud-setting-checkbox">

                    <input type="checkbox" name="docs_enable_social_share" id="docs_enable_social_share"
                        <?php echo $docs_enable_social_share ? 'checked' : ''; ?>>
                    <span class="ud-checkmark"></span>
                </div>
            </div> -->

            <!-- Enable feedback  -->
            <div class="ud-setting-field ud-print-article">
                <label
                    for="docs_enable_feedback"><?php esc_html_e( 'Enable user feedback option', 'ultimatedoc' )?></label>
                <div class="ud-setting-checkbox">

                    <input type="checkbox" name="docs_enable_feedback" id="docs_enable_feedback"
                        <?php echo $docs_enable_feedback ? 'checked' : ''; ?>>
                    <span class="ud-checkmark"></span>
                </div>

            </div>


        </div>
        <!-- Layout -->
        <div id="ud-settings-layout" class="ud-tab-content">

            <!-- tab menu -->


            <!-- layout doc page  -->


            <!-- layout design-page  -->
            <div id="ud-layout-doc-page" class="ud-layout-doc-page">

                <!-- doc search placeholder  -->
                <h4 class="ud-field-group-title"><?php esc_html_e( 'Search Function', 'ultimate-doc' )?></h4>
                <div class="ud-setting-field ud-docs-page-title">

                    <label
                        for="docs_search_placeholder"><?php esc_html_e( 'Search Placeholder', 'ultimatedoc' )?></label>

                    <input type="text" name="docs_search_placeholder" id="docs_search_placeholder"
                        value="<?php echo esc_attr( $docs_search_placeholder ) ?>">
                </div>

                <!-- doc search not found  -->
                <!-- <div class="ud-setting-field ud-search-not-found-text">

                    <label
                        for="docs_search_not_found_text"><?php esc_html_e( 'Search Not Found Text', 'ultimatedoc' )?></label>

                    <input type="text" name="docs_search_not_found_text" id="docs_search_not_found_text"
                        value="<?php echo esc_attr( $docs_search_not_found_text ) ?>">
                </div> -->

                <!-- article functionality -->
                <hr>
                <h4 class="ud-field-group-title"><?php esc_html_e( 'Doc & Section Function', 'ultimate-doc' )?></h4>
                <!-- Enable maoneyr  -->
                <div class="ud-setting-field ud-enable-masonry">
                    <label for="docs_enable_masonry"><?php esc_html_e( 'Enable Masonry', 'ultimatedoc' )?></label>
                    <div class="ud-setting-checkbox">

                        <input type="checkbox" name="docs_enable_masonry" id="docs_enable_masonry"
                            <?php echo $docs_enable_masonry ? 'checked' : ''; ?>>
                        <span class="ud-checkmark"></span>
                    </div>

                </div>
                <!-- Enable Post count  -->
                <div class="ud-setting-field ud-enable-post-count">
                    <label
                        for="article_enable_post_count"><?php esc_html_e( 'Enable Post Count', 'ultimatedoc' )?></label>
                    <div class="ud-setting-checkbox">

                        <input type="checkbox" name="article_enable_post_count" id="article_enable_post_count"
                            <?php echo $article_enable_post_count ? 'checked' : ''; ?>>
                        <span class="ud-checkmark"></span>
                    </div>
                </div>
                <!-- doc post per page  -->
                <div class="ud-setting-field ud-post-per-page">

                    <label
                        for="docs_posts_per_page"><?php esc_html_e( 'Number of posts to show per page', 'ultimatedoc' )?></label>

                    <input type="text" name="docs_posts_per_page" id="docs_posts_per_page"
                        value="<?php echo esc_attr( $docs_posts_per_page ) ?>">
                </div>


                <!-- Enable count test  -->
                <div class="ud-setting-field ud-count-text">
                    <label for="article_count_text"><?php esc_html_e( 'Count Text', 'ultimatedoc' )?></label>
                    <input type="text" name="article_count_text" id="article_count_text"
                        value="<?php echo esc_attr( $article_count_text ) ?>">
                </div>

                <!-- Enable count test singluar  -->
                <div class="ud-setting-field ud-count-text-singular">
                    <label
                        for="article_count_text_singular"><?php esc_html_e( 'Count Text Singular', 'ultimatedoc' )?></label>
                    <input type="text" name="article_count_text_singular" id="article_count_text_singular"
                        value="<?php echo esc_attr( $article_count_text_singular ) ?>">
                </div>
            </div>



        </div>
        <!-- Design -->
        <div id="ud-settings-design" class="ud-tab-content">

            <!-- tab menu -->
            <a href=""><?php esc_html_e( 'Customize UltimateDoc', 'ultimatedoc' )?></a>

        </div>

        <!-- Shortcode list -->
        <div id="ud-settings-shortcodes" class="ud-tab-content">

            <!-- tab menu -->
            <!-- <a href=""><?php esc_html_e( 'Customize UltimateDoc', 'ultimatedoc' )?></a> -->

        </div>


        <!-- Shortcode list -->
        <div id="ud-settings-ia" class="ud-tab-content">

            <!-- how to show chatbox multidoc  -->
            <div class="ud-setting-field ud-ia-show-type">
                <label for="ia_doc_show_type"><?php esc_html_e( 'How you want to show?', 'ultimatedoc' )?></label>
                <select name="ia_doc_show_type" id="ia_doc_show_type">
                    <option value="<?php echo esc_attr( 'normal' ) ?>"
                        <?php echo 'normal' == $ia_doc_show_type ? 'selected' : ''; ?>>
                        <?php esc_html_e( 'Normally', 'ultimate-doc' )?></option>
                    <option value="<?php echo esc_attr( 'condition' ) ?>"
                        <?php echo 'condition' == $ia_doc_show_type ? 'selected' : ''; ?>>
                        <?php esc_html_e( 'Conditionally', 'ultimate-doc' )?></option>
                </select>
                <span class="ud-setting-info hidden ">&nbsp;
                    <?php esc_html_e( 'You can set conditions from Docs.', 'ultimate-doc' )?></span>
            </div>

            <div class="ud-setting-field-wrap ia-show-type-normal">
                <!-- Enable multidoc  -->
                <div class="ud-setting-field ud-ia-show-all-doc">
                    <label for="ia_show_all_doc"><?php esc_html_e( 'Show all doc in chatbox', 'ultimatedoc' )?></label>
                    <div class="ud-setting-checkbox">

                        <input type="checkbox" name="ia_show_all_doc" id="ia_show_all_doc"
                            <?php echo $ia_show_all_doc ? 'checked' : ''; ?>>
                        <span class="ud-checkmark"></span>
                    </div>
                </div>

                <!-- doc home  -->
                <div class="ud-setting-field ud-ia-select-doc">

                    <label for="select_ia_doc"><?php esc_html_e( 'Select Documentation Page', 'ultimatedoc' )?></label>
                    <?php
                        $argc = [
                            'post_type'      => 'docs',
                            'posts_per_page' => -1,
                            'meta_query'     => array(
                                'relation' => 'AND',
                                array(
                                    'key'     => 'doc_type',
                                    'value'   => 'doc',
                                    'compare' => '=',
                                    'type'    => 'CHAR',
                                ),
                            ),

                        ];

                        ud_post_select( $argc, 'ia_select_doc[]', $ia_select_doc, 'multiple' );
                        ?>
                </div>
            </div>

            <!--   -->
            <div class="ud-setting-field ud-ia-position">

                <label for="select_ia_position"><?php esc_html_e( 'Select Position', 'ultimatedoc' )?></label>
                <select name="select_ia_position" id="select_ia_position">
                    <option value="<?php echo esc_attr( 'left' ) ?>"
                        <?php echo 'left' == $select_ia_position ? 'selected' : ''; ?>>
                        <?php esc_html_e( 'Left', 'ultimate-doc' )?></option>
                    <option value="<?php echo esc_attr( 'right' ) ?>"
                        <?php echo 'right' == $select_ia_position ? 'selected' : ''; ?>>
                        <?php esc_html_e( 'Right', 'ultimate-doc' )?></option>
                </select>

            </div>

            <div class="ud-setting-field ud-ia-name-placeholder">

                <label for="ia_name_placeholder"><?php esc_html_e( 'Name Placeholder', 'ultimatedoc' )?></label>

                <input type="text" name="ia_name_placeholder" id="ia_name_placeholder"
                    value="<?php echo esc_attr( $ia_name_placeholder ) ?>">
            </div>
            <div class="ud-setting-field ud-ia-email-placeholder">

                <label for="ia_email_placeholder"><?php esc_html_e( 'email Placeholder', 'ultimatedoc' )?></label>

                <input type="text" name="ia_email_placeholder" id="ia_email_placeholder"
                    value="<?php echo esc_attr( $ia_email_placeholder ) ?>">
            </div>
            <div class="ud-setting-field ud-ia-subject-placeholder">

                <label for="ia_subject_placeholder"><?php esc_html_e( 'subject Placeholder', 'ultimatedoc' )?></label>

                <input type="text" name="ia_subject_placeholder" id="ia_subject_placeholder"
                    value="<?php echo esc_attr( $ia_subject_placeholder ) ?>">
            </div>
            <div class="ud-setting-field ud-ia-message-placeholder">

                <label for="ia_message_placeholder"><?php esc_html_e( 'message Placeholder', 'ultimatedoc' )?></label>

                <input type="text" name="ia_message_placeholder" id="ia_message_placeholder"
                    value="<?php echo esc_attr( $ia_message_placeholder ) ?>">
            </div>
        </div>

        <?php do_action( 'ud_add_setting_tab_content' ) ?>

        <button type="submit"
            name="ud_save_changes"><?php esc_html_e( 'Save changes', 'ud-mini-cart-pro' )?></button>
    </form>
</div>