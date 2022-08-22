<?php
namespace ud;
/**
 * Ajax Class.
 */
class Ajax {

    public $current_page_id;
    /**
     * Bind actions.
     */
    public function __construct() {
        add_action( 'wp_ajax_ud_feedback', [$this, 'feedback_handler'] );
        add_action( 'wp_ajax_nopriv_ud_feedback', [$this, 'feedback_handler'] );

        add_action( 'wp_ajax_ud_get_articles', [$this, 'get_articles'] );
        add_action( 'wp_ajax_nopriv_ud_get_articles', [$this, 'get_articles'] );

        add_action( 'wp_ajax_ud_search_article', [$this, 'get_articles'] );
        add_action( 'wp_ajax_nopriv_ud_search_article', [$this, 'get_articles'] );

        add_action( 'wp_ajax_ud_show_article', [$this, 'show_article'] );
        add_action( 'wp_ajax_nopriv_ud_show_article', [$this, 'show_article'] );

        add_action( 'wp_ajax_ud_send_mail', [$this, 'process_contact_form'] );
        add_action( 'wp_ajax_nopriv_ud_send_mail', [$this, 'process_contact_form'] );
    }

    public function feedback_handler() {

        check_ajax_referer( 'ud-nonce' );
        $template = '<div class="wedocs-alert wedocs-alert-%s">%s</div>';
        $previous = isset( $_COOKIE['ud_response'] ) ? explode( ',', $_COOKIE['ud_response'] ) : [];
        $post_id  = intval( $_POST['post_id'] );
        $type     = in_array( $_POST['type'], ['like', 'dislike'] ) ? $_POST['type'] : false;

        // check previous response
        if ( in_array( $post_id, $previous ) ) {
            $message = sprintf( $template, 'danger', __( 'Sorry, you\'ve already recorded your feedback!', 'wedocs' ) );
            wp_send_json_error( false );
        }

        // seems new
        if ( $type ) {
            $count = (int) get_post_meta( $post_id, $type, true );
            update_post_meta( $post_id, $type, $count + 1 );

            array_push( $previous, $post_id );
            $cookie_val = implode( ',', $previous );

            $val = setcookie( 'ud_response', $cookie_val, time() + WEEK_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );
        }

        $message = sprintf( $template, 'success', __( 'Thanks for your feedback!', 'wedocs' ) );
        wp_send_json_success( $message );
    }

    /**
     * Get all articles.
     *
     * @return void
     */
    public function get_articles() {
        check_ajax_referer( 'ud-nonce' );

        $search_key      = false;
        $ia_show_all_doc = ud_get_option( 'ia_show_all_doc', 'on' );
        $ia_select_doc   = ud_get_option( 'ia_select_doc', [] );
        if ( isset( $_POST['s'] ) ) {
            $search_key = sanitize_text_field( $_POST['s'] );
        }
        if ( isset( $_POST['current_page_id'] ) ) {
            $this->current_page_id = sanitize_text_field( $_POST['current_page_id'] );
        }

        $args = [
            'post_type'      => 'docs',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ];

        if ( false != $search_key ) {
            $args['s'] = $search_key;
        }

        if ( 'on' != $ia_show_all_doc && 1 == count( $ia_select_doc ) ) {
            $args['meta_query'] = array(
                'relation' => 'AND',
                array(
                    'key'     => 'doc_type',
                    'value'   => 'article',
                    'compare' => '=',
                    'type'    => 'CHAR',
                ),
            );
        }

        $docs = get_posts( $args );

        $arranged = $this->build_tree( $docs, 0 );
        usort( $arranged, [$this, 'sort_callback'] );
        wp_send_json_success( $arranged );
    }

