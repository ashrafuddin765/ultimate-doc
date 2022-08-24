<?php
/**
 * Template Manager Class
 */
class Manager {

    /**
     * Shortcode class
     */
    public $shortcode;

    /**
     * Theme wrapper class
     
     */
    public $theme;

    /**
     * Class Constructor
     */
    public function __construct() {
        // override the theme template
        add_filter( 'template_include', [ $this, 'template_loader' ], 20 );


    }


    /**
     * If the theme doesn't have any single doc handler, load that from
     * the plugin.
     *
     * @param string $template
     *
     * @return string
     */
    public function template_loader( $template ) {


        $file = ULTD_TEMPLATE . 'single-docs.php';

        if ( file_exists($file) && 'docs' == get_post_type() && is_single() ) {
            $template = $file;
            // include $template;
        }
        
        
        return $template;
    }

    
    
}

$Manager = new Manager();