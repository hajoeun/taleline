<?php
require 'vendor/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
session_start();

define('CONSUMER_KEY', 'UsxYYNGhXAuS9nj7hxgB1PZIi');
define('CONSUMER_SECRET', 'ORzQguwaUyV0uYlFAxnH7c7ZuplCDgVWapPMtX15cwxuwdWH18');
define('OAUTH_CALLBACK', 'http://taleline.dothome.co.kr/libs/TwitterOAuth.php');

//$request_token = [];
$request_token['oauth_token'] = $_SESSION['oauth_token'];
$request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];

if (isset($_REQUEST['oauth_token']) && $request_token['oauth_token'] !== $_REQUEST['oauth_token']) {
    echo 'Abort! Something is wrong.';
}

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);

$access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));

$_SESSION['access_token'] = $access_token;

$user = $connection->get("account/verify_credentials");

print_r($user);
//if(!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])){        
//    // We've got everything we need
//} 
//else {
//    // Something's missing, go back to square 1 
//    header('http://taleline.dothome.co.kr/libs/TwitterOAuth.php');
//}   

//
//$connection = new TwitterOAuth('CONSUMER_KEY', 'CONSUMER_SECRET', $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
//
//$access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));
//
//$_SESSION['access_token'] = $access_token;
//
//
//$user_info = $connection->get("account/verify_credentials");
//
//print_r($user_info);

?>