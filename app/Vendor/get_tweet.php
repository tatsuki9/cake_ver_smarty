<?php

// OAuthライブラリの読み込み
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

//認証情報４つ
$consumerKey = "PMNHxmq1ZdGYGjUz8RaG771GP";
$consumerSecret = "paIoxuq3rmexxe6k4n6NYY4KcpjPz7smwzbj3ChyxST5Mg4d7q";
$accessToken = "2426693910-iZrVFgeFXhvNVYtKB0MCovPUjrHHSPH4wmeOY7a";
$accessTokenSecret = "X8i369a4WYBfLAstnZq5O0oeYWBSfrASRJh2fz4Hu7Ac8";

//接続
$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

//ツイート
$res = $connection->post("statuses/update", array("status" => "テストメッセージ"));

