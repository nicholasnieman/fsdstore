<?php

$json = file_get_contents('https://geoip-db.com/json');
$data = json_decode($json);

echo "Method One:<hr>";

print $data->country_code . '<br>';
print $data->country_name . '<br>';
print $data->state . '<br>';
print $data->city . '<br>';
print $data->postal . '<br>';
print $data->latitude . '<br>';
print $data->longitude . '<br>';
print $data->IPv4 . '<br>';

echo "<hr>";

$ip = get_client_ip();

echo "<hr>IP: ".$ip."<hr>";

$geolocateURL = "https://freegeoip.net/json/".$ip;
echo $geolocateURL."<hr>";
// Initialize your cURL session
$ch = curl_init();

// Follow any Location headers
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

// tell cURL what file to open
curl_setopt($ch, CURLOPT_URL, $geolocateURL);
// tell cURL to populate the $ch variable with results
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Alert cURL to the fact that we're doing a POST, and pass the associative array for POSTing
curl_setopt($ch, CURLOPT_POST, 1);

// Post your values to the opened script
$postfields = "secret=".$secret . "&response=".$response."&remoteip=".$remoteip;
curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);

// Execute your cURL script
$output = curl_exec($ch);
//echo $output;

// Free system resources taken by cURL
curl_close($ch);

$obj = json_decode($r, true);

echo "JSON: ".$r."<hr>";
echo "Method Two:<hr>";
echo $obj['region_name']."<br>";
echo $obj['city']."<br>";
echo $obj['zip_code']."<br>";

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Geo City Locator</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body >
<div>Country: <span id="country"></span></div>
<div>State: <span id="state"></spa></div>
<div>City: <span id="city"></span></div>
<div>Latitude: <span id="latitude"></span></div>
<div>Longitude: <span id="longitude"></span></div>
<div>IP: <span id="ip"></span></div>
<script>
    $.getJSON('https://geoip-db.com/json/geoip.php?jsonp=?')
        .done (function(location) {
            $('#country').html(location.country_name);
            $('#state').html(location.state);
            $('#city').html(location.city);
            $('#latitude').html(location.latitude);
            $('#longitude').html(location.longitude);
            $('#ip').html(location.IPv4);
        });
</script>
</body>
</html>
