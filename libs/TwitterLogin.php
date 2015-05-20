<?php
//include class 
require 'vendor/autoload.php';
require_once 'TwitterConfig.php';
use Abraham\TwitterOAuth\TwitterOAuth;

session_start();

//create TwitterOAuth object with our Twitter provided keys
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);

//generate request token
$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));

$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));

header('Location: '. $url);
