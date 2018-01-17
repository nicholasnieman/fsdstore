<?php
/**
 * Single Product Sale Flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

// Sale badge type
$badge = cs_get_option( 'wc-badge-type' );

?>
<div class="badge tu tc fs__12 ls__2">
	<?php
		if ( $product->is_on_sale() ) {
			if ( $badge == 'text' ) {
				echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale pa right">' . esc_html__( 'Sale', 'claue' ) . '</span>', $post, $product );
			} else {
				$regular_price = $product->get_regular_price();
				$sale_price    = $product->get_sale_price();

				if ( $regular_price != '' && ! $product->is_type( 'variable' ) ) {
					$sale = '-' . ceil( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 ) . '%';
				} else {
					$sale = esc_html__( 'Sale', 'claue' );
				}
				echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale pa right">' . esc_attr( $sale ) . '</span>', $post, $product );
			}
		}

		if ( ! $product->is_in_stock() ) {
			echo '<span class="sold-out pa left">' . esc_html__( 'Sold Out', 'claue' ) . '</span>';
		} else {
			// Get page options
			$options = get_post_meta( get_the_ID(), '_custom_wc_options', true );

			// Get time to set new product (day(s))
			$new = isset( $options['wc-single-new-arrival'] ) ? $options['wc-single-new-arrival'] : '5';

			$postdate      = get_the_time( 'Y-m-d' );
			$postdatestamp = strtotime( $postdate );

			if ( ( time() - ( 60 * 60 * 24 * (int) $new ) ) < $postdatestamp ) {
				echo '<span class="new pa left">' . esc_html__( 'New', 'claue' ) . '</span>';
			}
		}
	?>
</div>