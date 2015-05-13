<?php
session_start();
 
// library 로드, 변수 설정 등
require_once('./libs/TwitterOAuth.php');
$consumer_key = 'UsxYYNGhXAuS9nj7hxgB1PZIi';
$consumer_secret = 'ORzQguwaUyV0uYlFAxnH7c7ZuplCDgVWapPMtX15cwxuwdWH18';
$domain = 'http://' . $_SERVER['HTTP_HOST'] . '/';
 
// TwitterOAuth object 생성
$connection = new TwitterOAuth($consumer_key, $consumer_secret);
 
// request token 발급
$request_token = $connection->getRequestToken
        ($domain . '[access token 처리 url]');
 
// 결과 확인
switch ($connection->http_code) {
    case 200:
        // 성공, token 저장
        $_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
        $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
 
        // 인증 url 확인
        $url = $connection->getAuthorizeURL($token);
 
        // 인증 url (로그인 url) 로 redirect
        header('Location: ' . $url);
        break;
 
    default:
        echo 'Could not connect to Twitter. Refresh the page or try again later.';
        break;
 
}// switch ($connection->http_code)
?>