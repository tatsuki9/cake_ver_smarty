<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-07 06:49:29
         compiled from "/Applications/MAMP/htdocs/repos/app/View/AdminApiTwitter/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18330275985573cd599d0027-13710876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5a50d276e241175ca563daeda9e81b9625d6b48' => 
    array (
      0 => '/Applications/MAMP/htdocs/repos/app/View/AdminApiTwitter/index.tpl',
      1 => 1433611988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18330275985573cd599d0027-13710876',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5573cd59bb29a8_58931622',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5573cd59bb29a8_58931622')) {function content_5573cd59bb29a8_58931622($_smarty_tpl) {?><?php if (!is_callable('smarty_function_wrap_template')) include '/Applications/MAMP/htdocs/repos/app/Vendor/smarty/plugins/function.wrap_template.php';
?><?php echo smarty_function_wrap_template(array('file'=>"standard_menu",'title'=>"twitterネットワーク検証"),$_smarty_tpl);?>


<h2>ホームタイムライン取得</h2>
<div style="width: 70px">
	<form method="post" action="/repos/admin/api/twitter/home_timeline">
		<div>取得数は</div>
			<input type="text" name="count" id="count" />

		<input type="submit" value="送信">
	</form>
</div><?php }} ?>
