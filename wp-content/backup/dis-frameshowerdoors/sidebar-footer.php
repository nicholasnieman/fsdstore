<?php $classes = get_body_class(); ?>
<div id="first" class="footer-widget-area widget-area col-md-2">
	<ul class="xoxo list-unstyled clearfix">
		<?php if ( ! dynamic_sidebar( 'Footer 1' )): ?>
			<li id="meta" class="widget-container">
				<h4 class="widget-title"><?php _e( 'Meta', 'theme' ); ?></h4>
				<ul class="list-group">
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>
		<?php endif;?>		
	</ul>
</div> <!-- #Footer 1 -->


<div id="second" class="footer-widget-area widget-area col-md-2">
	<ul class="xoxo list-unstyled">
		<?php 
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 2') ) :
			//if (! dynamic_sidebar( 'Footer 2 Edinburgh' )): ?>
			<li id="archives" class="widget-container">
				<h4 class="widget-title"><?php _e( 'Archives', 'theme' ); ?></h4>
				<ul class="list-group">
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>
		<?php endif;?>
	</ul>
</div> <!-- #Footer 2 -->

<div id="third" class="footer-widget-area widget-area col-md-2">
	<ul class="xoxo list-unstyled">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3') ) : ?>
			<li id="meta" class="widget-container">
				<h4 class="widget-title"><?php _e( 'Meta', 'theme' ); ?></h4>
				<ul class="list-group">
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>
		<?php endif;?>
	</ul>
</div> <!-- #Footer 3 -->

<div id="fourth" class="footer-widget-area widget-area <?php 
if( is_front_page() || in_array('page-template-about-DFI',$classes) || in_array('page-template-hardware-finishes',$classes) || is_single() || is_archive() )
	 { echo 'col-md-3'; } 
 else{ echo 'col-md-2'; }
 ?>">
	<ul class="xoxo list-unstyled">
		<?php 
		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footerr 4') ) :
		//if (! dynamic_sidebar( 'Footer 2 York' )): ?>
			<li id="archives" class="widget-container">
				<h4 class="widget-title"><?php _e( 'Archives', 'theme' ); ?></h4>
				<ul class="list-group">
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>
		<?php endif;?>
	</ul>
</div> <!-- #Footer 4 -->

<div id="fifth" class="footer-widget-area widget-area <?php 
if( is_front_page() || in_array('page-template-about-DFI',$classes) || in_array('page-template-hardware-finishes',$classes) || is_single() || is_archive() )
	 { echo 'col-md-3'; } 
 else{ echo 'col-md-2'; }
?>">
	<ul class="xoxo list-unstyled">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 5') ) :?>
			<li id="meta" class="widget-container">
				<h4 class="widget-title"><?php _e( 'Meta', 'theme' ); ?></h4>
				<ul class="list-group">
					<?php wp_nav_menu( array('menu' => 'Helpful Links' )); ?>
				</ul>
			</li>
		<?php endif;?>
	</ul>
</div> <!-- #Footer 5 -->