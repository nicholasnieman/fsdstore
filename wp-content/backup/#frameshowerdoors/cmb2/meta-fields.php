<?php
ob_start();
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( get_template_directory() . '/cmb2/init.php' ) ) {
	require_once get_template_directory() . '/cmb2/init.php';
}

/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter
 *
 * @param  CMB2 object $cmb CMB2 object
 *
 * @return bool             True if metabox should show
 */
function yourprefix_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function yourprefix_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Only return default value if we don't have a post ID (in the 'post' query variable)
 *
 * @param  bool  $default On/Off (true/false)
 * @return mixed          Returns true or '', the blank default
 */
function cmb2_set_checkbox_default_for_new_post( $default ) {
    return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  CMB2_Field object $field      Field object
 */
function yourprefix_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}

add_action( 'cmb2_admin_init', 'product_options_metabox' );
/**
* Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
*/
function product_options_metabox() {
	$prefix = 'tinfini_';
	/**
	* Sample metabox to demonstrate each field type included
	*/
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'product_options_',
		'title'         => __( 'Product Type', 'cmb2' ),
		'object_types'  => array( 'product', ), // Post types
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$cmb_demo->add_field( array(
		'name' => __( 'Bundled Product', 'cmb2' ),
		'desc' => __( 'field description (optional)', 'cmb2' ),
		'id'   => $prefix . 'checkbox_bundled',
		'type' => 'checkbox',
	) );
	$cmb_demo->add_field( array(
		'name'             => __( 'Store Product' , 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'storemetabox',
		'type' 			   => 'checkbox',
	) );
}

add_action( 'cmb2_admin_init', 'glass_register_demo_metabox' );
/**
* Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
*/
function glass_register_demo_metabox() {
	$prefix = 'tinfini_';
	/**
	* Sample metabox to demonstrate each field type included
	*/
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'glassmetabox',
		'title'         => __( 'Glass Metabox', 'cmb2' ),
		'object_types'  => array( 'product', ), // Post types
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$glass_thickness 	= 	array_filter( get_option('glass_thickness'), 'strlen' );
	$glass_type 		= 	array_filter( get_option('glass_type'), 'strlen' );
	$cmb_demo->add_field( array(
		'name' => __( 'SQFT For Glass Edges', 'cmb2' ),
		'desc' => __( 'How many fields you want to show', 'cmb2' ),
		'id'   => $prefix . 'glass_sqft_set',
		'type' => 'text_small',
	) );
	$cmb_demo->add_field( array(
		'name' => __( 'Glass Formula', 'cmb2' ),
		'desc' => __( 'Formula to calculate Sqft', 'cmb2' ),
		'id'   => $prefix . 'gls_formula',
		'type' => 'text_medium',
	) );
	$cmb_demo->add_field( array(
		'name' => __( 'Glass Sqft Image', 'cmb2' ),
		'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
		'id'   => $prefix . 'gls_sqft_image',
		'type' => 'file',
	) );
	$cmb_demo->add_field( array(
		'name'             => __( 'Glass Thickness' , 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'gls_thckne_select',
		'type'             => 'multicheck',
		'options'          => $glass_thickness
	) );
	$cmb_demo->add_field( array(
		'name'             => __( 'Glass Type' , 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'glass_type_select',
		'type'             => 'multicheck',
		'options'          => $glass_type
	) );
}

add_action( 'cmb2_admin_init', 'knob_register_demo_metabox' );
/**
* Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
*/
function knob_register_demo_metabox() {
	$prefix = 'tinfini_';
	/**
	* Sample metabox to demonstrate each field type included
	*/
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'knobmetabox',
		'title'         => __( 'Knob Metabox', 'cmb2' ),
		'object_types'  => array( 'product', ), // Post types
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$knob_style  = 	array_filter( get_option('knob_style'), 'strlen' ); 
	$cmb_demo->add_field( array(
		'name' => __( 'Pull', 'cmb2' ),
		'desc' => __( 'If want to show pull on product page then check it', 'cmb2' ),
		'id'   => $prefix . 'checkbox_pullknob',
		'type' => 'checkbox',
		'default' => cmb2_set_checkbox_default_for_new_post( true ),
	) );
	$cmb_demo->add_field( array(
		'name'             => __( 'Knob Style' , 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'knob_style_select',
		'type'             => 'multicheck',
		'options'          => $knob_style
	) );
}

add_action( 'cmb2_admin_init', 'handle_register_demo_metabox' );
/**
* Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
*/
function handle_register_demo_metabox() {
	$prefix = 'tinfini_';
	/**
	* Sample metabox to demonstrate each field type included
	*/
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'handlemetabox',
		'title'         => __( 'Handle Metabox', 'cmb2' ),
		'object_types'  => array( 'product', ), // Post types
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$handle_size 		= 	array_filter( get_option('handle_size'), 'strlen' );
	$handle_style 		= 	array_filter( get_option('handle_style'), 'strlen' );  
	$cmb_demo->add_field( array(
		'name'             => __( 'Handle Size' , 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'handle_size_select',
		'type'             => 'multicheck',
		'options'          => $handle_size
	) );

	$cmb_demo->add_field( array(
		'name'             => __( 'Handle Style' , 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'handle_style_select',
		'type'             => 'multicheck',
		'options'          => $handle_style
	) );
}

add_action( 'cmb2_admin_init', 'towelbar_register_demo_metabox' );
/**
* Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
*/
function towelbar_register_demo_metabox() {
	$prefix = 'tinfini_';
	/**
	* Sample metabox to demonstrate each field type included
	*/
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'towelbarmetabox',
		'title'         => __( 'Combo Handle Towelbar Metabox', 'cmb2' ),
		'object_types'  => array( 'product', ), // Post types
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$combo_handle_size 		= 	array_filter( get_option('combo_handlet_size_pull'), 'strlen' );
	$towelbar_size 		= 	array_filter( get_option('towelbar_size'), 'strlen' );
	$towelbar_style 	= 	array_filter( get_option('towelbar_style'), 'strlen' );  
	$cmb_demo->add_field( array(
		'name'             => __( 'Combo Handle Towelbar Size' , 'cmb2' ),
		'desc'             => __( 'Handle Size', 'cmb2' ),
		'id'               => $prefix . 'combo_handle_size_select',
		'type'             => 'multicheck',
		'options'          => $combo_handle_size,
	) );
	$cmb_demo->add_field( array(
		'name'             => __( 'Combo Handle Towelbar Size' , 'cmb2' ),
		'desc'             => __( 'Towelbar Size', 'cmb2' ),
		'id'               => $prefix . 'towelbar_size_select',
		'type'             => 'multicheck',
		'options'          => $towelbar_size
	) );
	$cmb_demo->add_field( array(
		'name'             => __( 'Combo Handle Towelbar Style', 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'towelbar_style_select',
		'type'             => 'multicheck',
		'options'          => $towelbar_style
	) );
}

add_action( 'cmb2_admin_init', 'combotowelbar_register_demo_metabox' );
/**
* Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
*/
function combotowelbar_register_demo_metabox() {
	$prefix = 'tinfini_';
	/**
	* Sample metabox to demonstrate each field type included
	*/
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'combobarmetabox',
		'title'         => __( 'Towelbar Metabox', 'cmb2' ),
		'object_types'  => array( 'product', ), // Post types
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$towelbar_sides 	= 	array_filter( get_option('towelbar_sides'), 'strlen' ); 
	$towelbar_size 		= 	array_filter( get_option('towelbar_size'), 'strlen' );
	$towelbar_style 	= 	array_filter( get_option('towelbar_style'), 'strlen' );  
	$cmb_demo->add_field( array(
		'name' => __( 'Towelbar', 'cmb2' ),
		'id'   => $prefix . 'checkbox_knobcomboht',
		'type' => 'checkbox',
	) );
	$cmb_demo->add_field( array(
		'name'             => __( 'Towelbar Sides' , 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'combo_sides_select',
		'type'             => 'multicheck',
		'options'          => $towelbar_sides
	) );
	$cmb_demo->add_field( array(
		'name'             => __( 'Towelbar Size' , 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'combo_size_select',
		'type'             => 'multicheck',
		'options'          => $towelbar_size
	) );
	$cmb_demo->add_field( array(
		'name'             => __( 'Towelbar Style', 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'combo_style_select',
		'type'             => 'multicheck',
		'options'          => $towelbar_style
	) );	
}
add_action( 'cmb2_admin_init', 'other_register_demo_metabox' );

/**
* Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
*/
function other_register_demo_metabox() {
	$prefix = 'tinfini_';
	/**
	* Sample metabox to demonstrate each field type included
	*/
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'othermetabox',
		'title'         => __( 'Other Metabox', 'cmb2' ),
		'object_types'  => array( 'product', ), // Post types
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$hardware_finish 	= 	array_filter( get_option('hardware_finish'), 'strlen' );
	$hinge_style 		= 	array_filter( get_option('hinge_style'), 'strlen' ); 
	$install_kit 		= 	array_filter( get_option('install_kit'), 'strlen' );
	$cmb_demo->add_field( array(
		'name'             => __( 'Hardware Finish' , 'cmb2' ),
		'desc'             => __( 'Select Hardware Finish', 'cmb2' ),
		'id'               => $prefix . 'hardware_finish_select',
		'type'             => 'multicheck',
		'options'          => $hardware_finish
	) );
	$cmb_demo->add_field( array(
		'name'             => __( 'Hinge Style' , 'cmb2' ),
		'desc'             => __( 'Select Hinge Styles', 'cmb2' ),
		'id'               => $prefix . 'hinge_style_select',
		'type'             => 'multicheck',
		'options'          => $hinge_style
	) );
	$cmb_demo->add_field( array(
		'name'             => __( 'Installation Kit' , 'cmb2' ),
		'desc'             => __( 'Select Installation Kit', 'cmb2' ),
		'id'               => $prefix . 'install_kit_select',
		'type'             => 'multicheck',
		'options'          => $install_kit
	) );
}

/**
 * Hook in and add a metabox for store products
 */
add_action( 'cmb2_admin_init', 'store_product_metabox' );
function store_product_metabox() {
	$prefix = 'tinfini_';
	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_store = new_cmb2_box( array(
		'id'            => $prefix . 'block_storemetabox',
		'title'         => __( 'Store Product Options', 'cmb2' ),
		'object_types'  => array( 'product', ), // Post types
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$cmb_store->add_field( array(
		'name'             => __( 'Glass Thickness' , 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'gls_thckne_store',
		'type' 			   => 'checkbox',
	) );
	$cmb_store->add_field( array(
		'name'             => __( 'Hardware Finish' , 'cmb2' ),
		'desc'             => __( 'Select Hardware Finish', 'cmb2' ),
		'id'               => $prefix . 'hardware_finish_store',
		'type' 			   => 'checkbox',
	) );
	$cmb_store->add_field( array(
		'name'             => __( 'Hinge Style' , 'cmb2' ),
		'desc'             => __( 'Select Hinge Styles', 'cmb2' ),
		'id'               => $prefix . 'hinge_style_store',
		'type' 			   => 'checkbox',
	) );
	$cmb_store->add_field( array(
		'name'             => __( 'Door Angle' , 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'door_angle_store',
		'type' 			   => 'checkbox',
	) );
	$cmb_store->add_field( array(
		'name'             => __( 'Handle Size' , 'cmb2' ),
		'desc'             => __( 'field description', 'cmb2' ),
		'id'               => $prefix . 'handle_size_store',
		'type' 			   => 'checkbox',
	) );
	$cmb_store->add_field( array(
		'name'             => __( 'Combo Handle Size' , 'cmb2' ),
		'desc'             => __( 'field description', 'cmb2' ),
		'id'               => $prefix . 'combo_handle_size_store',
		'type' 			   => 'checkbox',
	) );
	$cmb_store->add_field( array(
		'name'             => __( 'Towelbar Size' , 'cmb2' ),
		'desc'             => __( 'field description', 'cmb2' ),
		'id'               => $prefix . 'towelbar_size_store',
		'type' 			   => 'checkbox',
	) );
}

/**
 * Hook in and add a metabox for Standard Layout products
 */
add_action( 'cmb2_admin_init', 'standard_layout_confi' );

function standard_layout_confi() {
	$prefix = 'tinfini_';

	/*
	** Sample metabox to demonstrate each field type included
	*/
	$cmb_standard = new_cmb2_box( array(
		'id'            => $prefix . 'standard_layout_metabox',
		'title'         => __( 'Standard Layout Configuration', 'cmb2' ),
		'object_types'  => array( 'product', ), // Post types
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
	) );
	$standard_door_width 	= 	array_filter( get_option('stand_width'), 'strlen' );
	$standard_door_height 	= 	array_filter( get_option('standard_door_height'), 'strlen' );
	foreach ($standard_door_width as $key => $value){
		$value = $value;
		break;
	}

	/*
	** Adding Custom Value In Array
	*/
	$newval_arr = array();
	foreach ($standard_door_height as $key => $value){
		$newval_arr[$value] =$value; 
	}
	$newval_arr['57 11/16-'] ='57 11/16-';
	$cmb_standard->add_field( array(
		'name'             => __( 'Standard Door Option' , 'cmb2' ),
		'desc'             => __( 'Show standard layout', 'cmb2' ),
		'id'               => $prefix . 'standard_door_opt',
		'type' 			   => 'checkbox',
	) );
	$cmb_standard->add_field( array(
		'name'             => __( 'Standard Door Width' , 'cmb2' ),
		'desc'             => __( $value, 'cmb2' ),
		'id'               => $prefix . 'standard_door_width',
		'type'             => 'checkbox',
	) );
	$cmb_standard->add_field( array(
		'name'             => __( 'Standard Door Height' , 'cmb2' ),
		'desc'             => __( 'field description (optional)', 'cmb2' ),
		'id'               => $prefix . 'standard_door_height',
		'type'             => 'multicheck',
		'options'          => $newval_arr
	) );
}
ob_end_flush();
?>