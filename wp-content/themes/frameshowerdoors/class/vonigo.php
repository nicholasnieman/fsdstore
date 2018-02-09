<?php
class vonigo_class{
	function __construct()
	{
		//echo "<h1>Welcome to the ToVonigo API</h1><hr>";
		/*
		 * LOG INTO VONIGO AND GET A SECURITY TOKEN
		 * APIaccess
		 */

		$security = $this->getSecurityToken();

		/*
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
		*/

		/* Iterate through the values returned by the login service
		$this->iterateResults($obj);
		*/

	}

	private function getSecurityToken(){
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
		//echo "Security Token Result: ".$obj['securityToken']."<br>";
	}

	public function getInfo($post){
		$result = '';

		//echo "Job details sent from ZoHo:<br>";
		foreach($post AS $key=>$value){
			echo $key . " = " . $value . "<br>";
		}
		//echo "<hr>";

		/**/
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

		/*
		$clients = $this->listClients();
		echo "<hr>Clients:<br>".$clients."<hr>";
		echo "<hr><b>Clients:</b><br>";
		$obj = json_decode($clients, true);
		$this->iterateResults($obj);
		*/

		//$leads = $this->listLeads();
		//echo "<hr>Leads:<br>".$leads."<hr>";
		//echo "<b>Leads</b><br>";
		//$obj = json_decode($leads, true);
		//$this->iterateResults($obj);

		/*
		$contacts = $this->listContacts();
		echo "<hr>Contacts:<br>".$contacts."<hr>";
		echo "<hr><b>Contacts:</b><br>";
		$obj = json_decode($contacts, true);
		$this->iterateResults($obj);
		*/

		//$franchiseByZip = $this->getFranchiseByZip($post['zip']);
		//echo "<hr>Franchise:<br>ID: ".$franchiseByZip['franchiseID']."<br>Name: ".$franchiseByZip['franchiseName']."<hr>";

		//$assets = $this->listAssets();
		//echo "<hr>Assets:<br>".$assets."<hr>";

		//$jobs = $this->listJobs();
		//echo "<hr>Jobs:<br>".$jobs."<hr>";

		//$clientDetails = $this->getClientsDetails();
		//echo "<hr>".$clientDetails."<hr>";

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

	public function insertQuote($post){
		$franchiseByZip = $this->getFranchiseByZip($post['zip']);
		$franchiseID = $franchiseByZip['franchiseID'];
		$changeFranchise = $this->changeFranchise($franchiseID);
		//echo "<hr>".$franchiseByZip['franchiseName']." = ".$franchiseID."<hr>";
		//echo "<hr>".$changeFranchise."<hr>";
		$clientID = $this->findClientByEmail($post['Contact Email']);
		$locationID = $this->getLocationForClient($clientID);
		$contactID = $this->getContactForClient($clientID);
		$quoteInfo = ARRAY(
			"clientID"=>$clientID,
			"contactID"=>$contactID,
			"locationID"=>$locationID,
			"quote"=>$post['quote'],
			"name"=>$post['Name'],
			"note"=>"<a href='".$post['Door Calculator Link']."' target='_blank' style='color:blue;'>".$post['Door Calculator Link']."</a>\n<br>".$post['builderNotes'],
			"franchiseID"=>$franchiseID,
			"dragonLink"=>"<a href='".$post['Door Calculator Link']."' target='_blank' style='color:blue;'>".$post['Door Calculator Link']."</a>",
			"dragonLinkURL"=>$post['Door Calculator Link'],
			"doorBuild"=>$post['builderNotes'],
			'doorType'=>$post['doorType'],
		);

		$updateClient = $this->updateClient($post, $clientID); // currently updates the door calculator link and the door builder notes
		$addQuote = $this->addQuote($quoteInfo);
	}

	private function addQuote($info){
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/data/Quotes/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars["method"] = 3;
		$vonigoAPIvars["clientID"] = $info["clientID"];
		$vonigoAPIvars["contactID"] = $info["contactID"];
		$vonigoAPIvars["locationID"] = $info["locationID"];
		$vonigoAPIvars["serviceTypeID"] = 11;

		// Build fields for sending to Vonigo
		$vonigoFields = array();
		$vonigoFields[] = array("fieldID"=>909, "fieldValue"=>$info['note']);

		$vonigoAPIvars['Fields'] = $vonigoFields;

		$vonigoCharges = array();
		$charges = array(
			array("fieldID"=>9290, "fieldValue"=>"Quote for Measure"),
			array("fieldID"=>9289, "fieldValue"=>$info['dragonLinkURL']),
			array("fieldID"=>9288, "fieldValue"=>"1"),
			array("fieldID"=>9287, "fieldValue"=>0),
		);
		$charges2 = array(
			array("fieldID"=>9290, "fieldValue"=>"Quote for Custom Door"),
			array("fieldID"=>9289, "fieldValue"=>$info['doorType']),
			array("fieldID"=>9288, "fieldValue"=>"1"),
			array("fieldID"=>9287, "fieldValue"=>$info["quote"]),
		);
		$vonigoCharges[] = array("priceItemID"=>"4782", "Fields"=>$charges2);
		$vonigoCharges[] = array("priceItemID"=>"4769", "Fields"=>$charges);

		$vonigoAPIvars['Charges'] = $vonigoCharges;


		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		//echo "<hr>".$data_string."<hr>";
		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);
		//echo "<hr>".$curl."<hr>";
		//$obj = json_decode($curl, true);

		return $curl;
	}

