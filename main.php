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
    	<h2 class="page-title">NEWS FEED</h2>
    </div>

<?php
require "libs/vendor/autoload.php";
require "libs/TwitterConfig.php";
use Abraham\TwitterOAuth\TwitterOAuth;

session_start();

$access_token = $_SESSION['access_token'];

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

$statuses = $connection->get("search/tweets", array("q" => "#taleline"));

foreach ($statuses->statuses as $element){
    $user_name = $element->user->name;
    $profile_image = $element->user->profile_image_url;
    $tweet_text = $element->text;
    
    echo "<ul>";
    echo "<div class=\"container\" data-role=\"content\">";
    echo "<div class=\"profile\">";
    echo "<img class=\"thumnail\" src=\"".$profile_image."\" alt=\"\" />";
    echo "<a herf=\"http://twitter.com/$user_name\" class=\"name\">@$user_name</a>";
//    echo "<h5 class=\"slogan\">This is slogan</h5>";
    echo "</div>";
    echo "<div>";
    echo "<p class=\"news\">$tweet_text</p>";
    echo "</div>";
    echo "</div>";
    echo "</ul>";   
}

?>
   
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
