<?php
class tovonigo_class{
	function __construct()
	{
		//echo "<h1>Welcome to the ToVonigo API</h1><hr>";
		/*
		 * LOG INTO VONIGO AND GET A SECURITY TOKEN
		 * APIaccess
		 */
		$company = "fsdae";
		$userName = "APIaccess";
		$password = md5("Frameless2017!");//password must be encrypted
		$ch = curl_init("https://fsdae.vonigo.com/api/v1/security/login/?appVersion=1&company=".$company."&password=".$password."&userName=".$userName);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$r = curl_exec($ch);
		curl_close($ch);
		$obj = json_decode($r, true);
		// The Security Token Returned By Vonigo
		$this->VonigoSecurityToken = $obj['securityToken'];
		echo "Security Token: ".$obj['securityToken']."<br>";

		/* Iterate through the values returned by the login service
		$this->iterateResults($obj);
		*/

	}

	public function getInfo($post){
		$result = '';

		//echo "Job details sent from ZoHo:<br>";
		foreach($post AS $key=>$value){
			echo $key . " = " . $value . "<br>";
		}
		//echo "<hr>";

		echo "<hr>Franchises<br>";
		$info = $this->getFranchises();
		foreach($info AS $key=>$value){
			echo "ID: " . $key . " | Name: " . $value . "<br>";
		}
		echo "<hr>";

		//$createClient = $this->insertClient($post);
		//echo "<hr>Create Client:<br>".$createClient."<hr>";

		//$createLead = $this->insertLead($post);
		//echo "<hr>Create Lead:<br>".$createLead."<hr>";
		//$obj = json_decode($createLead, true);
		//$this->iterateResults($obj);
		//$result = $this->getObjectID($obj);

		//$clients = $this->listClients();
		//echo "<hr>Clients:<br>".$clients."<hr>";
		//echo "<b>Clients:</b><br>";
		//$obj = json_decode($clients, true);
		//$this->iterateResults($obj);

		//$leads = $this->listLeads();
		//echo "<hr>Leads:<br>".$leads."<hr>";
		//echo "<b>Leads</b><br>";
		//$obj = json_decode($leads, true);
		//$this->iterateResults($obj);

		$contacts = $this->listContacts();
		//echo "<hr>Contacts:<br>".$contacts."<hr>";
		echo "<b>Contacts:</b><br>";
		$obj = json_decode($contacts, true);
		$this->iterateResults($obj);

		//$assets = $this->listAssets();
		//echo "<hr>Assets:<br>".$assets."<hr>";

		//$jobs = $this->listJobs();
		//echo "<hr>Jobs:<br>".$jobs."<hr>";

		//$fields = $this->getFieldData();
		//echo "<hr>Field Data:<br>".$fields."<hr>";
		//echo "<b>Field Data:</b><br>";
		//$obj = json_decode($fields, true);
		//$this->iterateFields($obj);

		//$systemObjects = $this->getSystemObjects();
		//echo "<b>OBJECTS</b><br>";
		//echo "<hr>".$systemObjects."<hr>";
		//$obj = json_decode($systemObjects, true);
		//$this->iterateFields($obj);
		return $result;
	}

	public function insertLeadItem($post){
		$result = '';

		//echo "Job details sent from ZoHo:<br>";
		//foreach($post AS $key=>$value){
			//echo $key . " = " . $value . "<br>";
		//}

		$createLead = $this->insertLead($post);
		//echo "<hr>Create Lead:<br>".$createLead."<hr>";
		$obj = json_decode($createLead, true);
		//$this->iterateResults($obj);
		$result = $this->getObjectID($obj);



		return $result;
	}

	public function getFranchises(){
		$result = ARRAY();
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/security/franchises/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars["pageNo"] = 1;
		$vonigoAPIvars["pageSize"] = 100;

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);
		$obj = json_decode($curl, true);

