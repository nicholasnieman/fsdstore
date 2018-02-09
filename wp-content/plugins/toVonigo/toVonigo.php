<?php
/*
Plugin Name: To Vonigo
Plugin URI: http://www.framelessshowerdoors.com
Description: This plugin inserts a job for scheduling into Vonego.
Version: 1.0
Author: Joe Fitzgerald, Dane Grant
Author URI: http://www.framelessshowerdoors.com
License: GPL2
*/

// Version
define('TOVONIGO', '1.0');
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

define('TOVONIGO_URL', plugin_dir_url(__FILE__));
define('TOVONIGO_PATH', plugin_dir_path(__FILE__));

// this function loads our js scripts (if needed)
function tovonigo_scripts() {
    $ver = 1;
    //wp_enqueue_script( 'tovonigo_js', TOVONIGO_URL . 'js/tovonigo.js', array(), $ver, false );
}
add_action( 'wp_enqueue_scripts', 'tovonigo_scripts' );

// This is the short code to be inserted into our capture page
add_shortcode('tovonigo', 'tovonigo');
function tovonigo($args = array()) {
	$zohoID = strip_tags(addslashes($_GET['id']));
	if(strlen($zohoID) < 1){
		echo "<h1>Unable to Insert Lead Into Vonigo</h1>";
		echo "<p>We were unable to insert this lead because a Zoho record was not found.</p>";
		echo "<p>Please make sure this lead is associated with a door build, then try again.</p>";
		exit;
	}
	ob_start();
	require_once('class/fsd_zoho.php');
	$zoho = new fsd_zoho();
	$record = $zoho->get_record_detail($zohoID);
	$garbage = $zoho->getGarbage();


	$vonigo = ARRAY();
	$vonigoContact = ARRAY();
	$vonigoClient = ARRAY();

	foreach($record as $key=>$value){
		//echo $key." = ".$value."<br>";
		$vonigo[$key] = $value;
		$vonigoContact[$key] = $value;
	}
	foreach($garbage as $key=>$value){
		//echo $key." = ".$value."<br>";
		$vonigo[$key] = $value;
		$vonigoContact[$key] = $value;
	}

	$vonigo['Zoho ID'] = $zohoID;
	$vonigo['Type'] = "59";
	$vonigo['Status'] = "61";
	$name = $record['Last Name'].", ".$record['First Name'];
	$vonigo['Name'] = $name;
	$vonigo['Door Calculator Link'] = "http://www.fsdresourcecenter.com/?job_id=".$garbage['Door Calculator ID'];
	$vonigo['Stage'] = "64"; // 64 = Lead, 65 = Account
	$vonigo['Marketing Campaign'] = "10158"; // 10158 = Internet, 10317 = Floor & Decor, 10318 = Door Builder
	$vonigo['builderNotes'] = $vonigo['doortype'] . "\r\n" . $record['doorbuilder'];
	$vonigo['Contact Number'] = $garbage['Phone'];
	$vonigo['Contact Email'] = $record['Email'];
	$vonigo['Main Address'] = $garbage['Address'] . ", " . $garbage['City and State'] . " " . $garbage['Zip Code ?'];
	$vonigo['Lead Source'] = $garbage['Lead Source'];

	$vonigoClient[96] = $garbage['Phone']; //Phone 2
	$vonigoClient[97] = $record['Email']; //Email
	$vonigoClient[125] = '71'; //Status
	$vonigoClient[127] = $record['First Name']; //First Name
	$vonigoClient[128] = $record['Last Name']; //Last Name
	$vonigoClient[134] = '75'; //Salutation
	$vonigoClient[211] = ''; //Job Title
	$vonigoClient[1088] = $garbage['Phone']; //Phone
	$vonigoClient[1090] = $record['Email']; //Notes
	$vonigoClient[9795] = $name; //Account Name

	// separate city and state
	$s = explode(",", $garbage['City and State']);
	$city = trim($s[0]);
	$state = trim($s[1]);

	$vonigoLocation = ARRAY();
	$vonigoLocation[773] = $garbage['Address']; // Street Address
	$vonigoLocation[774] = ''; // Zip+4
	$vonigoLocation[775] = $garbage['Zip Code ?']; // Zip Code
	$vonigoLocation[776] = $city; // City
	$vonigoLocation[778] = ''; // Location Province
	$vonigoLocation[779] = '9906'; // Country
	$vonigoLocation[9311] = $state; // State
	$vonigoLocation[9312] = ''; // Province
	$vonigoLocation[9713] = ''; // Directions
	$vonigoLocation[9714] = ''; // Location Title

	//setting a default door calculator link
	if(strlen($garbage['Door Calculator ID']) <= 0){
		$vonigo['Door Calculator Link'] = "http://www.fsdresourcecenter.com/";
$garbage['Door Calculator ID'] = "000000";	
}

	if(strlen($garbage['Door Calculator ID']) > 0){
		require_once('class/tovonigo_class.php');
		$tovonigo = new tovonigo_class();

		//$output = $tovonigo->getInfo($vonigo);
		//$insertAccount = $tovonigo->insertClient($vonigo);

		$insertLead = $tovonigo->insertLeadItem($vonigo);
		$vonigoClient['clientID'] = $insertLead;
		$vonigoLocation[9270] = $insertLead; // Client
		$insertClient = $tovonigo->insertContact($insertLead,$vonigoClient);
		if(strlen($garbage['Zip Code ?']) > 1){
			$location = $tovonigo->insertLocation($insertLead,$vonigoLocation);
		}

		echo "<h1>".$record['First Name']." ".$record['Last Name']."<h1>";
		echo "<p>Has been added to Vonigo. <a href='https://fsdae.vonigo.com'>Log into Vonigo</a></p>";
		echo $insertLead;

		header("Location: https://fsdae.vonigo.com");
	}else{
		echo "<h1>Unable to Insert Lead Into Vonigo</h1>";
		echo "<p>We were unable to insert this lead because a, 'Door Calculator ID', was not found.</p>";
		echo "<p>Please make sure this lead is associated with a door build, then try again.</p>";
	}

	return ob_get_clean();
}

// ================================================================================
// PLUGIN HOOKS ()
// ================================================================================
register_activation_hook(__FILE__, 'tovonigo_install_hook');
register_uninstall_hook(__FILE__, 'tovonigo_uninstall_hook');
register_deactivation_hook(__FILE__, 'tovonigo_uninstall_hook');

function tovonigo_install_hook()
{

}

function tovonigo_uninstall_hook()
{

}
