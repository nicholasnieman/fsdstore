<?php
/*
Small Package Quotes for WooCommerce - Worldwide Express Edition
Copyright (C) 2016  Eniture LLC d/b/a Eniture Technology

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License version 2
as published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Inquiries can be emailed to info@eniture.com or sent via the postal service to Eniture Technology, 320 W. Lanier Ave, Suite 200, Fayetteville, GA 30214, USA.
*/
add_action('wp_ajax_nopriv_speedship_action', 'speedship_submit');
add_action('wp_ajax_speedship_action', 'speedship_submit');

function speedship_submit() {

    $sp_user = $_POST['speed_freight_username'];
    $sp_pass = $_POST['speed_freight_password'];
    $sp_au_key = $_POST['authentication_key'];
    $sp_acc = $_POST['world_wide_express_account_number'];
    $sp_licence_key = $_POST['speed_freight_licence_key'];
    $domain = $_SERVER['SERVER_NAME'];

    $post = [
        'speed_freight_username' => $sp_user,
        'speed_freight_password' => $sp_pass,
        'authentication_key' => $sp_au_key,
        'world_wide_express_account_number' => $sp_acc,
        'plugin_licence_key' => $sp_licence_key,
        'plugin_domain_name' => eniture_parse_url($domain),
    ];

    $ch = curl_init();
    // set url
    curl_setopt($ch, CURLOPT_URL, "http://eniture.com/WweSmallPkWebService/quoteSpeedshipShipment.php");

    // send curl value by post method
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    //return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // $output contains the output string
    $output = curl_exec($ch);

    // close curl resource to free up system resources
    curl_close($ch);
    print_r($output);
    exit();
    // echo json_decode($output);
}

function eniture_parse_url($domain) {

    $domain = trim($domain);

    $parsed = parse_url($domain);
    if (empty($parsed['scheme'])) {
        $domain = 'http://' . ltrim($domain, '/');
    }

    $parse = parse_url($domain);
    $refinded_domain_name = $parse['host'];
    // remove www 
    $domain_array = explode('.', $refinded_domain_name);
    if (in_array('www', $domain_array)) {
        $key = array_search('www', $domain_array);
        unset($domain_array[$key]);
        $refinded_domain_name = implode($domain_array, '.');
    }
    return $refinded_domain_name;
}