		foreach($obj AS $key=>$value) {
			if($key == "Franchises"){
				foreach($value AS $name=>$val){
					$x=0;
					foreach($val as $k=>$n){
						if($x == 0){
							$id = $n;
						}else{
							$name = $n;
						}
						$x++;
					}
					$result[$id] = $name;
				}
			}
		}

		return $result;
	}

	private function iterateResults($obj){
		$x = 0;
		foreach($obj AS $key=>$value) {
			if ($key == "Session") {
				echo $key . ":<br>";
				echo "&nbsp;&nbsp;&nbsp;---------------------------------------<br>";
				foreach ($value AS $k => $v) {
					echo "&nbsp;&nbsp;&nbsp;" . $k . " = " . $v . "<br>";
				}
				echo "&nbsp;&nbsp;&nbsp;---------------------------------------<br>";
			}else if ($key == "securityGroups") {
				//Array ( [0] => Array ( [groupID] => 1 [name] => System Administrator [isSelected] => 1 ) )
				echo $key . ":<br>";
				echo "&nbsp;&nbsp;&nbsp;---------------------------------------<br>";
				foreach ($value[0] AS $k => $v) {
					echo "&nbsp;&nbsp;&nbsp;" . $k . " = " . $v . "<br>";
				}
				echo "&nbsp;&nbsp;&nbsp;---------------------------------------<br>";
			}else if($key == "Fields" || $key == "Objects"){
				echo $key . ":<br>";
				foreach($value AS $name=>$val){
					foreach($val AS $a=>$b){
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $a . " = " . $b . "<br>";
					}
				}
			}else if ($key == "Clients" || $key == "Contacts") {
				echo $key . ":<br>";
				echo "&nbsp;&nbsp;&nbsp;---------------------------------------<br>";
				foreach($value AS $c=>$d){
					foreach ($d AS $k => $v) {
						if($k == "Fields"){
							echo $k . ":<br>";
							foreach($v AS $name=>$val){
								foreach($val AS $a=>$b){
									echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $a . " = " . $b . "<br>";
								}
							}
						}else{
							echo "&nbsp;&nbsp;&nbsp;" . $k . " = " . $v . "<br>";
						}
					}
				}
				echo "&nbsp;&nbsp;&nbsp;---------------------------------------<br>";
			} else {
				echo $key . " = " . $value . "<br>";
			}
			$x++;
		}
		if($x == 0){
			echo $obj;
		}
	}

	public function insertClient($post){
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/data/Clients/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars["method"] = 3;

		// Build fields for sending to Vonigo

		$vonigoFields = array();
		foreach($post AS $key=>$value){

			$f = $this->convertFieldname($key);

			if($f !== 0){
				$fieldID = $this->getFieldID($f);
				$optionType = $this->getOptionType($f);
				$vonigoFields[] = array("fieldID"=>$fieldID, $optionType=>$value);
			}
		}

		$vonigoAPIvars['fields'] = $vonigoFields;

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		//echo "<hr>".$data_string."<br>";
		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);
		//$obj = json_decode($curl, true);

		return $curl;
	}

	private function insertLead($post){
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/data/Leads/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars["method"] = 3;

		// Build fields for sending to Vonigo

		$vonigoFields = array();
		foreach($post AS $key=>$value){

			$f = $this->convertFieldname($key);

			if($f !== 0){
				$fieldID = $this->getFieldID($f);
				$optionType = $this->getOptionType($f);
				$vonigoFields[] = array("fieldID"=>$fieldID, $optionType=>$value);
			}
		}

		$vonigoAPIvars['fields'] = $vonigoFields;

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		//echo "<hr>".$data_string."<br>";
		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);
		//$obj = json_decode($curl, true);

		return $curl;
	}

	public function insertContact($id, $post){
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/data/Contacts/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars["method"] = 3;
		$vonigoAPIvars['clientID'] = $id;

		// Build fields for sending to Vonigo

		$vonigoFields = array();
		foreach($post AS $key=>$value){

			switch($key){
				case 125:
					$vonigoFields[] = array("fieldID"=>$key, 'optionID'=>$value);
					break;
				case 134:
					$vonigoFields[] = array("fieldID"=>$key, 'optionID'=>$value);
					break;
				case 96:
					break;
				default:
					$vonigoFields[] = array("fieldID"=>$key, 'fieldValue'=>$value);
			}

		}

		$vonigoAPIvars['fields'] = $vonigoFields;

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		//echo "<hr>INSERT CLIENT:<br>".$data_string."<br>";
		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);
		//$obj = json_decode($curl, true);

		return $curl;

	}

	public function insertLocation($id, $post){
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/data/Locations/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars["method"] = 3;
		$vonigoAPIvars['clientID'] = $id;

		// Build fields for sending to Vonigo

		$vonigoFields = array();
		foreach($post AS $key=>$value){

			switch($key){
				case 779:
					$vonigoFields[] = array("fieldID"=>$key, 'optionID'=>$value);
					break;
				case 778:
					$vonigoFields[] = array("fieldID"=>$key, 'optionID'=>$value);
					break;
				default:
					$vonigoFields[] = array("fieldID"=>$key, 'fieldValue'=>$value);
			}

		}

		$vonigoAPIvars['fields'] = $vonigoFields;

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		//echo "<hr>INSERT LOCATION:<br>".$data_string."<br>";
		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);
		//$obj = json_decode($curl, true);

		return $curl;
	}

	private function listLeads(){
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/data/Leads/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars["pageNo"] = 1;
		$vonigoAPIvars["pageSize"] = 50;
		$vonigoAPIvars["sortMode"] = 1;
		$vonigoAPIvars["sortDirection"] = 1;

		// Build fields for sending to Vonigo
		$vonigoFields = array();
		$vonigoFields[] = array("fieldID"=>121);
		$vonigoFields[] = array("fieldID"=>122);
		$vonigoFields[] = array("fieldID"=>129);

		$vonigoAPIvars['fields'] = $vonigoFields;

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		//echo "<hr>".$data_string;

		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);

		return $curl;
	}

	private function listClients(){
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/data/Clients/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars["pageNo"] = 1;
		$vonigoAPIvars["pageSize"] = 50;
		$vonigoAPIvars["sortMode"] = 1;
		$vonigoAPIvars["sortDirection"] = 1;

		// Build fields for sending to Vonigo
		$vonigoFields = array();
		$vonigoFields[] = array("fieldID"=>121);
		$vonigoFields[] = array("fieldID"=>122);
		$vonigoFields[] = array("fieldID"=>129);

		$vonigoAPIvars['fields'] = $vonigoFields;

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		//echo "<hr>".$data_string;

		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);

		return $curl;
	}

	private function listContacts(){
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/data/Contacts/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars["pageNo"] = 1;
		$vonigoAPIvars["pageSize"] = 50;
		$vonigoAPIvars["sortMode"] = 1;
		$vonigoAPIvars["sortDirection"] = 1;

		// Build fields for sending to Vonigo
		$vonigoFields = array();
		$vonigoFields[] = array("fieldID"=>125);
		$vonigoFields[] = array("fieldID"=>1104);
		$vonigoFields[] = array("fieldID"=>9795);

		$vonigoAPIvars['fields'] = $vonigoFields;

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		//echo "<hr>".$data_string;

		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);

		return $curl;
	}

	private function listJobs(){
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/data/Jobs/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars["pageNo"] = 1;
		$vonigoAPIvars["pageSize"] = 50;
		$vonigoAPIvars["sortMode"] = 1;
		$vonigoAPIvars["sortDirection"] = 1;

		// Build fields for sending to Vonigo
		$vonigoFields = array();
		$vonigoFields[] = array("fieldID"=>125);
		$vonigoFields[] = array("fieldID"=>1104);
		$vonigoFields[] = array("fieldID"=>9795);

		//$vonigoAPIvars['fields'] = $vonigoFields;

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		//echo "<hr>".$data_string;

		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);

		return $curl;
	}

	private function listAssets(){
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/data/Assets/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars["pageNo"] = 1;
		$vonigoAPIvars["pageSize"] = 50;
		$vonigoAPIvars["sortMode"] = 1;
		$vonigoAPIvars["sortDirection"] = 1;

		// Build fields for sending to Vonigo
		$vonigoFields = array();
		$vonigoFields[] = array("fieldID"=>125);
		$vonigoFields[] = array("fieldID"=>1104);
		$vonigoFields[] = array("fieldID"=>9795);

		//$vonigoAPIvars['fields'] = $vonigoFields;

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		//echo "<hr>".$data_string;

		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);

		return $curl;
	}

	private function getSystemObjects(){
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/system/objects/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		//$vonigoAPIvars["method"] = 1;

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);

		return $curl;
	}

	private function getFieldData(){

		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/system/objects/"; // Objects List
		//$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/security/routes/"; // Routes List
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		//$vonigoAPIvars["pageNo"] = 1;
		//$vonigoAPIvars["pageSize"] = 50;
		$vonigoAPIvars["method"] = 1;
		$vonigoAPIvars["objectID"] = 28; // 8 = Contact, 28 = Lead

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		//echo "<hr>".$data_string;

		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);

		return $curl;
	}

	public function getLeadDetail($id){
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/data/Leads/"; // Objects List
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars["method"] = 1;
		$vonigoAPIvars["objectID"] = $id;

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		$result = ARRAY();

		//echo "<hr>".$data_string;

		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);

		$obj = json_decode($curl, true);

		/*foreach($obj['Client'] AS $key=>$value){
			switch($key){
				case "name":
					$nameA = explode(",", $value);
					$result['First Name'] = trim($nameA[1]);
					$result['Last Name'] = trim($nameA[0]);
					break;
			}
		}*/

		foreach($obj['Fields'] AS $key=>$value){
			//echo $value['fieldID']."<br>";
			//echo $value['fieldValue']."<br>";
			switch($value['fieldID']){
				case 126:
					$nameA = explode(",", $value['fieldValue']);
					$result['First Name'] = trim($nameA[1]);
					$result['Last Name'] = trim($nameA[0]);
					break;
				case 1082:
					$result['doorbuilder'] = $value['fieldValue'];
					break;
			}
		}

		return $result;
	}

	private function iterateFields($obj){
		$x = 0;
		foreach($obj AS $key=>$value) {
			if($key == "Fields" || $key == "Objects"){
				echo $key . ":<br>";
				echo "&nbsp;&nbsp;&nbsp;---------------------------------------<br>";
				foreach($value AS $name=>$val){
					foreach($val AS $a=>$b){
						if($a == "fieldID" || $a == "objectTypeID" || $a == "name"){
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---------------------------------------<br>";
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $a . " = " . $b . "<br>";
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---------------------------------------<br>";
						}else{
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $a . " = " . $b . "<br>";
						}
					}
				}
			} else {
				echo $key . " = " . $value . "<br>";
			}
			$x++;
		}

		if($x == 0){
			echo $obj;
		}
	}

	private function getObjectID($obj){
		$result = '';
		foreach($obj AS $key=>$value) {
			if($key == "Client"){
				foreach($value AS $name=>$val){
					if($name == "objectID"){
						$result = $val;
					}
				}
			}
		}
		return $result;
	}

	private function getFieldID($field){
		// gets the vonigo id for a given field name
		$result = 0;
		$a = array(
			'Fax' => 111,
			'Phone' => 112,
			'Type' => 121,
			'Status' => 122,
			'Stage' => 123,
			'Name' => 126,
			'Main Address' => 129,
			'Primary Contact' => 130,
			'Marketing Campaign' => 795,
			'Phone 2' => 1065,
			'Website' => 1080,
			'Description' => 1081,
			'Notes' => 1082,
			'Email' => 1091,
			'Quote Price' => 10196,
			'Door Calculator Link' => 10200,
			'F&D Location' => 10202,
			'F&D Location Source' => 10204,
			'Development Name' => 10205,
			'Zoho ID' => 10206,
			'Contact Number' => 10207,
			'Contact Email' => 10208,
			'Lead Origin' => 10209,
		);

		foreach($a as $key => $value){
			if($key == $field){
				$result = $value;
				break;
			}
		}

		//echo "<hr>".$field."<br>".$result."<hr>";

		return $result;
	}

	private function getFieldIDcontact($field){
		$result = 0;
		$a = array(
			'Phone 2' => 96,
			'Email' => 97,
			'Status' => 125,
			'First Name' => 127,
			'Last Name' => 128,
			'Salutation' => 134,
			'Job Title' => 211,
			'Phone' => 1088,
			'Notes' => 1090,
			'Account Name' => 9795,
		);

		foreach($a as $key => $value){
			if($key == $field){
				$result = $value;
				break;
			}
		}

		//echo "<hr>".$field."<br>".$result."<hr>";

		return $result;
	}

	private function convertFieldname($field){
		// converts zoho field name into a vonigo field name (most should be similar)
		$result = 0;
		$a = array( // key part in array is Zoho. value part is Vonigo
			'Type' => 'Type',
			'Status' => 'Status',
			'Phone' => 'Phone',
			'Name' => 'Name',
			'Email' => 'Email',
			'builderNotes' => 'Notes',
			'QuotePrice' => 'Quote Price',
			'Door Calculator Link' => 'Door Calculator Link',
			'Stage' => 'Stage',
			'Development Name' => 'Development Name',
			'Website' => 'Website',
			'message' => 'Description',
			'F&D Location' => 'F&D Location',
			'F&D Location Source' => 'F&D Location Source',
			'Marketing Campaign' => 'Marketing Campaign',
			'Zoho ID' => 'Zoho ID',
			'Contact Number' => 'Contact Number',
			'Contact Email' => 'Contact Email',
			'Main Address'=>'Main Address',
			'Lead Source'=>'Lead Origin',
		);

		foreach($a as $key => $value){
			if($key == $field){
				$result = $value;
				break;
			}
		}

		return $result;
	}

	private function getObjectIDbyName($name){
		$a = array(
			'Franchise'=>1,
			'Route'=>5,
			'Vehicle'=>6,
			'Client'=>7,
			'Contact'=>8,
			'Job'=>10,
			'Work Order'=>12,
			'Invoice'=>13,
			'User'=>15,
			'Request'=>17,
			'Payment'=>18,
			'Case'=>19,
			'Location'=>20,
			'Task'=>21,
			'Price List'=>23,
			'Lead'=>28,
			'Quote'=>31,
			'Tax'=>36,
			'Note'=>48,
			'Crew'=>50,
			'Charge'=>57,
			'Email'=>61,
			'PriceList'=>68,
			'PriceBlock'=>69,
			'PriceItem'=>70,
			'Signature'=>71,
			'BookOff'=>74,
			'Service Type'=>78,
			'Waypoint'=>84,
			'ContactType'=>87,
			'LocationType'=>88,
		);

		$result=0;

		foreach($a as $key => $value){
			if($key == $name){
				$result = $value;
				break;
			}
		}

		return $result;
	}

	private function getOptionType($field){
		$result = "fieldValue";
		$a = array(
			'Type',
			'Status',
			'Stage',
			'Marketing Campaign',
		);

		if(in_array($field, $a)){
			$result = "optionID";
		}

		return $result;
	}

	private function getFromCURL($vonigoAPIurl, $data_string){
		$ch = curl_init($vonigoAPIurl);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data_string))
		);
		$r = curl_exec($ch);
		curl_close($ch);

		return $r;
	}

	//destructor
	public function __destruct(){
		//echo "<hr>Logging Out<hr>";
		// Log out of Vonigo
		$ch = curl_init("https://fsdae.vonigo.com/api/v1/security/logout/?securityToken=".$this->VonigoSecurityToken);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//$r = curl_exec($ch);
		curl_close($ch);
		//echo $r;
	}

}