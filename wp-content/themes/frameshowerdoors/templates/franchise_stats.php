<?php
require_once( get_template_directory() . "/class/frameless.php" );
$frameless=new frameless();
$clicks = $frameless->number_of_clicks();
/**
 * Template Name: Franchise Statistics
 * Stats for the franchise landing page
 *
 **/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title(' | ', true, 'right'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<!--? php wp _head(); ?-->

    <!-- Google Code -->

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-42123129-1', 'auto');
        ga('send', 'pageview');

    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NB5K7T');</script>
    <!-- End Google Tag Manager -->

    <!-- END Google Code -->

</head>
<body <?php body_class(); ?> onload="redirect()">
<?php
echo "<hr>&nbsp;<br>&nbsp;&nbsp;Current all time clicks: " . $clicks . "<br>&nbsp;<hr>";
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</body>
</html>