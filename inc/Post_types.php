<?php

/**
 * Post type class
 */
class Post_Types {

    /**
     * The post type name.
     *
     * @var string
     */
    private $post_type = 'docs';

    /**
     * Initialize the class
     */
    public function __construct() {
        add_action( 'init', [$this, 'register_post_type'] );
        add_action( 'init', [$this, 'register_taxonomy'] );
    }


    public function register_post_type() {
        $slug = ultd__get_option('docs_root_slug', 'docs');
        $labels = array(
            'name'               => _x( 'Docs', 'post type general name', 'ultimate-doc' ),
            'singular_name'      => _x( 'Docs', 'post type singular name', 'ultimate-doc' ),
            'menu_name'          => _x( 'Docs', 'admin menu', 'ultimate-doc' ),
            'name_admin_bar'     => _x( 'Docs', 'add new on admin bar', 'ultimate-doc' ),
            'add_new'            => __( 'Add New Docs', 'ultimate-doc' ),
            'add_new_item'       => __( 'Add New Docs', 'ultimate-doc' ),
            'new_item'           => __( 'New Docs', 'ultimate-doc' ),
            'edit_item'          => __( 'Edit Docs', 'ultimate-doc' ),
            'view_item'          => __( 'View Docs', 'ultimate-doc' ),
            'all_items'          => __( 'All Docs', 'ultimate-doc' ),
            'search_items'       => __( 'Search Docs', 'ultimate-doc' ),
            'parent_item_colon'  => __( 'Parent :', 'ultimate-doc' ),
            'not_found'          => __( 'No docs found.', 'ultimate-doc' ),
            'not_found_in_trash' => __( 'No docs found in Trash.', 'ultimate-doc' ),
        );
        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'ultimate-doc' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => false,
            'show_in_admin_bar'  => true,
            'query_var'          => true,
            'menu_icon'          => 'dashicons-format-gallery',
            'rewrite'            => array( 'slug' => $slug, 'with_front' => true, 'pages' => true, 'feeds' => true ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => true,
            'menu_position'      => null,
            'supports'           => array( 'title', 'elementor', 'editor', 'thumbnail', 'attributes' ),
        );
        register_post_type( 'docs', $args );
    }
    public function register_taxonomy() {
        $labels = array(
            'name'              => _x( 'Tags', 'taxonomy general name', 'ultimate-doc' ),
            'singular_name'     => _x( 'Tag', 'taxonomy singular name', 'ultimate-doc' ),
            'search_items'      => __( 'Search Tags', 'ultimate-doc' ),
            'all_items'         => __( 'All Tags', 'ultimate-doc' ),
            'parent_item'       => __( 'Parent Tag', 'ultimate-doc' ),
            'parent_item_colon' => __( 'Parent Tag:', 'ultimate-doc' ),
            'edit_item'         => __( 'Edit Tag', 'ultimate-doc' ),
            'update_item'       => __( 'Update Tag', 'ultimate-doc' ),
            'add_new_item'      => __( 'Add New Tag', 'ultimate-doc' ),
            'new_item_name'     => __( 'New Tag Name', 'ultimate-doc' ),
            'menu_name'         => __( 'Tag', 'ultimate-doc' ),
        );

        $args = [
            'labels'            => $labels,
            'hierarchical'      => false,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud'     => true,
            'show_in_rest'      => true,
            'rewrite'           => array( 'slug' => 'doc-tag' ),
        ];

        register_taxonomy( 'doc-tag', array( 'docs' ), $args );
    }
}
$post_type = new Post_Types();
