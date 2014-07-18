<?php
function register_content_sidebars() {
		$sidebar = array(
                'id' => 'above_content_sidebar',
                'name' => __('Above Content'),
                'description' => __( 'This widget section sits above the content area' ),
                'before_widget' => '<div class=""><div class=""><div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div></div></div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'
        );

 	register_sidebar($sidebar);
        $sidebar = array(
                'id' => 'below_content_left_sidebar',
                'name' => __('Below Content Left Sidebar'),
                'description' => __( 'This widget section sits below the content area on the left' ),
                'before_widget' => '<div class="pin-left"><div class="left clearfix"><div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div></div></div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'
        );

 	register_sidebar($sidebar);

        $sidebar = array(
                'id' => 'below_content_right_sidebar',
                'name' => __('Below Content Right Sidebar'),
                'description' => __( 'This widget section sits below the content area on the right' ),
                'before_widget' => '<div class="pin-right"><div class="right clearfix"><div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div></div></div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'
        );

        register_sidebar($sidebar);
}
add_action('widgets_init', 'register_content_sidebars');


if ( is_active_sidebar( 'above_content_sidebar' ) ) {
        add_action( 'builder_module_render_element_block_contents_content', 'insert_above_content_sidebar');   // add sidebar
}



if ( is_active_sidebar( 'below_content_left_sidebar' ) ) {
        add_action( 'builder_module_render_element_block_contents_content', 'insert_below_content_left_sidebar', 98);   // add sidebar
}


if ( is_active_sidebar( 'below_content_right_sidebar' ) ) {
        add_action( 'builder_module_render_element_block_contents_content', 'insert_below_content_right_sidebar', 99 );
}



function insert_above_content_sidebar($fields) {
	
	dynamic_sidebar( 'above_content_sidebar' );
               

        
}




function insert_below_content_left_sidebar($fields) {
	
		dynamic_sidebar( 'below_content_left_sidebar' );
              
}

// display the bottom widget area
function insert_below_content_right_sidebar($fields) {
        dynamic_sidebar( 'below_content_right_sidebar' );
        
}

