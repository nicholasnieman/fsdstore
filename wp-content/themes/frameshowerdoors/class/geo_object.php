<?php
if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME']))
{
    // tell people trying to access this file directly goodbye...
    exit('This file can not be accessed directly...');
}
class geo_object
{
    public function __construct()
    {
	    $bypass = false;
	    $cookie_name = "zipCode";
	    if($bypass == true){
	    	$_SESSION['flZip'] = '00000';
		    //setcookie($cookie_name, "", time() - 3600); // delete the cookie
	    }else{
		    //setcookie($cookie_name, "", time() - 3600); // delete the cookie
		    if(isset($_COOKIE[$cookie_name])) {
		    	$_SESSION['flZip'] = $_COOKIE[$cookie_name];
		    }else{
			    if(strlen($_SESSION['flZip']) < 5){
				    $_SESSION['flZip'] = $this->getZipCode();
				    $cookie_value = $_SESSION['flZip'];
				    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day // 30 days
			    }
		    }
	    }
	    $this->zip = $_SESSION['flZip'];

    	//echo "<hr>".$this->zip."<hr>";

    }
	public function isFL(){
		$isFL = false;
		if (in_array($this->zip, $this->getZips())){
			$isFL = true;
		}
		return $isFL;
	}
    private function whiteList($ip){
        // returns if an IP address is white listed or not
        $list = array(
            //"63.139.95.130",
            //"24.233.190.70",
        );
        if (in_array($ip, $list)){
            return true;
        }else{
            return false;
        }
    }
    private function getZipCode(){
        $ip = $this->get_client_ip();
        $zip = '00000'; // will set default as NOT Florida
        //is the IP whitelisted?
        if($this->whiteList($ip)){
            $zip = '00000';
        }else{
            //https://geoip-db.com/jsonp/82.196.6.157
            $json = file_get_contents('https://geoip-db.com/jsonp/'.$ip);
            //$json = file_get_contents('https://geoip-db.com/jsonp/63.139.95.130');
            $json = preg_replace('/.+?({.+}).+/','$1',$json);
            /*
            $gd = array();
            $json = str_ireplace("callback({","", $json);
            $json = str_ireplace("})","",$json);
            $json = str_ireplace('"','',$json);
            $json = explode(",", $json);
            foreach($json AS $a){
                $b = explode(':', $a);
                $gd[$b[0]] = $b[1];
            }
            //echo $gd['postal'];
            return trim($gd['postal']);
             */
            /*
            $json = file_get_contents('https://geoip-db.com/json');
            $data = json_decode($json);
            */
            $data = json_decode($json, true);
            /* Output of the different data returned by the service
            print $data->country_code . '<br>';
            print $data->country_name . '<br>';
            print $data->state . '<br>';
            print $data->city . '<br>';
            print $data->postal . '<br>';
            print $data->latitude . '<br>';
            print $data->longitude . '<br>';
            print $data->IPv4 . '<hr><br>';
            return $data->postal;
	        */
            $zip = trim($data['postal']);

            if(strtoupper(trim($data['state'])) == "FL" || strtoupper(trim($data['state'])) == "FLORIDA"){
                //$zip = "33065"; // this will flag all of florida as south florida
            }
        }
        //echo "<hr>".$zip."<hr>";
        return $zip;
    }

    private function getZips(){
        $zips = array(
            // Bradenton
            34202,
            //broward county
            33004,
            33008,
            33009,
            33019,
            33020,
            33021,
            33022,
            33023,
            33024,
            33025,
            33026,
            33027,
            33028,
            33029,
            33060,
            33061,
            33062,
            33063,
            33064,
            33065,
            33066,
            33067,
            33068,
            33069,
            33071,
            33073,
            33074,
            33075,
            33076,
            33077,
            33081,
            33082,
            33083,
            33084,
            33093,
            33097,
            33301,
            33302,
            33304,
            33305,
            33306,
            33307,
            33308,
            33309,
            33310,
            33311,
            33312,
            33313,
            33314,
            33315,
            33316,
            33317,
            33318,
            33319,
            33320,
            33321,
            33322,
            33323,
            33324,
            33325,
            33326,
            33327,
            33328,
            33329,
            33330,
            33331,
            33332,
            33334,
            33335,
            33338,
            33339,
            33345,
            33346,
            33348,
            33351,
            33355,
            33359,
            33388,
            33394,
            33441,
            33442,
            33443,
            // Dade County
            33002,
            33010,
            33011,
            33012,
            33013,
            33014,
            33015,
            33016,
            33017,
            33018,
            33030,
            33031,
            33032,
            33033,
            33034,
            33035,
            33039,
            33054,
            33055,
            33056,
            33090,
            33092,
            33101,
            33109,
            33112,
            33114,
            33116,
            33119,
            33122,
            33124,
            33125,
            33126,
            33127,
            33128,
            33129,
            33130,
            33131,
            33132,
            33133,
            33134,
            33135,
            33136,
            33137,
            33138,
            33139,
            33140,
            33141,
            33142,
            33143,
            33144,
            33145,
            33146,
            33147,
            33149,
            33150,
            33152,
            33153,
            33154,
            33155,
            33156,
            33157,
            33158,
            33159,
            33160,
            33161,
            33162,
            33163,
            33164,
            33165,
            33166,
            33167,
            33168,
            33169,
            33170,
            33172,
            33173,
            33174,
            33175,
            33176,
            33177,
            33178,
            33179,
            33180,
            33181,
            33182,
            33183,
            33184,
            33185,
            33186,
            33187,
            33189,
            33190,
            33193,
            33194,
            33195,
            33196,
            33197,
            33199,
            33222,
            33231,
            33233,
            33234,
            33238,
            33239,
            33242,
            33243,
            33245,
            33247,
            33255,
            33256,
            33257,
            33261,
            33265,
            33266,
            33269,
            33280,
            33283,
            33296,
            33299,
            // Palm Beach County
            33401,
            33402,
            33403,
            33404,
            33405,
            33406,
            33407,
            33408,
            33409,
            33410,
            33411,
            33412,
            33413,
            33414,
            33415,
            33416,
            33417,
            33418,
            33419,
            33420,
            33421,
            33422,
            33424,
            33425,
            33426,
            33427,
            33428,
            33429,
            33430,
            33431,
            33432,
            33433,
            33434,
            33435,
            33436,
            33437,
            33438,
            33444,
            33445,
            33446,
            33448,
            33449,
            33454,
            33458,
            33459,
            33460,
            33461,
            33462,
            33463,
            33464,
            33465,
            33466,
            33467,
            33468,
            33469,
            33470,
            33472,
            33473,
            33474,
            33476,
            33477,
            33478,
            33480,
            33481,
            33482,
            33483,
            33484,
            33486,
            33487,
            33488,
            33493,
            33496,
            33497,
            33498,
            33499,
            // Port St.Lucie
            34948,
            34954,
            34979,
            34985,
            34988,
        );
        return $zips;
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
}
