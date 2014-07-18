<?php

if ( is_admin() )
	return;

if ( ! class_exists( 'ExtensionNoTitleLayout' ) ) {
	class ExtensionNoTitleLayout {
		function ExtensionNoTitleLayout() {
			it_classes_load( 'it-file-utility.php' );
			$this->_base_url = ITFileUtility::get_url_from_file( dirname( __FILE__ ) );
			add_action( 'builder_layout_engine_render', array( &$this, 'change_render_content' ), 0 );	
		}
		function extension_render_content() {	
		?>
			<?php if ( have_posts() ) : ?>
				<div class="loop">
					<div class="loop-content">
						<?php while ( have_posts() ) : // The Loop ?>
							<?php the_post(); ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="entry-content clearfix">
									<?php the_content(); ?>
								</div>
							</div>								
						<?php endwhile;  ?>
					</div>
				</div>
			<?php else :  ?>
				<?php do_action( 'builder_template_show_not_found' ); ?>
			<?php endif;  ?>
		<?php

		}
		function change_render_content() {
			remove_action( 'builder_layout_engine_render_content', 'render_content' );
			add_action( 'builder_layout_engine_render_content', array( &$this, 'extension_render_content' ) );
		}
	} // end class 

	$ExtensionNoTitleLayout = new ExtensionNoTitleLayout();
}