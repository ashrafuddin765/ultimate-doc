<?php
class Admin {
    function __construct() {

        add_action( 'admin_menu', [$this, 'admin_menu'] );
        add_action( 'admin_enqueue_scripts', [$this, 'admin_scripts'] );

    }

    public function admin_scripts( $hook ) {
        if ( 'toplevel_page_ultimate-doc' != $hook && 'ultimatedoc_page_ultd--settings' != $hook ) {
            return;
        }

        wp_enqueue_script( 'jquery-ui-core' ); // enqueue jQuery UI Core
        wp_enqueue_script( 'jquery-ui-tabs' ); // enqueue jQuery UI Tabs

        wp_enqueue_style( 'admin-style', ULTD_ASSETS_CSS . 'admin.css' );

        wp_enqueue_script( 'vue', 'https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js', [], time(), true );
        wp_enqueue_script( 'sweetalert', ULTD_ASSETS_JS . 'sweetalert.min.js', ['jquery'], time(), true );
        wp_enqueue_script( 'jquery-ui-tabs' );
        wp_enqueue_script( 'ultd--frontentd-script', ULTD_ASSETS_JS . 'ultimate-doc.js', ['jquery', 'jquery-ui-sortable', 'wp-util'], time(), true );
        wp_enqueue_script( 'ultd--admin-script', ULTD_ASSETS_JS . 'admin-script.js', ['jquery', 'jquery-ui-sortable', 'wp-util'], time(), true );



        wp_localize_script( 'ultd--admin-script', 'UltimateDoc', [
            'nonce'               => wp_create_nonce( 'ultd--admin-nonce' ),
            'editurl'             => admin_url( 'post.php?action=edit&post=' ),
            'viewurl'             => home_url( '/?p=' ),
            'enter_doc_title'     => __( 'Enter doc title', 'ultimate-doc' ),
            'title'               => __( 'Title', 'ultimate-doc' ),
            'quickedit'           => __( 'Quick Edit', 'ultimate-doc' ),
            'slug'                => __( 'Slug', 'ultimate-doc' ),
            'write_something'     => __( 'Write something', 'ultimate-doc' ),
            'enter_section_title' => __( 'Enter section title', 'ultimate-doc' ),
            'confirmBtn'          => __( 'OK', 'ultimate-doc' ),
            'delConfirmBtn'       => __( 'Yes, delete it!', 'ultimate-doc' ),
            'cancelBtn'           => __( 'Cancel', 'ultimate-doc' ),
            'delConfirm'          => __( 'Are you sure?', 'ultimate-doc' ),
            'delConfirmTxt'       => __( 'Are you sure to delete the entire section? Articles inside this section will be deleted too!', 'ultimate-doc' ),
            'include_title'       => __( 'Include Pages', 'ultimate-doc' ),
            'exclude_title'       => __( 'Exclude Pages', 'ultimate-doc' ),

        ] );

    }

    public function admin_menu() {
        global $sdk_license;
        add_menu_page( __( 'UltimateDoc', 'ultimate-doc' ), __( 'UltimateDoc', 'ultimate-doc' ), 'manage_options', 'ultimate-doc', [$this, 'doc_page'], 'dashicons-media-document', 48 );

        add_submenu_page( 'ultimate-doc', __( 'Docs', 'ultimate-doc' ), __( 'Docs', 'ultimate-doc' ), 'manage_options', 'ultimate-doc', [$this, 'doc_page'] );

        add_submenu_page( 'ultimate-doc', __( 'Tags', 'ultimate-doc' ), __( 'Tags', 'ultimate-doc' ), 'manage_categories', 'edit-tags.php?taxonomy=doc-tag&post_type=ultimate-doc' );

        add_submenu_page( 'ultimate-doc', __( 'Settings', 'ultimate-doc' ), __( 'Settings', 'ultimate-doc' ), 'manage_options', 'ultd--settings', [$this, 'settings_page'] );

        // $sdk_license->create_license_menu( 'ultimate-doc' );

    }

    public function doc_page() {
        include 'view/admin.php';
    }
    public function settings_page() {
        include 'view/settings.php';
    }

}
$admin = new Admin();