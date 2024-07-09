<?php
session_start();

function getIPAddress() {
    // Check for IP address in HTTP headers
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$visitor_ip = getIPAddress();

$url = 'https://whatismycountry.com/';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Forwarded-For: ' . $visitor_ip));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return response as string
$response = curl_exec($ch);
curl_close($ch);

// Extract country name from response using Simple HTML DOM
require_once('simple_html_dom.php');
$html = str_get_html($response);
$country_element = $html->find('#country', 0);
$country_name = str_replace('Your country is', '', $country_element->plaintext);

if (strpos($country_name, 'Portugal') !== false) {
    $_SESSION['authorized'] = true;
    header('Location: ./index/index.php');
    exit();
} else {
    include('404.html');
    exit();
}
?>