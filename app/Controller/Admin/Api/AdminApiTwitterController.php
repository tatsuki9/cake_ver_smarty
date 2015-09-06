<?php
/*
	twitterAPI
*/

// OAuthライブラリの読み込み
require VENDOR."twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

class AdminApiTwitterController extends AppController{

    public $viewClass = 'Smarty';
    // public $helpers = array('Html','Form');
    public $consumerKey = "PMNHxmq1ZdGYGjUz8RaG771GP";
    public $consumerSecret = "paIoxuq3rmexxe6k4n6NYY4KcpjPz7smwzbj3ChyxST5Mg4d7q";
    public $accessToken = "2426693910-iZrVFgeFXhvNVYtKB0MCovPUjrHHSPH4wmeOY7a";
    public $accessTokenSecret = "X8i369a4WYBfLAstnZq5O0oeYWBSfrASRJh2fz4Hu7Ac8";

    public function index()
    {
        return NULL;
    }

    // ホームタイムライン取得
    public function home_timeline()
    {
        // 入力取得
        $count = $this->get_posted_params('count');

		// 接続
		$connection = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessTokenSecret);

    	//　一般ユーザーのタイムライン取得
		$home_timeline = $connection->get("statuses/home_timeline", array("count" => $count));

		if(is_null($home_timeline))
		{
	        $this->set(array(
	            'message' => "API制限がかかった可能性があります\n",
	        ));
	        return NULL;
		}

		$datas = array();
		foreach ($home_timeline as $timeline) {
			$datas[] = array(
				"profile_image_url" => $timeline->user->profile_image_url,
				"name"              => $timeline->user->name,
				"screen_name"       => $timeline->user->screen_name,
				"description"       => $timeline->user->description,
				"tweet_num"         => $timeline->user->statuses_count,
				"follow_num"        => $timeline->user->friends_count,
				"follower_num"      => $timeline->user->followers_count,
			);
		}

        $this->set(array(
            'datas' => $datas,
        ));

