<?php
require_once('google-api/vendor/autoload.php');

$client = new Google_Client();
$client->setAuthConfig('creds.json');


$currentCookieParams = session_get_cookie_params();

// $rootDomain = '.example.com';

session_set_cookie_params(
    // $currentCookieParams["lifetime"],
    // $currentCookieParams["path"],
    // $rootDomain,
    $currentCookieParams["secure"],
    $currentCookieParams["httponly"]
);

// session_name('IMrep');
session_start();



// //session cookie params
// $currentCookieParams = session_get_cookie_params(); 

// // $rootDomain = '.example.com'; 

// session_set_cookie_params( 
//     $currentCookieParams["secure"], 
//     $currentCookieParams["httponly"] 
// ); 
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
$redirectURI = "http://localhost/hello/callback2.php";
$client->setRedirectUri($redirectURI);
session_start();
?>