<?php
require_once('config.php');


if (isset($_GET['logout'])) { // logout: destroy token
    unset($_SESSION['accessToken']);
	die('Logged out.');
}
// if(session_status() == PHP_SESSION_ACTIVE)
// {
//     session_regenerate_id();
// }


if (isset($_GET['code'])) { // we received the positive auth callback, get the token and store it in session
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    // $client->setAccessToken($token['access_token']);
   
   
    // $client->authenticate();
    $_SESSION['accessToken'] = $client->getAccessToken();
}

if (isset($_SESSION['token'])) { // extract token from session and configure client
    $token = $_SESSION['accessToken'];
    $client->setAccessToken($token);
}

if (!$client->getAccessToken()) { // auth call to google
    // $authUrl = $client->createAuthUrl();
    // header("Location: ".$authUrl);
    header("Location: index.php");
    // exit();
}
$google_oauth = new Google_Service_Oauth2($client);

$datas = $google_oauth->userinfo->get();

$emailid= $datas['email'];
// $a = 'How are you?';

if (strpos($emailid, '@indiamart.com') === false) {
    echo 'true';
    header("Location: index.php");
    // exit();
}else{
    header("Location: extentReport-index.php");
}
exit();
?>








<!-- // authenticate code from Google OAuth Flow
// if (isset($_GET['code'])) {
//     $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
//     $client->setAccessToken($token['access_token']);
    
//     // get profile info
//     $google_oauth = new Google_Service_Oauth2($client);
//     $google_account_info = $google_oauth->userinfo->get();
//     $email =  $google_account_info->email;
//     $name =  $google_account_info->name;
//     echo 'hello world';
   
//     // now you can use this profile info to create account in your website and make user logged in.
//   } else {
    
//     // echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
//     header("Location: index.php");
//   }
//   ?> -->


<!-- if (isset($_GET['logout'])) { // logout: destroy token
    unset($_SESSION['token']);
	die('Logged out.');
}

if (isset($_GET['code'])) { // we received the positive auth callback, get the token and store it in session
    $client->authenticate();
    $_SESSION['token'] = $client->getAccessToken();
}

if (isset($_SESSION['token'])) { // extract token from session and configure client
    $token = $_SESSION['token'];
    $client->setAccessToken($token);
}

if (!$client->getAccessToken()) { // auth call to google
    // $authUrl = $client->createAuthUrl();
    // header("Location: ".$authUrl);
    header("Location: index.php");
    die;
}
echo 'Hello, world.'; -->

<!-- // if (isset($_GET['code'])) {
//     $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
//     console.log('token is',$token);
//     // $client->setAccessToken($token['access_token']);

//     //Set the access token used for requests
//     $client->setAccessToken($token['access_token']);

//         //Store "access_token" value in $_SESSION variable for future use.
//         $_SESSION['access_token'] = $token['access_token'];

//         //Create Object of Google Service OAuth 2 class
//         $google_service = new Google_Service_Oauth2($client);

//          //Get user profile data from google
//         $data = $google_service->userinfo->get();
//         $emailid= $data['email'];

//         print_r('email is ',$emailid);
      
//     }

// if(!isset($_SESSION['access_token']))
//         {
    
//         header("Location: index.php");
     
//         }
//  //Get user profile data from google
//  $data = $google_service->userinfo->get();
//  $emailid= $data['email'];

// print_r('email is ',$emailid);

  

// if(isset($_SESSION['accessToken'])){
//     $client->setAccessToken($_SESSION['accessToken']);
// }else if(isset($_GET['code'])) {
//     // $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
//     $token = $client->getAccessToken();
//     $_SESSION['accessToken'] = $token;
// }else{
//     header("location: index.php"); -->