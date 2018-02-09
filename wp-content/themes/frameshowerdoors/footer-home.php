<!-- #Footer Area -->
<div id="footer-common-sec">
	<div class="footer_top">
	  <div class="container">
	    <div class="row">
	      <?php get_sidebar('footer'); ?>
	    </div>
	  </div>
	</div>
	
	<div class="footer_bottom">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-12">
	        <p>&copy; <?php echo DATE('Y');?> <a href="<?php bloginfo('url'); ?>/index.php">The Original Frameless Shower Doors</a>. All Rights Reserved. | <a href="<?php bloginfo('url'); ?>/terms-conditions">Terms &amp; Conditions</a></p>
	      </div>
	    </div>
	  </div>
	</div>
</div> <!-- #Footer Area -->

<?php wp_footer(); ?>

<?php include_once("tracking.php"); ?>

</body>
</html>