        return NULL;
    }

    // ユーザータイムライン取得
    public function user_timeline()
    {
        // 入力取得
        $screen_name = $this->get_posted_params('screen_name');
        $count       = $this->get_posted_params('count');

		// 接続
		$connection = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessTokenSecret);

    	// 指定ユーザーのタイムライン取得
		$user_timeline = $connection->get("statuses/user_timeline", array("screen_name" => $screen_name,"count" => $count));

		if(is_null($user_timeline))
		{
	        $this->set(array(
	            'message' => "API制限がかかったか、ユーザーが存在しない可能性があります\n",
	        ));
	        return NULL;
		}

		$datas = array();
		foreach ($user_timeline as $timeline) {
			$datas[] = array(
				"profile_image_url" => $timeline->user->profile_image_url,
				"name"              => $timeline->user->name,
				"screen_name"       => $timeline->user->screen_name,
				"description"       => $timeline->user->description,
				"tweet_num"         => $timeline->user->statuses_count,
				"follow_num"        => $timeline->user->friends_count,
				"follower_num"      => $timeline->user->followers_count,
			);
		}

        $this->set(array(
            'datas' => $datas,
        ));

        return NULL;
    }

    // 指定ユーザーのフォロワーリスト取得
    public function get_follower_list()
    {
        // 入力取得
        $screen_name = $this->get_posted_params('screen_name');
        $count       = $this->get_posted_params('count',0);

		// 接続
		$connection = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessTokenSecret);

		// フォロワーリスト取得
		$follower_list = $connection->get("followers/list", array("screen_name" => $screen_name,"count" => $count));

		if(is_null($follower_list))
		{
	        $this->set(array(
	            'message' => "API制限がかかったか、ユーザーが存在しない可能性があります\n",
	        ));
	        return NULL;
		}

		$datas = array();
		foreach ($follower_list->users as $follower) {
			$datas[] = array(
				"user_id"           => $follower->id,				
				"profile_image_url" => $follower->profile_image_url,
				"name"              => $follower->name,
				"screen_name"       => $follower->screen_name,
				"description"       => $follower->description,
				"tweet_num"         => $follower->statuses_count,
				"follow_num"        => $follower->friends_count,
				"follower_num"      => $follower->followers_count,
			);
		}

        $this->set(array(
            'datas' => $datas,
        ));

        return NULL;
    }

    // ダイレクトメッセージ送信準備
    public function post_direct_message()
    {
        // 入力取得
        $user_id           = $this->get_posted_params('user_id');
        $profile_image_url = $this->get_posted_params('profile_image_url');
        $name              = $this->get_posted_params('name');
        $direct_message    = $this->get_posted_params('direct_message');

        // 実行フラグチェック
        if($this->is_execute_mode())
        {
        	$this->send_direct_message($user_id,$direct_message);
        	return NULL;
        }

        $error_message=NULL;
        if(is_null($direct_message) || strlen($direct_message)==0)
        {
        	$error_message .= "メッセージが空です\n";
        }

        if(is_null($user_id))
        {
        	$error_message .= "ユーザーIDが取得できませんでした\n";
        }

        if(!is_null($error_message))
        {
        	$this->set(array(
        		'error_message' => $error_message,
        	));

        	return NULL;
        }

        // 送信パラメータ
        $data = array(
        	'user_id'           => $user_id,
        	'profile_image_url' => $profile_image_url,
        	'name'              => $name,
        	'direct_message'    => $direct_message,
        );

        $this->set(array(
        	'message' => "以下の内容でダイレクトメッセージを送信しますがよろしいですか?\n",
        	'data'    => $data,
        ));

        return NULL;
    }

    // ツイート投稿準備
    public function post_tweet()
    {
        // 入力取得
        $tweet = $this->get_posted_params('tweet');

        // 実行フラグチェック
        if($this->is_execute_mode())
        {
        	$this->exec_tweet($tweet);
        	return NULL;
        }

        $error_message=NULL;
        if(is_null($tweet) || strlen($tweet)==0)
        {
        	$error_message .= "ツイート内容が空です\n";
        }

        if(!is_null($error_message))
        {
        	$this->set(array(
        		'error_message' => $error_message,
        	));

        	return NULL;
        }

        // 送信パラメータ
        $data = array(
        	'tweet' => $tweet,
        );

        $this->set(array(
        	'message' => "以下の内容でツイートを投稿しますがよろしいですか?\n",
        	'data'    => $data,
        ));


    	return NULL;
    }

    // ツイート検索
    public function search_tweet()
    {
        // 入力取得
        $word = $this->get_posted_params('word');
        $lang  = $this->get_posted_params('lang');
        $count = $this->get_posted_params('count');
        $date  = $this->get_posted_params('date');

        $message=NULL;
        if(is_null($word) || strlen($word)==0)
        {
        	$message .= "メッセージが空です\n";
        }

        if(is_null($lang))
        {
        	$message .= "取得言語が取得できませんでした\n";
        }

        if(is_null($count))
        {
        	$message .= "取得件数を入力してください\n";
        }

        if(is_null($date))
        {
        	$message .= "日時(YYYY-MM-DD)を入力してください\n";
        }

        if(!is_null($message))
        {
        	$this->set(array(
        		'message' => $message,
        	));

        	return NULL;
        }

 		// 接続
		$connection = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessTokenSecret);

    	// ツイート検索実行
		$results = $connection->get("search/tweets", array(
			"q"      => $word,
			"lang"   => $lang,
			"locale" => $lang,
			"count"  => $count,
			"until"  => $date,
		));

		if(is_null($results))
		{
	        $this->set(array(
	            'message' => "API制限がかかったか、ユーザーが存在しない可能性があります\n",
	        ));
	        return NULL;
		}

		$datas=array();
		foreach ($results->statuses as $result) {	
			$datas[] = array(
				"user_id"           => $result->user->id,				
				"profile_image_url" => $result->user->profile_image_url,
				"name"              => $result->user->name,
				"screen_name"       => $result->user->screen_name,
				"description"       => $result->user->description,
				"tweet_num"         => $result->user->statuses_count,
				"follow_num"        => $result->user->friends_count,
				"follower_num"      => $result->user->followers_count,
				"text"              => $result->text,
			);
		}

        $this->set(array(
        	"datas" => $datas, 
        ));

        return NULL;
    }

    //　ダイレクトメッセージ送信実行
    protected function send_direct_message($user_id,$direct_message)
    {
        $error_message=NULL;
        if(is_null($direct_message) || strlen($direct_message)==0)
        {
        	$error_message .= "メッセージが空です\n";
        }

        if(is_null($user_id))
        {
        	$error_message .= "ユーザーIDが取得できませんでした\n";
        }

        if(!is_null($error_message))
        {
        	$this->set(array(
        		'error_message' => $error_message,
        	));

        	return NULL;
        }

 		// 接続
		$connection = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessTokenSecret);

    	// ダイレクトメッセージ送信実行
		$result = $connection->post("direct_messages/new", array(
			"user_id" => $user_id,
			"text"    => $direct_message,
		));

		if(is_null($result))
		{
	        $this->set(array(
	            'message' => "API制限がかかったか、ユーザーが存在しない可能性があります\n",
	            'succeed' => false,
	        ));
	        return NULL;
		}

        $this->set(array(
        	'message' => "送信完了しました\n",
        	'succeed'  => true,
        ));

    	return NULL;
    }

    // ツイート投稿実行
    protected function exec_tweet($tweet)
    {
        $error_message=NULL;
        if(is_null($tweet) || strlen($tweet)==0)
        {
        	$error_message .= "ツイート内容が空です\n";
        }

        if(!is_null($error_message))
        {
        	$this->set(array(
        		'error_message' => $error_message,
        	));

        	return NULL;
        }

		// 接続
		$connection = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessTokenSecret);

    	// ツイート投稿
		$result = $connection->post("statuses/update", array(
			"status" => $tweet,
		));

		if(is_null($result))
		{
	        $this->set(array(
	            'message' => "API制限がかかったか、ユーザーが存在しない可能性があります\n",
	            'succeed' => false,
	        ));
	        return NULL;
		}

        $this->set(array(
        	'message' => "送信完了しました\n",
        	'succeed'  => true,
        ));

		return NULL;    	
    }
}