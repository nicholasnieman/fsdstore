<?php
if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME']))
{
    // tell people trying to access this file directly goodbye...
    exit('This file can not be accessed directly...');
}

class frameless{
    public function __construct()
    {
        //echo "You made it bruva";
    }

	public function get_client_ip() {
		if (getenv('HTTP_CLIENT_IP')){
			$ipaddress = getenv('HTTP_CLIENT_IP');
		}
		else if(getenv('HTTP_X_FORWARDED_FOR')){
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		}
		else if(getenv('HTTP_X_FORWARDED')) {
			$ipaddress = getenv('HTTP_X_FORWARDED');
		}
		else if(getenv('HTTP_FORWARDED_FOR')) {
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		}
		else if(getenv('HTTP_FORWARDED')) {
			$ipaddress = getenv('HTTP_FORWARDED');
		}
		else if(getenv('REMOTE_ADDR')) {
			$ipaddress = getenv('REMOTE_ADDR');
		}
		else {
			$ipaddress = '63.139.95.130';
		}
		if($ipaddress == '127.0.0.1'){$ipaddress = '63.139.95.130';}
		return $ipaddress;
	}

	public function insert_click(){
		if(isset($_SESSION['franchisee'])){
			$result="not";
		}else{
			$result="run";
			$_SESSION['franchisee'] = "not";
			$track_click = $this->track_click();
		}

		return $result;
	}

	private function track_click(){
    	$ip = $this->get_client_ip();
		GLOBAL $wpdb;
		$wpdb->insert(
			'fsdwp_franchise_tracking',
			array(
				'ip_address' => $ip,
			),
			array(
				'%s',
			)
		);
	}

	public function number_of_clicks(){
		GLOBAL $wpdb;

		$sql = "SELECT count(DISTINCT ip_address) AS c FROM fsdwp_franchise_tracking";
		$mydata = $wpdb->get_row($sql, ARRAY_A);

		return $mydata['c'];
	}
}