	private function changeFranchise($franchiseID){
		$vonigoAPIurl = "https://fsdae.vonigo.com";
		$ch = curl_init("https://fsdae.vonigo.com/api/v1/security/session/?securityToken=".$this->VonigoSecurityToken."&method=2&franchiseID=".$franchiseID);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$r = curl_exec($ch);
		curl_close($ch);
		$obj = json_decode($r, true);

		return $r;
	}

	private function updateClient($post, $clientID){
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/data/Clients/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars["method"] = 2;
		$vonigoAPIvars["objectID"] = $clientID;

		// Build fields for sending to Vonigo
		$vonigoFields = array();
		$vonigoFields[] = array("fieldID"=>10200, "fieldValue"=>$post['Door Calculator Link']);
		$vonigoFields[] = array("fieldID"=>1082, "fieldValue"=>$post['builderNotes']);
		$vonigoFields[] = array("fieldID"=>1080, "fieldValue"=>$post['Door Calculator Link']);

		$vonigoAPIvars['fields'] = $vonigoFields;

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		//echo "<hr>".$data_string."<hr>";
		$curl = $this->getFromCURL($vonigoAPIurl, $data_string);
		//echo "<hr>".$curl."<hr>";
		//$obj = json_decode($curl, true);

		return $curl;
	}

	private function getContactForClient($clientID){
		$ch = curl_init("https://fsdae.vonigo.com/api/v1/data/Contacts/?securityToken=".$this->VonigoSecurityToken."&clientID=".$clientID);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$r = curl_exec($ch);
		curl_close($ch);
		$obj = json_decode($r, true);

		foreach($obj AS $key=>$value){
			//echo "&nbsp;".$key."<br>";
			if($key == "Contacts"){
				foreach($value AS $cons){
					foreach($cons AS $name=>$pair){
						//echo "&nbsp;&nbsp;&nbsp;&nbsp;".$name." = ".$pair."<br>";
						if($name == "objectID"){
							$objectID = $pair;
						}
					}
				}
			}
		}

		return $objectID;
	}

	private function getLocationForClient($clientID){
		$ch = curl_init("https://fsdae.vonigo.com/api/v1/data/Locations/?securityToken=".$this->VonigoSecurityToken."&clientID=".$clientID);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$r = curl_exec($ch);
		curl_close($ch);
		$obj = json_decode($r, true);

		foreach($obj AS $key=>$value){
			if($key == "Locations"){
				foreach($obj AS $name=>$pair){
					if($name == "Locations"){
						foreach($pair AS $locats){
							foreach($locats AS $k => $v){
								//echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$k." = ".$v."<br>";
								if($k == "objectID"){
									$objectID = $v;
								}
							}
						}
					}
				}
			}
		}

		return $objectID;
	}

