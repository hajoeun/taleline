<?php
require 'vendor/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
session_start();

define('CONSUMER_KEY', 'UsxYYNGhXAuS9nj7hxgB1PZIi');
define('CONSUMER_SECRET', 'ORzQguwaUyV0uYlFAxnH7c7ZuplCDgVWapPMtX15cwxuwdWH18');
define('OAUTH_CALLBACK', 'http://taleline.dothome.co.kr/libs/TwitterOAuth.php');

define('ACCESS_TOKEN', '2169372224-WdLtwzw3RMkf9HQOMtG2pFbi5qNe4EhFG0JDrX6');
define('ACCESS_TOKEN_SECRET', '24wC1cJqOQZhixexzVXzcyeB7Uc8fypz5ygf8bWQmiA8B');

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);

$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));

$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

//$userInfo = $connection->get('user/show', array('screen_name' => '{user_name}'));

//if($connection->http_code==200){
    $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
    header('Location: '. $url);

//else {
//    die('error' . $connection->http_code);
//}

?>