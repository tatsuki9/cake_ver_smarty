{wrap_template file="plain" title="ログイン"}

<h2>フォロワーリスト取得結果</h2>

{if $message}
	<span style="color:red">{$message}</span>
{else}
	{foreach from=$datas item=data}
		<div>
			<img src="{$data.profile_image_url}" />
		</div>
		<div>
			名前 {$data.name}
		</div>
		<div>
			twitter名　{$data.screen_name}
		</div>
		<div>
			自己紹介 {$data.description}
		</div>
		<div>
			ツイート数 {$data.tweet_num}
		</div>
		<div>
			フォロー数 {$data.follow_num}
		</div>
		<div>
			フォロワー数 {$data.follower_num}
		</div>
		<div>
			ダイレクトメッセージ
			<form method="post" action="/repos/admin_api_twitter/post_direct_message">
				<input type="text"   name="direct_message" id="direct_message">
				<input type="hidden" name="profile_image_url" id="profile_image_url" value="{$data.profile_image_url}">
				<input type="hidden" name="name" id="name" value="{$data.name}">
				<input type="hidden" name="user_id" id="user_id" value="{$data.user_id}">
				 <input type="submit" value="送信確認">
			</form>
		</div>
	{/foreach}
{/if}
