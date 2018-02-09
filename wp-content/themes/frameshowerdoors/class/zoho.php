<?php
if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME']))
{
	// tell people trying to access this file directly goodbye...
	exit('This file can not be accessed directly...');
}

class fsd_zoho {

	public function __construct() {
		//echo "You made it bruva";
		$this->username = 'angela@fsdae.com';
		$this->password = 'FShowerD9!';
		$this->token = '9a544e3852bbf1bff41bfff18b8cb53d';
		//$this->token = $this->generate_token();
		$this->garbage = ARRAY();
	}

	private function generate_token(){
		$username = $this->username;
		$password = $this->password;
		$param = "SCOPE=ZohoCRM/crmapi&EMAIL_ID=".$username."&PASSWORD=".$password;
		$ch = curl_init("https://accounts.zoho.com/apiauthtoken/nb/create");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
		$result = curl_exec($ch);
		/*This part of the code below will separate the Authtoken from the result.
		Remove this part if you just need only the result*/
		$anArray = explode("\n",$result);
		$authToken = explode("=",$anArray['2']);
		$cmp = strcmp($authToken['0'],"AUTHTOKEN");
		echo $anArray['2'].""; if ($cmp == 0)
		{
			//echo "Created Authtoken is : ".$authToken['1'];
			return $authToken['1'];
		}
		curl_close($ch);
	}

	public function get_records(){
		//header("Content-type: application/xml");
		$token=$this->token;
		//$url = "https://crm.zoho.com/crm/private/xml/Leads/getRecords";
		$url = "https://crm.zoho.com/crm/private/json/Leads/getRecords";
		$param= "authtoken=".$token."&scope=crmapi";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
		$result = curl_exec($ch);
		curl_close($ch);
		$this->iterateRecords($result);
		return $result;
	}

	public function get_record_detail($id){
		//header("Content-type: application/xml");
		$token=$this->token;
		//$url = "https://crm.zoho.com/crm/private/xml/Leads/getRecords";
		$url = "https://crm.zoho.com/crm/private/json/Leads/getRecordById";
		$param= "authtoken=".$token."&scope=crmapi&id=".$id;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
		$result = curl_exec($ch);
		curl_close($ch);
		$info = $this->iterateRecord($result);
		return $info;
	}

	private function iterateRecord($result){
		$ret = ARRAY();
		$obj = json_decode($result, true);
		//print_r($obj);
		$record = $obj['response']['result']['Leads']['row']['FL'];
		if (is_array($record)) {
			foreach ( $record AS $R ) {
				$key   = $R['val'];
				$value = $R['content'];
				switch ( $key ) {
					case 'doorbuilder':
						$ret[ $key ] = $value;
						break;
					case 'First Name':
						$ret[ $key ] = $value;
						break;
					case 'Last Name':
						$ret[ $key ] = $value;
						break;
					case 'Email':
						$ret[ $key ] = $value;
						break;
					default:
						$this->garbage[ $key ] = $value;
				}
			}
		}
		return $ret;
	}

	private function iterateRecords($result){
		$obj = json_decode($result, true);
		print_r($obj);
	}

	public function searchJob($criteria){
		//https://crm.zoho.com/crm/private/json/Leads/searchRecords?authtoken=Auth Token&scope=crmapi&criteria=(((Last Name:Steve)AND(Company:Zillum))OR(Lead Status:Contacted))
		$token=$this->token;
		$url = "https://crm.zoho.com/crm/private/json/Leads/searchRecords";
		$param= "authtoken=".$token."&scope=crmapi&criteria=".$criteria;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
		$result = curl_exec($ch);
		//echo $result;
		curl_close($ch);
		$info = $this->iterateRecord($result);
		return $info;
	}

	public function getGarbage(){
		return $this->garbage;
	}

