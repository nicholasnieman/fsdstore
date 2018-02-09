<?php
/*
* Plugin Name: Geo Redirect
* Description: Redirect your website by geo location
* Version: 1.0
* Author: Geolify
* Author URI: https://geolify.com
*/



//ADMIN MENU---------------------------------------------------------------------


add_action( 'admin_menu', 'geolify_wp_georedirect_add_admin_menu' );
add_action( 'admin_init', 'geolify_wp_georedirect_settings_init' );


function geolify_wp_georedirect_add_admin_menu(  ) { 

	add_menu_page( 'Geo Redirect - Geolify', 'Geo Redirect', 'manage_options', 'geolify_wp_georedirect', 'geolify_wp_georedirect_options_page' );

}


function geolify_wp_georedirect_settings_init(  ) { 

	register_setting( 'geolify_wp_georedirect_pluginPage', 'geolify_wp_georedirect_settings' );

	add_settings_section(
		'geolify_wp_georedirect_pluginPage_section', 
		__( '', 'geolify_wp_georedirect' ), 
		'geolify_wp_georedirect_settings_section_callback', 
		'geolify_wp_georedirect_pluginPage'
	);

	

       add_settings_field( 
		'geolify_wp_georedirect_ids', 
		__( 'Geo Redirect IDs (comma separated)', 'geolify_wp_georedirect' ), 
		'geolify_wp_georedirect_ids_render', 
		'geolify_wp_georedirect_pluginPage', 
		'geolify_wp_georedirect_pluginPage_section' 
	);


     add_settings_field( 
		'geolify_wp_georedirectv2_ids', 
		__( 'Geo Redirect V2 IDs (comma separated)', 'geolify_wp_georedirect' ), 
		'geolify_wp_georedirectv2_ids_render', 
		'geolify_wp_georedirect_pluginPage', 
		'geolify_wp_georedirect_pluginPage_section' 
	);

}




function geolify_wp_georedirect_ids_render(  ) { 

	$options = get_option( 'geolify_wp_georedirect_settings' );
	?>
	<input type='text' name='geolify_wp_georedirect_settings[geolify_wp_georedirect_ids]' value='<?php echo $options['geolify_wp_georedirect_ids']; ?>'>
	<?php

}


function geolify_wp_georedirectv2_ids_render(  ) { 

	$options = get_option( 'geolify_wp_georedirect_settings' );
	?>
	<input type='text' name='geolify_wp_georedirect_settings[geolify_wp_georedirectv2_ids]' value='<?php echo $options['geolify_wp_georedirectv2_ids']; ?>'>
	<?php

}





function geolify_wp_georedirect_settings_section_callback(  ) { 

	echo __( '', 'geolify_wp_georedirect' );

}


function geolify_wp_georedirect_options_page(  ) { 

	?>
	<form action='options.php' method='post'>
		
<div id="post-body" class="metabox-holder columns-2">
<div id="post-body-content">

<h2>Geo Redirect - by Geolify</h2>



<div class="postbox" style="width:70%; padding:30px;">
<h2>Welcome</h2>
<p>Geolify's Geo Redirect is a FREE plugin that allows you to easily redirect your website based on visitor geolocation (country, state, city, IP address, latitude-longitude-radius).</p>
</div>

<div class="postbox" style="width:70%; padding:30px;">
<h2>Getting Started</h2>


<p>1. Create a Geolify account at <a href="https://geolify.com" target="_blank">geolify.com</a> </p>

<p style="padding-top:20px;">2. Log into your Geolify dasboard at <a href="https://geolify.com/dash-board/" target="_blank">geolify.com/dash-board/</a> </p>

<p style="padding-top:20px;">3. Create a new Geo Redirect or Geo Redirect V2 (powerful features):</p>
 <p>-<a href="https://geolify.com/dash-list-geo-redirect/" target="_blank">geolify.com/dash-list-geo-redirect/</a> </p>
<p>-<a href="https://geolify.com/dash-list-geo-redirect-V2/" target="_blank">geolify.com/dash-list-geo-redirect-V2/</a></p>

<p style="padding-top:20px;">4. Setup your Geo Redirects and target geolocations</p>

<p style="padding-top:20px;">5. Copy the Geo Redirect Wordpress ID provided and paste it into appopriate the text box below</p>

<p style="padding-top:20px;">6. Create as many Geo Redirects as you like and enter (comma separate) their IDs below</p>


<p style="padding-top:20px;">Read more about Geo Redirect vs Geo Redirect V2 below:</p>

<p><a href="https://geolify.com/docs/geo-redirect/" target="_blank">Geo Redirect Docs</a></p>
<p><a href="https://geolify.com/docs/geo-redirect-V2/" target="_blank">Geo Redirect V2 Docs</a></p>

</div>



<div class="postbox" style="width:70%; padding:30px;">
<h2>Settings</h2>
<?php
settings_fields( 'geolify_wp_georedirect_pluginPage' );
do_settings_sections( 'geolify_wp_georedirect_pluginPage' );
submit_button();
?>
</div>

</form>

</div>
</div>

<?php

}







//GEO REDIRECT-----------------------------------------------------------



//ADD GEO REDIRECT WP HEAD



add_action( 'wp_enqueue_scripts', 'geolify_wp_georedirect');

function geolify_wp_georedirect()
{


$geolify_georedirect_ids_database = get_option('geolify_wp_georedirect_settings');

$geolify_georedirect_ids_database_string = preg_replace('/\s+/', '', $geolify_georedirect_ids_database['geolify_wp_georedirect_ids']);

$geolify_georedirect_ids_database_array = explode(',', $geolify_georedirect_ids_database_string);

$geolify_georedirect_ids_database_array = array_filter($geolify_georedirect_ids_database_array);


if (!empty($geolify_georedirect_ids_database_array)){

for ($i = 0; $i < count($geolify_georedirect_ids_database_array); ++$i) {
        

wp_enqueue_script( 'geolify-georedirect-'.$geolify_georedirect_ids_database_array[$i], '//www.geolify.com/georedirect.php?id='.$geolify_georedirect_ids_database_array[$i],'' ,'' ,false);

         
}

}

}












add_action( 'wp_enqueue_scripts', 'geolify_wp_georedirectv2');

function geolify_wp_georedirectv2()
{


$geolify_georedirectv2_ids_database = get_option('geolify_wp_georedirect_settings');

$geolify_georedirectv2_ids_database_string = preg_replace('/\s+/', '', $geolify_georedirectv2_ids_database['geolify_wp_georedirectv2_ids']);

$geolify_georedirectv2_ids_database_array = explode(',', $geolify_georedirectv2_ids_database_string);

$geolify_georedirectv2_ids_database_array = array_filter($geolify_georedirectv2_ids_database_array);


if (!empty($geolify_georedirectv2_ids_database_array)){

for ($i = 0; $i < count($geolify_georedirectv2_ids_database_array); ++$i) {
        

wp_enqueue_script( 'geolify-georedirectv2-'.$geolify_georedirectv2_ids_database_array[$i], '//www.geolify.com/georedirectv2.php?refurl='.$_SERVER['HTTP_REFERER'].'&id='.$geolify_georedirectv2_ids_database_array[$i],'' ,'' ,false);

         
}

}

}






?>