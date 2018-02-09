<?php
/*
Plugin Name: LH Add Media from URL
Plugin URI: https://lhero.org/plugins/lh-add-media-from-url/
Author: Peter Shaw
Author URI: https://shawfactor.com
Version: 1.06
Description: This plugin allows you to fetch the remote file and save to your local WordPress, via wp-admin or bookmarklet.
License:
Released under the GPL license
http://www.gnu.org/copyleft/gpl.html

Copyright 2016  Peter Shaw  (email : pete@localhero.biz)


This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published bythe Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class LH_add_media_from_url_plugin {

private function reconstruct_url($url){    
    $url_parts = parse_url($url);
    $constructed_url = $url_parts['scheme'] . '://' . $url_parts['hostname'] . $url_parts['path'];

    return $constructed_url;
}


private function return_bookmarklet_string(){

$string = "javascript: (function() { var jsScript = document.createElement('script'); var jsScript = document.createElement('script'); jsScript.setAttribute('src', '".plugins_url( 'bookmarklet.php', __FILE__ )."'); document.getElementsByTagName('head')[0].appendChild(jsScript); })();";

$string = "javascript: (function() { window.location.href='".admin_url( 'upload.php?page=lh-add-media-from-url.php')."&lh_add_media_from_url-file_url=' + encodeURIComponent(location.href);})();";

return $string;

}

private function handle_upload($upload_urll){

	if (current_user_can('upload_files')){

		$upload_url = esc_url($upload_urll);

		// build up array like PHP file upload
		$file = array();
		$file['name'] = time().basename($this->reconstruct_url($upload_url)).'.png';
		$file['tmp_name'] = download_url($upload_url);


		if (is_wp_error($file['tmp_name'])) {
			@unlink($file['tmp_name']);
			return new WP_Error('lh_add_media_from_url', 'Could not download file from remote source');
		}

		if (!is_wp_error($file['tmp_name'])) {

			$attachmentId = media_handle_sideload($file, "0");


			// create the thumbnails
			$attach_data = wp_generate_attachment_metadata( $attachmentId,  get_attached_file($attachmentId));

			wp_update_attachment_metadata( $attachmentId,  $attach_data );

			return $attachmentId;

		}

	}

}


function add_media_from_url() {

global $pagenow;

//Check to make sure we're on the right page and performing the right action

if( 'upload.php' != $pagenow ){
	
	return false;

} elseif ( empty( $_POST[ 'lh_add_media_from_url-file_url' ] ) ){

 return false;
		
} else {
	$filee_path = plugins_url( 'clamp.csv', __FILE__ );
	$filee = fopen($filee_path, 'r');
	while( !feof($filee) ){		
		$line_row = fgetcsv($filee);
		
		$upload_urll = $line_row['1'];
		$return = $this->handle_upload($upload_urll);
		$_product = $this->get_product_by_sku($line_row['0']);
		if ( is_wp_error( $return ) ) {
			$GLOBALS['lh_add_media_from_url-form-result'] = get_the_title($_product->id.'#'.$line_row['0']);
		}else{
			//echo get_the_title($_product->id).'#'.$return.'#'.$line_row['0'];
			update_post_meta($_product->id, '_thumbnail_id', $return);
		}
	}

}
	

}

function plugin_menu() {

add_media_page('LH Add Media from URL', 'Add from URL', 'read', 'lh-add-media-from-url.php', array($this,"plugin_options"));


}

function get_product_by_sku( $sku ) {

    global $wpdb;

    $product_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key='_sku' AND meta_value='%s' LIMIT 1", $sku ) );

    if ( $product_id ) return new WC_Product( $product_id );

    return null;
}

function plugin_options() {

if (!current_user_can('upload_files')){

wp_die( __('You do not have sufficient permissions to access this page.') );

}

$lh_add_media_from_url_hidden_field_name = 'lh_add_media_from_url_submit_hidden';

echo "<h1>" . __( 'Add Media from URL', 'lh-add-media-from-url-identifier' ) . "</h1>";


if ($GLOBALS['lh_add_media_from_url-form-result']){


if ( is_wp_error( $GLOBALS['lh_add_media_from_url-form-result'] ) ) {

        foreach ( $GLOBALS['lh_add_media_from_url-form-result']->get_error_messages() as $error ) {

            echo '<strong>ERROR</strong>: ';
            echo $error . '<br/>';

}

} 

}

if ($_POST[ 'lh_add_media_from_url-file_url' ]){

$value = $_POST['lh_add_media_from_url-file_url'];

} elseif ($_GET['lh_add_media_from_url-file_url']){

$value = $_GET['lh_add_media_from_url-file_url'];


}

?>

<form method="post">
<label for="lh_add_media_from_url-file_url">URL: </label><input type="url" name="lh_add_media_from_url-file_url" id="lh_add_media_from_url-file_url" value="<?php echo $value; ?>" size="50" />
<input type="submit" value="Submit" /> 
<input type="hidden" value="<?php echo wp_create_nonce("lh_add_media_from_url-file_url"); ?>" name="lh_add_media_from_url-nonce" id="lh_add_media_from_url-nonce" />
</form>

<?php if (!$value){  ?>

<h4>Bookmarklet</h4>
<p>Drag the bookmarklet below to your bookmarks bar. Then, when you find a file online you want to upload, simply &#8220;Upload&#8221; it.</p>

<a title="Bookmark this link" href="<?php  echo $this->return_bookmarklet_string(); ?>">Upload URL to <?php echo bloginfo("name"); ?></a>

<br/>or edit your bookmarsk and paste the below code<br/>

<?php  echo $this->return_bookmarklet_string(); ?>


			


<?php

}

}




function __construct() {

add_action('admin_menu', array($this,"plugin_menu"));

add_action( 'admin_init', array($this,"add_media_from_url"));


}

}




$lh_add_media_from_url = new LH_add_media_from_url_plugin();





?>