	public function create_xml($posts){
		$response='';
		$response.='<Leads>';
		$response.='<row no="1">';
		foreach($posts AS $key=>$value){
			//echo $key."=".$value."<br>";
			$response.='<FL val="'.$key.'">'.$value.'</FL>';
		}
		$response.='</row>';
		$response.='</Leads>';
		/*
		 * EXAMPLE XML
		 * <Leads>
			<row no="1">
				<FL val="Lead Source">Web Download</FL>
				<FL val="Company">Your Company</FL>
				<FL val="First Name">Hannah</FL>
				<FL val="Last Name">Smith</FL>
				<FL val="Email">testing@testing.com</FL>
				<FL val="Title">Manager</FL>
				<FL val="Phone">1234567890</FL>
				<FL val="Home Phone">0987654321</FL>
				<FL val="Other Phone">1212211212</FL>
				<FL val="Fax">02927272626</FL>
				<FL val="Mobile">292827622</FL>
			</row>
			</Leads>
		 */

		return $response;
	}

	public function insertLead($xml){
		//echo "Insert XML: ".$xml."<hr>";
		$result='';
		$token=$this->token;
		$url = "https://crm.zoho.com/crm/private/xml/Leads/insertRecords";
		$param= "authtoken=".$token."&scope=crmapi&xmlData=".$xml;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
		$result = curl_exec($ch);
		//echo "<hr>RESULT: ".$result."<hr>";
		curl_close($ch);

		return $result;
	}

	public function getLeadID($xml){
		$id = 0;
		//$xml = '<?xml version="1.0" encoding="UTF-8" ? ><response uri="/crm/private/xml/Leads/insertRecords"><result><message>Record(s) added successfully</message><recorddetail><FL val="Id">1429722000022570005</FL><FL val="Created Time">2017-08-25 09:29:12</FL><FL val="Modified Time">2017-08-25 09:29:12</FL><FL val="Created By"><![CDATA[Angela Borden]]></FL><FL val="Modified By"><![CDATA[Angela Borden]]></FL></recorddetail></result></response>';

		//$xml=simplexml_load_file("http://frameless.local/test.xml") or die("Error: Cannot create object");
		$response = simplexml_load_string($xml);

		if ($response === false) {
			echo "Failed loading XML: ";
			foreach(libxml_get_errors() as $error) {
				echo "<br>", $error->message;
			}
		} else {
			//print_r($response->result->recorddetail);
			//echo "<hr><hr>".$response->result->recorddetail->FL->count();
			//echo "<hr>";
			//$id = (string) $response->result->recorddetail->FL[0];
			$count = $response->result->recorddetail->FL->count();
			for ($x = 0; $x < $count; $x++) {
				$attr = $response->result->recorddetail->FL[$x]->attributes();
				if(strtolower($attr) == "id"){
					$id = (string) $response->result->recorddetail->FL[$x];
					break;
				}
				//echo "...".$attr."...".$id."<br>";
			}
		}
		//echo "ID: ".$id."<hr>";
		return $id;
	}

	public function get_admin_id($email){
		//header("Content-type: application/xml");
		$token=$this->token;
		$type = "AllUsers";
		//$url = "https://crm.zoho.com/crm/private/xml/Leads/getRecords";
		$url = "https://crm.zoho.com/crm/private/json/Users/getUsers";
		$param= "authtoken=".$token."&scope=crmapi&newFormat=1&type=".$type;
		//echo $url."/?".$param;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
		$result = curl_exec($ch);
		//echo $result.'<hr>';
		curl_close($ch);

		$id = $this->extract_id($result,$email);
		return $id;
	}

	public function extract_id($result, $email){
		$obj = json_decode($result, true);
		$result = 0;
		//print_r($obj);
		$record = $obj['users']['user'];

		if (is_array($record)) {
			foreach ( $record AS $key => $value ) {
				$userid = $value['id'];
				$user_email = $value['email'];
				//echo $userid."=".$user_email." -- ".$email."<br>";
				if(trim($email) == trim($user_email)){
					$result = $userid;
					break;
				}
			}
		}

		if($result == 0){
			$result = 1429722000026211010;
		}

		return $result;
	}
}