	private function getClientsDetails(){

		$ch = curl_init("https://fsdae.vonigo.com/api/v1/data/Accounts/?securityToken=".$this->VonigoSecurityToken."&isCompleteObject=true&sortMode=1&sortDirection=1");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$r = curl_exec($ch);
		curl_close($ch);
		$obj = json_decode($r, true);

		//echo "<hr>".$r."<hr>";

		return $obj;
	}

	private function findClientByEmail($email){
		$clientDetails = $this->getClientsDetails();
		$objectID = '';
		$tempObjectID = '';

		foreach($clientDetails AS $key=>$value){
			//echo $key."<br>";
			if($key == 'Clients'){
				foreach($value AS $A){
					foreach($A AS $n => $v){
						if($n == "objectID"){
							//echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$n." = ".$v."<br>";
							$tempObjectID = $v;
						}
						if($n == 'Fields'){
							foreach($v AS $fieldArray){
								foreach($fieldArray AS $fieldName=>$fieldValue){
									//echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$fieldName." = ".$fieldValue."<br>";
									if($fieldName == "fieldID" && $fieldValue == "10208"){
										if(trim($email) == trim($fieldArray['fieldValue'])){
											//echo "<hr>".$fieldArray['fieldValue']."<hr>";
											$objectID = $tempObjectID;
											break;
										}
									}
								}
							}
						}
					}
					//echo "<hr>";
				}
			}
		}
		//echo "<hr>Object ID: ".$objectID."<hr>";
		return $objectID;
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

	public function getFranchiseByZip($zip){
		$result = ARRAY();
		//
		$ch = curl_init("https://fsdae.vonigo.com/api/v1/security/franchises/?securityToken=".$this->VonigoSecurityToken."&zip=".$zip."&method=3");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$r = curl_exec($ch);
		curl_close($ch);
		$obj = json_decode($r, true);

		foreach($obj AS $key=>$value) {
			if($key == "Franchise"){
				foreach($value AS $name=>$val){
					foreach($val as $n=>$v){
						$result[$n] = $v;
					}
				}
			}
		}
		/*
		 * EXAMPLE returns
		franchiseID = 18
		franchiseName = South FL glass testing
		*/
		return $result;
	}

	public function getLocations(){
		$result = ARRAY();
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/data/Locations/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars['clientID'] = 91;
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

	private function insertClient($post){
		$vonigoAPIurl = "https://fsdae.vonigo.com/api/v1/data/Clients/";
		$vonigoAPIvars = array();
		$vonigoAPIvars["securityToken"] = $this->VonigoSecurityToken;
		$vonigoAPIvars["method"] = 3;

		// Build fields for sending to Vonigo
		$vonigoFields = array();
		$vonigoFields[] = array("fieldID"=>444, "fieldValue"=>$post['firstName']);
		$vonigoFields[] = array("fieldID"=>555, "fieldValue"=>$post['lastName']);
		$vonigoFields[] = array("fieldID"=>666, "fieldValue"=>$post['email']);

		$vonigoAPIvars['fields'] = $vonigoFields;

		$data = $vonigoAPIvars;
		$data_string = json_encode($data);

		//echo "<hr>".$data_string."<hr>";
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
				/*case 96:
					$vonigoFields[] = array("fieldID"=>$key, 'optionID'=>$value);
					break;*/
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

		echo "<hr>".$data_string;

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
		/**/
		$ch = curl_init("https://fsdae.vonigo.com/api/v1/security/logout/?securityToken=".$this->VonigoSecurityToken);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//$r = curl_exec($ch);
		curl_close($ch);
		//echo $r;

	}

}