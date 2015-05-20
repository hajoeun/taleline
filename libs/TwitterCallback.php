<?php
require 'vendor/autoload.php';
require_once 'TwitterConfig.php';
use Abraham\TwitterOAuth\TwitterOAuth;
session_start();

//opentutorials code
// Request token 을 포함한 TwitterOAuth object 생성
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
 
// 토큰 수령
$access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));
$token = $access_token['oauth_token'];
$token_secret = $access_token['oauth_token_secret'];

$_SESSION['access_token'] = $access_token;

header('Location: http://taleline.dothome.co.kr/main.php');
?>