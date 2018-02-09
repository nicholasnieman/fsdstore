<?php
/**
 * Created by PhpStorm.
 * User: josephfitzgerald
 * Date: 8/22/17
 * Time: 5:15 PM
 */

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
		//echo $result.'<hr>';
		curl_close($ch);
		$info = $this->iterateRecord($result,$id);
		return $info;
	}

	private function iterateRecord($result, $id="5568"){
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

		if(count($ret)<1){
			//$ret['doorbuilder'] = "No Door Info Is Available.<br>Door number ".$id;
			$ret['doorbuilder'] = 'Measurement A-100 
 Measurement B-100 
 Measurement C-100 
 Measurement D-100 
 Measurement E-100 
 Glass (SQFT)- 208.3 
 Stayclean Option- No 
 Glass Thickness-3/8 in. 
 Glass Type-Clear Low Iron 
 Hardware Finish-Brushed Nickel 
 Style-Round 
 Pull-Knob 
 Knob Style-Contemporary 
 Towel Bar-Yes 
 Towel Bar Size-12 in. 
 Sides-Back-to-Back';
			$ret['First Name'] = "John";
			$ret['Last Name'] = "Doe";
			$ret['Email'] = "johndoe@email.com";
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
}