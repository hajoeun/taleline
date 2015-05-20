<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>TALELINE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes"/><!-- 안드로이드 주소줄 없애기 -->
    <meta name="apple-mobile-web-app-capable" content="yes"/><!-- iOS 주소줄 없애기 -->
    
    <link rel="apple-touch-icon" href="/img/taleline_icon.png"/><!-- 아이콘 설정 -->			
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    
</head>

<body>

<!-- main page -->
<div data-role="page" class="type-interior">
    <div data-role="header" data-position="fixed" data-id="foo">
        <a href="#" data-icon="carat-l" data-rel="back" data-iconpos="notext"></a>
        <a href="#" data-icon="gear" data-iconpos="notext"></a>

        <h1>TALELINE</h1>
    </div><!-- /header -->
    
    <div class="page-title">
    	<h2>NEWS FEED</h2>
    </div>

<?php
require "libs/vendor/autoload.php";
require "libs/TwitterConfig.php";
use Abraham\TwitterOAuth\TwitterOAuth;

session_start();

$access_token = $_SESSION['access_token'];

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

$statuses = $connection->get("search/tweets", array("q" => "#taleline", "since_id" => 12345, "count" => 10));

$news_feed = array(); //2d array를 선언해서 아래의 $index 값들을 삽입해준다. 이때 연관배열을 활용하면 쉬울 것!!

foreach ($statuses as $element){
    foreach($element as $index){
        = $index->user->name;
        = $index->user->profile_image_url;
        = $index->text;
    }
}

?>

<!-- <div class="container" data-role="content">
        <div class="profile">
            <img class="thumbnail" src="/img/pebble_logo.png" alt="" />
            <h4 class="name">pebble</h4> 
            <h5 class="slogan">Awesome watch. No compromises.</h4>
        </div>
      <p class="news">1941 KONRAD ZUSE INVENTS HOME COMPUTING. <br> 2009 ERIC MIGICOVSKY TOTALLY NAILS WEARABLE COMPUTING. <br> 2011 AFTER MUCH DELIBERATION PEBBLE IS BORN.</p>
    </div>/content
    
    <div class="container" data-role="content">
        <div class="profile">
            <img class="thumbnail" src="/img/hisbeans_logo.png" alt="" />
            <h4 class="name">hisbeans</h4> 
            <h5 class="slogan">희망을 주는 하나님의 기업</h4>
        </div>
      <p class="news">2008 향기내는사람들 창립 <br> 2009 HISBEANS 카페 1호점 한동대점 오픈 <br> 2011 HISBEANS 카페 2호점 포항시립중앙아트홀점 오픈 </p>
    </div>/content
    
    <div class="container" data-role="content">
        <div class="profile">
            <img class="thumbnail" src="/img/heeum_logo.jpeg" alt="" />
            <h4 class="name">Heeum</h4> 
            <h5 class="slogan">BLOOMING THEIR HOPES WITH YOU</h4>
        </div>
      <p class="news">2012 (사)정신대할머니와 함께하는 시민모임과 고려대 Enacts Blooming Project 희움 런칭 <br> 2013 환경재단 '2013 세상을 밝게 만든 사람들' 수상</p>
    </div>/content -->

    <div data-role="footer" data-id="foo1" data-position="fixed" data-fullscreen="true">
        <div data-role="navbar">
            <ul>
                <li><a href="/main.php" data-prefetch="true" data-icon="home" class="ui-btn-active ui-state-persist" >홈</a></li>
                <li><a href="/html/follow.html" data-prefetch="true" data-icon="star">팔로우</a></li>
                <li><a href="/html/notification.html" data-prefetch="true" data-icon="mail">알림</a></li>
                <li><a href="/html/search.html" data-prefetch="true" data-icon="search">탐색</a></li>
                <li><a href="/html/mypage.html" data-prefetch="true" data-icon="user">마이페이지</a></li>
            </ul>
         </div><!-- /navbar -->
     </div><!-- /footer -->
</div>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="/js/taleline.js"> </script>
</body>
</html>