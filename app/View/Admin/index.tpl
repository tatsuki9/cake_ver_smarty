{wrap_template file="plain" title="ログイン"}

<div style="width: 320px;">
	<p>ログインページ　サンプル<p>
	{$message}
	<div style="width: 230px; margin: 0px auto;">
		<form method="get" action="/cake_ver_smarty/admin/">
			<div>ログインID</div>
			<input type="text" name="login_id" id="login_id" />
			<div>パスワード</div>		
			<input type="text" name="password" id="password" />

			<div style="margin: 5px 113px;">
				<input type="hidden" name="exec" value="1" />
				<input type="submit" />
			</div>
		</form>
	</div>
</div>

<script>
	$("#login_id").focus();
</script>