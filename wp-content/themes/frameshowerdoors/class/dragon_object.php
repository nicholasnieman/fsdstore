<?php
if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME']))
{
    // tell people trying to access this file directly goodbye...
    exit('This file can not be accessed directly...');
}

class dragon_object{
    public function __construct()
    {
        //echo "You made it bruva";
    }

    public function createJobId(){
        $alphabet = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
        $job_id = '';

        for ($x = 0; $x <= 2; $x++) {
            $num = mt_rand(0,25);
            $job_id .= strtoupper($alphabet[$num]);
        }

        $num = mt_rand(100, 999);
        $job_id .= $num;

        for ($x = 0; $x <= 2; $x++) {
            $num = mt_rand(0,25);
            $job_id .= strtoupper($alphabet[$num]);
        }


        return $job_id;
    }

    public function createJob($vars){
        //LIVE
        $live_url = 'http://fsdresourcecenter.com/add-job/';
        $dev_url = 'http://dragon.local/add-job/';
        $ch = curl_init($live_url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
        $r = curl_exec($ch);
        curl_close($ch);
    }
}
