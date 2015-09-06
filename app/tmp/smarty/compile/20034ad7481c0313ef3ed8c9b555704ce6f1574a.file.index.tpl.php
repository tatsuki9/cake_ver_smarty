<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-07 06:47:40
         compiled from "/Applications/MAMP/htdocs/repos/app/View/Admin/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:548184117556c7c25c36213-85036681%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20034ad7481c0313ef3ed8c9b555704ce6f1574a' => 
    array (
      0 => '/Applications/MAMP/htdocs/repos/app/View/Admin/index.tpl',
      1 => 1433607243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '548184117556c7c25c36213-85036681',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_556c7c25e80839_08317249',
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556c7c25e80839_08317249')) {function content_556c7c25e80839_08317249($_smarty_tpl) {?><?php if (!is_callable('smarty_function_wrap_template')) include '/Applications/MAMP/htdocs/repos/app/Vendor/smarty/plugins/function.wrap_template.php';
?><?php echo smarty_function_wrap_template(array('file'=>"plain",'title'=>"ログイン"),$_smarty_tpl);?>


<div style="width: 320px;">
	<p>ログインページ　サンプル<p>
	<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

	<div style="width: 230px; margin: 0px auto;">
		<form method="get" action="/repos/admin/">
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

<?php echo '<script'; ?>
>
	$("#login_id").focus();
<?php echo '</script'; ?>
><?php }} ?>
