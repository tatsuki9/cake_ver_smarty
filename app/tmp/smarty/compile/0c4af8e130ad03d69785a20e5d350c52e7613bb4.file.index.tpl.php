<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-10 23:44:49
         compiled from "/Applications/MAMP/htdocs/repos/app/View/Admin/Api/AdminApiTwitter/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6972523135573d503acdb88-87253418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c4af8e130ad03d69785a20e5d350c52e7613bb4' => 
    array (
      0 => '/Applications/MAMP/htdocs/repos/app/View/Admin/Api/AdminApiTwitter/index.tpl',
      1 => 1433971747,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6972523135573d503acdb88-87253418',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5573d503eb7110_58125703',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5573d503eb7110_58125703')) {function content_5573d503eb7110_58125703($_smarty_tpl) {?><?php if (!is_callable('smarty_function_wrap_template')) include '/Applications/MAMP/htdocs/repos/app/Vendor/smarty/plugins/function.wrap_template.php';
?><?php echo smarty_function_wrap_template(array('file'=>"standard_menu",'title'=>"twitterネットワーク検証"),$_smarty_tpl);?>


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
<?php }} ?>
