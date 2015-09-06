{wrap_template file="plain" title="ログイン"}

<h2>ツイート送信確認</h2>

{if $message}
	{* 成功時とAPI制限がかかったとき *}
	<span style="color:red">{$message}</span>
	{if !isset($succeed)}
		{* 確認時 *}	
		<div>
			ツイート内容<br>
			{$data.tweet}
		</div>
		<div>		
			<form method="post" action="/repos/admin_api_twitter/post_tweet">
				<input type="hidden" name="tweet" id="tweet" value="{$data.tweet}">
				<input type="hidden" name="exec"  id="exec" value="1">
				<input type="submit" value="送信">
			</form>
		</div>
	{else}
	<div>
		<a href="/repos/admin_api_twitter">戻る</a>
	</div>
	{/if}
{else}
	{* 不正パラメータを取得したとき *}
	<span style="color:red">{$error_message}</span>
{/if}