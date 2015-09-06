<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-06 19:33:10
         compiled from "/Applications/MAMP/htdocs/repos/app/View/Twitter/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1352954377556c7f0079ea75-51479037%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f629062cfe94e4017312ca1d56795a5a94eca8bf' => 
    array (
      0 => '/Applications/MAMP/htdocs/repos/app/View/Twitter/index.tpl',
      1 => 1433611988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1352954377556c7f0079ea75-51479037',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_556c7f007a3629_60798649',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556c7f007a3629_60798649')) {function content_556c7f007a3629_60798649($_smarty_tpl) {?><?php if (!is_callable('smarty_function_wrap_template')) include '/Applications/MAMP/htdocs/repos/app/Vendor/smarty/plugins/function.wrap_template.php';
?><?php echo smarty_function_wrap_template(array('file'=>"standard_menu",'title'=>"twitterネットワーク検証"),$_smarty_tpl);?>


<h2>ホームタイムライン取得</h2>
<div style="width: 70px">
	<form method="post" action="/repos/admin/api/twitter/home_timeline">
		<div>取得数は</div>
			<input type="text" name="count" id="count" />

		<input type="submit" value="送信">
	</form>
</div><?php }} ?>
