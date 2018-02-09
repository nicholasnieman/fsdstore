<?php
   /*
   Plugin Name: Store Location
   Plugin URI: http://my-awesomeness-emporium.com
   Description: a plugin to create awesomeness and spread joy
   Version: 1.2
   Author: Mr. Awesome
   Author URI: http://mrtotallyawesome.com
   License: GPL2
   */
?>
<?php
add_action('admin_menu', 'my_cool_plugin_create_menu');

function my_cool_plugin_create_menu() {
	add_menu_page('Store Location Plugin Setting', 'Store Location', 'administrator', __FILE__, 'storelocation_settings_page' , plugins_url('assets/images/icon-front.png', __FILE__),26 );
	add_action( 'admin_init', 'register_storelocation_plugin_settings' );
}

function fwds_scripts() {
    global $post;
    wp_enqueue_style( 'custom_css', plugins_url('assets/css/custom.css', __FILE__));
}
add_action('admin_head', 'fwds_scripts');

function my_enqueue($hook) {
    //wp_enqueue_script( 'functions', plugins_url('assets/js/functions.js', __FILE__ ));
    wp_enqueue_script( 'functions_js', plugin_dir_url(__FILE__).'assets/js/functions.js', array( 'jquery' ),'', true );
    wp_localize_script( 'functions_js', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );	
}
add_action( 'admin_enqueue_scripts', 'my_enqueue' );

function storelocation_settings_page() {

    if( isset($_POST['submit_location']) && $_SERVER["REQUEST_METHOD"] == "POST" ){
		
		$location_num	 	= 	$_POST['location_num'];
		$location_name	 	= 	$_POST['location_name'];
		$location_phone		= 	$_POST['location_phone'];	
		$location_arr = $temp_arr = array();

		$temp_arr['location_name'] 		= 	$location_name;
		if($location_phone){
			$temp_arr['location_phone'] = 	$location_phone;	
		}else{
			$temp_arr['location_phone'] = 	'-';
		}
		
		if($temp_arr){
			$check_location = unserialize(get_option('location_options'));

			if($check_location){
				$check_location[$location_num] = $temp_arr;
				update_option('location_options', serialize($check_location) );
			}else{
				$location_arr[$location_num] 	= 	$temp_arr;
				update_option('location_options', serialize($location_arr) );
			}
		}

	}
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );


    $location_array = unserialize(get_option('location_options'));
    
    if($location_array){
    	$location_html = '';
    	$location_html = '<div class="save-location_option">
    		<h3>Store Locations List</h3>
    		<table>
	    		<thead>
	    			<th>Location Number</th>
	    			<th>Location Name</th>
	    			<th>Contact Number</th>
	    		</thead>
	    		<tbody>';
	    		
	    		if(count($location_array) % 2 == 0){
	    			$division_num = count($location_array)/2;	
	    		}else{
	    			$division_num = 20;
	    		}
	    		
		  //  $location_html .= '<form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?page=store-location%2Findex.php">';

			    foreach ($location_array as $key => $value) {
			    	
			    	//$key = $key + 1;
			    	$location_html .= '<tr><td>'.$key.'</td>';

						foreach ($value as $val_key => $val_value) {

							$location_html .= '<td>'.$val_value.'</td>';

						}
						
			    	$location_html .= '</tr>';

			    }
			//$location_html .= '</form>';

	    $location_html .= '</tbody></table></div>';
	}
   $form_html = '<div class="wrap store-loctn-sect">';
   
   $form_html .= '<div class="update-stores-lct"><h3>Add/Update Store Location</h3>';

	$form_html .= '<form method="post" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?page=store-location%2Findex.php">';

		$form_html .= '
		<table>
			<tr>
				<td><input type="text" name="location_num" id="location_num" class="location-sect" placeholder="Location Number should be unique" value="" required/></td>

				<td><input type="text" name="location_name" class="location-sect" placeholder="Location Name" value="" required/></td>
				<td><input type="text" name="location_phone" class="location-sect" placeholder="Contact Number"/></td>

				
				<td><input type="submit" name="submit_location" id="submit_location" value="Save Location" class="button-primary"></td>
			</tr>
		</table>';

	$form_html .= '</form></div>';
	
	$form_html .= '<div class="location-list">'.$location_html.'</div>';

	$form_html .= '</div>';

	echo $form_html;
}


/** * Ajax action for Booking Appointment */
function get_locations_list(){
	global $post;
	if( isset($_REQUEST['locatn_num']) )
	{
		$stl = $_REQUEST['locatn_num'];

		$location_array = unserialize(get_option('location_options'));

		if($location_array[$stl]){

			echo $returnarr = json_encode($location_array[$stl]);

		}

	}
  	exit();
}
add_action('wp_ajax_get_locations_list', 'get_locations_list');
add_action('wp_ajax_nopriv_get_locations_list', 'get_locations_list');
?>