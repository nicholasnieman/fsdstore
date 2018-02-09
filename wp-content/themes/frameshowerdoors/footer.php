<?php 
	inner_footer();
  // testiominal_code();
  // pages_link_section(); 

?>

<!-- #Footer Area -->


<div class="footer_top inner-footer">
	<div id="main" class="container" style="min-height: 100px;">
	    <div class="row">
	      <?php get_sidebar('footer'); ?>
	    </div>
	</div>
</div>
	<div id="footer-bottom" class="footer_bottom  inner-footer">
	  <div id="main" class="container" style="min-height: 30px;">
	    <div class="row">
	      <div class="col-md-12">
	        <p>&copy; <?php echo DATE('Y');?> <a href="<?php bloginfo('url'); ?>">The Original Frameless Shower Doors</a>. All Rights Reserved. | <a href="<?php bloginfo('url'); ?>/terms-conditions/">Terms &amp; Conditions</a></p>
	      </div>
	    </div>
	  </div>
	</div>
		
 </div><!-- Innerheader -->
 <!-- #Footer Area -->

<?php wp_footer(); ?>

<?php include_once("tracking.php"); ?>




</body>
</html>