<?php 


    get_header(); 
    
?>
<?php 
    $template = get_theme_mod( 'single_doc_template', 'template-01' );


    $class = 'ud-container';
    
    if ( 'template-01' == $template) {
        $class = 'ud-container-fluid';
    }
 
    while ( have_posts() ) {
        the_post(); 
        $idd = get_the_ID(  );
        $doc_type = get_post_meta( $idd, 'doc_type', true );
        ?>
        <?php 

             if('article' == $doc_type):
                ?>

                    <div class="<?php echo esc_attr( $class. ' '. $template ) ?>" >
                        <div class="ud-single-wrap">
                        <?php 
                            $template = apply_filters( 'ud_include_single_template', UD_DIR.'templates/single-template/' . $template .'.php' );
                               if($template){
                                   include $template;
                               }
                        ?>  
                        </div><!-- .ud-single-wrap -->
                    </div>
            <?php elseif('doc' == $doc_type): 
                include UD_DIR.'templates/sections.php';
            endif; ?>
    <?php } ?>
<?php get_footer(); ?>
                