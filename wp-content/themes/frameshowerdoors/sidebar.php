<?php
/*
 * The Sidebar containing the sidebar 1 widget areas.
 */
?>

<!-- #Sidebar 1 -->
<div id="sidebar_1" class="widget-area">
	<ul class="xoxo list-unstyled">
	
		<?php
		if ( !dynamic_sidebar( 'Sidebar 1' ) ) : ?>
		
			<li id="archives" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Archives', 'theme' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

			<li id="meta" class="widget-container">
				<h3 class="widget-title"><?php _e( 'Meta', 'theme' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>
		<?php endif; // end Sidebar 1 ?>
	
	</ul>
</div> <!-- #Sidebar 1 -->