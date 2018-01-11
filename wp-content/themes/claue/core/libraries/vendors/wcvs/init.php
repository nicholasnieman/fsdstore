<?php
/**
 * Initialize Color swatch.
 *
 * @since   1.0.0
 * @package Claue
 */

if ( class_exists( 'WPA_WCVS' ) && class_exists( 'WooCommerce' ) && ! class_exists( 'ColorSwatch' ) ) {
	/**
	 * Change the HTML when click to color swatch.
	 *
	 * @since 1.0.0
	 */
	function jas_claue_wcvs_modify_images() {
		global $post, $product;

		// Get page options
		$options = get_post_meta( get_the_ID(), '_custom_wc_options', true );

		// Get product single style
		$style = ( is_array( $options ) && $options['wc-single-style'] ) ? $options['wc-single-style'] : ( cs_get_option( 'wc-single-style' ) ? cs_get_option( 'wc-single-style' ) : '1' );

		$thumb_position = ( is_array( $options ) && $options['wc-single-style'] == 1 && $options['wc-thumbnail-position'] ) ? $options['wc-thumbnail-position'] : ( cs_get_option( 'wc-thumbnail-position' ) ? cs_get_option( 'wc-thumbnail-position' ) : 'left' );

		// Get image zoom
		$zoom = '';
		if ( cs_get_option( 'wc-single-zoom' ) ) {
			$zoom = ' jas-image-zoom';
		}
		?>
			<script>
				(function( $ ) {
					"use strict";
					
					$( document.body ).off( 'wpa_wcvs_update_html' ).bind( 'wpa_wcvs_update_html', function( event, data ) {
						var productId     = data.pid,
							galleries     = $( '.variations_form' ).data( 'galleries' ),
							formData      = $( '.variations_form' ).data( 'product_variations' ),
							galleryKey    = '',
							selectedAttr  = {},
							usedImages    = [],
							output_gal    = [],
							output_thumb  = [],
							images;
						

						// Get selected size and color
						$( '#product-' + productId + ' .swatch select' ).each(function () {
							if ( $( this ).parent().parent().hasClass( 'is-color' ) ) {
								galleryKey = '_product_image_gallery_' + $( this ).data( 'attribute_name' ).replace( 'attribute_', '' ) + '-' + $( this ).val();
							}
							selectedAttr[$( this ).data( 'attribute_name' ).replace( 'attribute_', '' )] = $( this ).val();
						});

						if ( typeof( galleries[galleryKey] ) !== 'undefined' && galleries[galleryKey] !== null ) {
							images = galleries[galleryKey];
							// Get image gallery
    						$.each( images, function ( index, image ) {
    							if ( image['single'] == undefined ) {
    								var img_single = image['thumbnail'];
    							} else {
    								var img_single = image['single']; 
    							}
    
    							if ( $.inArray( img_single, usedImages ) === -1 ) {
    								output_gal += '<div class="p-item woocommerce-product-gallery__image<?php echo $zoom; ?>">';
    								output_gal += '<a href="' + image['data-large_image'] + '">';
    								output_gal += '<img width="' + image['data-large_image_width'] + '" height="' + image['data-large_image_height'] + '" src="' + img_single + '" class="attachment-shop_single size-shop_single" alt="" title="" data-src="' + image['data-src'] + '" data-large_image="' + image['data-large_image'] + '" data-large_image_width="' + image['data-large_image_width'] + '" data-large_image_height="' + image['data-large_image_height'] + '"/>';
    								output_gal += '</a></div>';
    
    								output_thumb += '<div>';
    								output_thumb += '<img src="' + image['thumbnail'] + '" />';
    								output_thumb += '</div>';
    
    								usedImages.push( img_single );
    							}
    						});
    				} else {
							images = galleries['default_gallery'];
							
							// Get variation image
    						$.each( formData, function ( index, variation ) {
    							if ( Object.keys( variation['attributes']).length === Object.keys( selectedAttr ).length ) {
    								// Flag to check right or wrong variation
    								var chooseThisVariation = true;
    
    								$.each( selectedAttr, function ( attrName, attrValue ) {
    									if ( variation['attributes']['attribute_' + attrName + ''] !== '' && variation['attributes']['attribute_' + attrName + ''] !== attrValue) {
    										chooseThisVariation = false;
    									}
    								});
    
    								if ( chooseThisVariation ) {
    									var image = variation['image'];
    
    									if ( $.inArray( image['thumb_src'], usedImages ) === -1 ) {
    										output_gal += '<div class="p-item woocommerce-product-gallery__image<?php echo $zoom; ?>">';
    										output_gal += '<a href="' + image['full_src'] + '">';
    										output_gal += '<img width="' + image['src_w'] + '" height="' + image['src_h'] + '" src="' + image['src'] + '" class="attachment-shop_single size-shop_single" alt="" title="" data-src="' + image['full_src'] + '" data-large_image="' + image['full_src'] + '" data-large_image_width="' + image['full_src_w'] + '" data-large_image_height="' + image['full_src_h'] + '" />';
    										output_gal += '</a></div>';
    
    										output_thumb += '<div>';
    										output_thumb += '<img src="' + image['thumb_src'] + '" />';
    										output_thumb += '</div>';
    
    										usedImages.push( image['thumb_src'] );
    										return true;
    									}
    								}
    							}
    						});
    				}

						if ( window._inQuickview ) {
							var output = '<div class="p-thumb images jas-carousel woocommerce-product-gallery" data-slick=\'{"slidesToShow": 1, "slidesToScroll": 1, "fade":true, "dots":true<?php echo ( is_rtl() ? ',"rtl":true' : '' ); ?>}\'>' + output_gal + '</div>';
						} else {
							<?php if ( $style == 1 ) { ?>

								var output = '<div class="p-thumb images jas-carousel woocommerce-product-gallery" data-slick=\'{"slidesToShow": 1, "slidesToScroll": 1, "asNavFor": ".p-nav", "fade":true<?php echo ( is_rtl() ? ',"rtl":true' : '' ); ?>}\'>' + output_gal + '</div>';

							<?php } elseif ( $style == 2 ) { ?>

								var output = '<div class="p-thumb images woocommerce-product-gallery jas-masonry" data-masonry=\'{"selector":".p-item", "layoutMode":"masonry"}\'>' + output_gal + '</div>';

							<?php } else {
								if ( wp_is_mobile() ) { ?>

									var output = '<div class="p-thumb images jas-carousel woocommerce-product-gallery" data-slick=\'{"responsive":[{"breakpoint": 736,"settings":{"slidesToShow": 1, "vertical": false, "arrows": true<?php echo ( is_rtl() ? ',"rtl":true' : '' ); ?>}}]}\'>' + output_gal + '</div>';

								<?php } else { ?>

									var output = '<div class="p-thumb images woocommerce-product-gallery">' + output_gal + '</div>';

								<?php } ?>
							<?php } ?>
						}

						<?php if ( $style == 1 && $thumb_position != 'outside' ) { ?>
							output += '<div class="p-nav oh jas-carousel<?php if ( $thumb_position == 'outside' ) echo ' p-nav-outside'; ?>" data-slick=\'{"slidesToShow": 4,"slidesToScroll": 1,"asNavFor": ".p-thumb","arrows": false, "focusOnSelect": true, <?php if ( $thumb_position == 'left' || $thumb_position == 'right' ) echo '"vertical": true,'; ?> <?php if ( $thumb_position == 'outside') echo ( is_rtl() ? ',"rtl":true' : '' ); ?> "responsive":[{"breakpoint": 736,"settings":{"slidesToShow": 4, "vertical":false<?php echo ( is_rtl() ? ',"rtl":true' : '' ); ?>}}]}\'>' + output_thumb + '</div>';
						<?php } ?>

						<?php if ( isset( $options ) && ! empty( $options['wc-single-video-upload'] ) || ! empty( $options['wc-single-video-url'] ) ) : ?>
								output += '<div class="p-video pa">';
									<?php if ( $options['wc-single-video'] == 'url' ) { ?>
										output += '<a href="<?php echo esc_url( $options['wc-single-video-url'] ); ?>" class="br__40 pl__30 pr__30 tc db bghp jas-popup-url"><i class="pe-7s-play pr"></i><?php echo esc_html__( 'View Video', 'claue' ); ?></a>';
									<?php } else { ?>
											output += '<a href="#jas-vsh" class="br__40 pl__20 pr__20 tc db bghp jas-popup-mp4"><i class="pe-7s-play pr"></i><?php echo esc_html__( 'View Video', 'claue' ); ?></a>';
											output += '<div id="jas-vsh" class="mfp-hide"><?php do_shortcode( '[video src="' . esc_url( $options['wc-single-video-upload'] ) . '" width="640" height="320"]' ); ?></div>';
									<?php } ?>
									output +=  '</div>';
						<?php endif; ?>

						$( '#product-' + productId + ' .single-product-thumbnail' ).html( output );

						setTimeout(function() {
							$( '.jas-carousel' ).not( '.slick-initialized' ).slick();

							if ( $( '.jas-image-zoom' ).length > 0 && ! window._inQuickview ) {
								$( '.jas-image-zoom' ).zoom({
									touch: false,
								});
							}

							// Reset the index of image on product variation
							$( 'body' ).on( 'found_variation', '.variations_form', function( ev, variation ) {
								if ( variation && variation.image && variation.image.src && variation.image.src.length > 1 ) {
									$( '.jas-carousel' ).slick( 'slickGoTo', 0 );
								}
							});
						}, 10);

						// Trigger gallery
						if ( $( '.woocommerce-product-gallery' ).length > 0 && ! window._inQuickview ) {
							$( '.woocommerce-product-gallery' ).each( function () {
								$( this ).wc_product_gallery();
							});
							$( 'body' ).on( 'click', '.pswp__container, .pswp__button--close', function() {
								$( '.pswp' ).removeAttr( 'class' ).addClass( 'pswp' );
							});
						}
					});
				})( jQuery );
			</script>
		<?php
	}
	add_action( 'wp_footer', 'jas_claue_wcvs_modify_images', 1000 );

}