{wrap_template file="plain" title="ログイン"}

<h2>ユーザータイムライン取得結果</h2>

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
	{/foreach}
{/if}
