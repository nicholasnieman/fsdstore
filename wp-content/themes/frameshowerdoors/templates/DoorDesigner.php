

<?php
/*Template Name: DesignCalculator*/ 

	//get_header();



?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Shower Door Design Builder</title>
</head>

<body>
 
	<div style="width:100%; text-align:center"><img src="/wp-content/themes/frameshowerdoors/images/Frameless_logoTeal.png"></div>

 <?php wp_reset_query(); ?>
			      		<?php if(have_posts()) : ?>
   						<?php while(have_posts()) : the_post(); ?>
   							<div class="page_cont">
   								<?php the_content(); ?>
   							</div>
   						<?php endwhile; ?>
   						<?php else : ?>
   						<?php endif; ?>
</body>
</html>