    /**
     * Get all articles.
     *
     * @return void
     */
    public function search_articles() {
        check_ajax_referer( 'ud-nonce' );

        if ( !isset( $_POST['s'] ) ) {
            wp_send_json_error();
        }

        $search_key = $_POST['s'];

        $docs = get_posts( [
            'post_type'      => 'docs',
            'posts_per_page' => '10',
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
            'meta_key'       => 'doc_type',
            'meta_value'     => 'article',
            's'              => $search_key,
            'meta_query'     => array(
                'relation' => 'AND',
                array(
                    'key'     => 'doc_type',
                    'value'   => 'article',
                    'compare' => '=',
                    'type'    => 'CHAR',
                ),
            ),

        ] );

        $arranged = $this->build_tree( $docs, 0, $search_key );
        usort( $arranged, [$this, 'sort_callback'] );
        wp_send_json_success( $arranged );
    }

    /**
     * Get all articles.
     *
     * @return void
     */
    public function show_article() {
        check_ajax_referer( 'ud-nonce' );

        if ( !isset( $_POST['id'] ) ) {
            wp_send_json_error();
        }

        $id = $_POST['id'];

        $docs = get_post( $id );

        // $arranged = $this->build_tree( $docs, 0, $search_key );
        // usort( $arranged, [$this, 'sort_callback'] );
        wp_send_json_success( $docs );
    }

    /**
     * Build a tree of docs with parent-child relation.
     *
     * @param array $docs
     * @param int   $parent
     *
     * @return array
     */
    public function build_tree( $docs, $parent = 0, $search_key = false ) {

        $current_page_id  = $this->current_page_id ? $this->current_page_id : false;
        $result           = [];
        $type             = 'docs';
        $ia_show_all_doc  = ud_get_option( 'ia_show_all_doc', 'on' );
        $ia_select_doc    = ud_get_option( 'ia_select_doc', [] );
        $ia_doc_show_type = ud_get_option( 'ia_doc_show_type', 'normal' );

        if ( !$docs ) {
            return $result;
        }

        if ( false != $search_key ) {
            $type = 'search';
        }

        foreach ( $docs as $key => $doc ) {
            $child            = [];
            $section_id       = $doc->post_parent;
            $doc_id           = wp_get_post_parent_id( $section_id );
            $doc_type         = get_post_meta( $doc->ID, 'doc_type', true ) ? get_post_meta( $doc->ID, 'doc_type', true ) : false;
            $ia_include_pages = get_post_meta( $doc_id, 'ia_include_pages', true ) ? get_post_meta( $doc_id, 'ia_include_pages', false )[0] : [];
            $ia_exclude_pages = get_post_meta( $doc_id, 'ia_exclude_pages', true ) ? get_post_meta( $doc_id, 'ia_exclude_pages', false )[0] : [];
            $excluded         = false;
            $article_count = 'doc' == $doc_type ? ud_get_total_article($doc->ID) : '';

            //Single article conditions
            if ( 'article' == $doc_type && 'condition' == $ia_doc_show_type ) {

                if ( $ia_exclude_pages ) {

                    if ( in_array( $current_page_id, $ia_exclude_pages ) ) {
                        $excluded = true;
                    }
                }

                if ( !$excluded ) {
                    if ( !in_array( $current_page_id, $ia_include_pages ) ) {
                        continue;
                    }
                }
            }

            $title = $doc->post_title;
            if ( $search_key ) {

                $title = preg_replace( '/(' . $search_key . ')/iu', '<strong class="search-highlight">\0</strong>', $doc->post_title );
            }

            if ( 'on' != $ia_show_all_doc && 'normal' === $ia_doc_show_type ) {
                if ( !in_array( $doc->ID, $ia_select_doc ) && !in_array( $section_id, $ia_select_doc ) && !in_array( $doc_id, $ia_select_doc ) ) {
                    continue;
                }

                if ( 1 != count( $ia_select_doc ) ) {
                    if ( !in_array( $doc->ID, $ia_select_doc ) && !in_array( $section_id, $ia_select_doc ) && !in_array( $doc_id, $ia_select_doc ) ) {
                        continue;
                    }

                } else {
                    if ( !in_array( $doc_id, $ia_select_doc ) ) {
                        continue;
                    } else {
                        $result[] = [
                            'post' => [
                                'type'    => $type,
                                'id'      => $doc->ID,
                                'title'   => $title,
                                'status'  => $doc->post_status,
                                'order'   => $doc->menu_order,
                                'slug'    => $doc->post_name,
                                'content' => $doc->post_content,
                                'excerpt' => wp_trim_words( $doc->post_content, 15 ),
                                'count'   => $article_count,

                            ],
                        ];
                        continue;
                    }
                }

            }elseif (  'condition' === $ia_doc_show_type ) {

                // single articles conditions 
                if ( !$ia_include_pages ) {
                    continue;
                } else {
                    $result[] = [
                        'post' => [
                            'type'    => $type,
                            'id'      => $doc->ID,
                            'title'   => $title,
                            'status'  => $doc->post_status,
                            'order'   => $doc->menu_order,
                            'slug'    => $doc->post_name,
                            'content' => $doc->post_content,
                            'excerpt' => wp_trim_words( $doc->post_content, 15 ),
                            'count'   => $article_count,
                        ],
                    ];
                    continue;

                }

            }
            if ( $doc->post_parent == $parent ) {
                unset( $docs[$key] );

                // build tree and sort
                $child = $this->build_tree( $docs, $doc->ID );
                usort( $child, [$this, 'sort_callback'] );

                $result[] = [
                    'post' => [
                        'type'    => $type,
                        'id'      => $doc->ID,
                        'title'   => $title,
                        'status'  => $doc->post_status,
                        'order'   => $doc->menu_order,
                        'slug'    => $doc->post_name,
                        'content' => $doc->post_content,
                        'excerpt' => wp_trim_words( $doc->post_content, 15 ),
                        'child'   => $child,
                        'count'   => $article_count,

                    ],
                ];

            }

        }

     

        return $result;
    }
    /**
     * Sort callback for sorting posts with their menu order.
     *
     * @param array $a
     * @param array $b
     *
     * @return int
     */
    public function sort_callback( $a, $b ) {
        return $a['post']['order'] - $b['post']['order'];
    }

