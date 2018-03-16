<?php
/**
 * The Template for displaying the contact page
 *
 * Template Name: Contact
 *
 * @package storefront-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' );
?>

<h1 class="woocommerce-products-header__title page-title">Contact</h1>

<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>

<div id="contact-container">
	<div id="contact-info">
		<div id="contact-heading-container">
			<h2 id="contact-heading"><span class="break">The Original Frameless</span> <span class="break">Shower Doors</span></h2>
		</div>
		<ul>
			<li class="contact"><strong>Headquarters</strong> <br>
			3591 NW 120th Avenue <br> Coral Springs, FL 33065</li>
			<li class="contact"><a href="https://www.framelessshowerdoors.com" target="_blank">www.FramelessShowerDoors.com</a></li>
			<li class="contact"><i class="fas fa-phone-square"></i> <a href="tel:+8553726537">(855) 372-6537</a></li>
			<li class="contact"><i class="fas fa-envelope-square"></i> <a href="mailto:info@fsdae.com">info@fsdae.com</a></li>
		</ul>
	</div>
</div>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );