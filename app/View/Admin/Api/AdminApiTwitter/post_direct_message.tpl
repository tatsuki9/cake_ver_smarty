{wrap_template file="plain" title="ログイン"}

<h2>ダイレクトメッセージ送信確認</h2>

{if $message}
	{* 成功時とAPI制限がかかったとき *}
	<span style="color:red">{$message}</span>
	{if !isset($succeed)}
		{* 確認時 *}	
		<div>
			<img src="{$data.profile_image_url}" />
		</div>
		<div>
			名前 {$data.name}
		</div>
		<div>
			メッセージ内容<br>
			<form>
				<input type="direct_message" name="direct_message" value="{$data.direct_message}" readonly>
			</form>
		</div>		
		<div>		
			<form method="post" action="/repos/admin_api_twitter/post_direct_message">
				<input type="hidden" name="direct_message" id="direct_message" value="{$data.direct_message}">
				<input type="hidden" name="user_id" id="user_id" value="{$data.user_id}">
				<input type="hidden" name="exec" id="exec" value="1">
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