    public function process_contact_form() {

        $errors  = [];
        $name    = '';
        $email   = '';
        $subject = '';
        $message = '';
        $to      = 'ashrafuddin765@gmail.com';

        if ( isset( $_POST['name'] ) && !empty( $_POST['name'] ) ) {
            $name = sanitize_text_field( $_POST['name'] );
        }

        if ( isset( $_POST['subject'] ) && !empty( $_POST['subject'] ) ) {
            $subject = sanitize_text_field( $_POST['subject'] );
        }

        if ( isset( $_POST['email'] ) && !empty( $_POST['email'] ) && is_email( $_POST['email'] ) ) {
            $email = sanitize_email( $_POST['email'] );
        }

        if ( isset( $_POST['message'] ) && !empty( $_POST['message'] ) ) {
            $message = sanitize_text_field( $_POST['message'] );
        }

        if ( !empty( $name ) && !empty( $email ) && !empty( $message ) ) {
            $headers   = [];
            $headers[] = 'From: Me Myself <' . get_bloginfo( 'admin_email' ) . '>';
//             $headers[] = 'Cc: John Q Codex <ashrafuddin765@gmail.com>';
            // $headers[] = 'Cc: iluvwp@wordpress.org'; // note you can just use a simple email address

            $body = "
                Name: $name\n
                Email: $email\n
                Message: $message\n

            ";

            $attachments = "";
            $sent        = wp_mail( $to, $subject, $message, $headers, $attachments );
            if ( $sent ) {
                $msg = "</br><div class='fdwc-inquiry-success'>Your request has been sent.</div>";
                wp_send_json_success( $msg );
            } else {

                $msg = "</br><div class='fdwc-inquiry-error'>Something went wrong.</div>";
                wp_send_json_error( $msg );

            }
        }

        $msg = "</br><div class='fdwc-inquiry-error'>Something went wrong 2.</div>";
        wp_send_json_error( $msg );

    }

}

$ajax = new Ajax();