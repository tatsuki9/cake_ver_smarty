{wrap_template file="standard_menu" title="twitterネットワーク検証"}

<h2>ホームタイムライン取得</h2>
<div style="width: 70px">
	<form method="post" action="/repos/admin_api_twitter/home_timeline">
		<div>取得数は</div>
			<input type="text" name="count" id="count" />

		<input type="submit" value="送信">
	</form>
</div>

<h2>ユーザータイムライン取得</h2>
<div style="width: 250px">
	<form method="post" action="/repos/admin_api_twitter/user_timeline">
		<div>Twitter名を入力してください</div>
			<input type="text" name="screen_name" id="screen_name" value="@"/>

		<div>取得数は</div>
			<input type="text" name="count" id="count" />

		<input type="submit" value="送信">
	</form>
</div>

<h2>フォロワーリスト取得</h2>
<div style="width: 250px">
	<form method="post" action="/repos/admin_api_twitter/get_follower_list">
		<div>Twitter名を入力してください</div>
			<input type="text" name="screen_name" id="screen_name" value="@"/>

		<div>取得数は</div>
			<input type="text" name="count" id="count" />

		<input type="submit" value="送信">
	</form>
</div>

<h2>ツイッター投稿</h2>
<div style="width: 250px">
	<form method="post" action="/repos/admin_api_twitter/post_tweet">
		<div>投稿内容を入力してください</div>
			<input type="text" name="tweet" id="tweet" value=""/>

		<input type="submit" value="送信">
	</form>
</div>

<h2>ツイート検索</h2>
<div style="width: 250px">
	<form method="post" action="/repos/admin_api_twitter/search_tweet">
		<div>検索キーワードを入力してください</div>
			<input type="text" name="word" id="word" value=""/>
		<div>対象地域を入力してください</div>
			<select name="lang">
				<option value="ja">ja</option>
				<option value="en">en</option>
			</select>
		<div>取得件数は</div>
			<input type="text" name="count" id="count" />
		<div>日時フィルタ</div>
			<input type="date" name="date" min="2012-01-01" max="2025-01-01" />
		<div><input type="submit" value="送信"></div>
	</form>
</div>
