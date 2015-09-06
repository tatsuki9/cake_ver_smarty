<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-30 17:44:41
         compiled from "/Applications/MAMP/htdocs/repos/app/View/Admins/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:197150161955615d5ab8ec01-11677555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '931387123d4be8a69c07f80494e7a71b418d2ea2' => 
    array (
      0 => '/Applications/MAMP/htdocs/repos/app/View/Admins/index.tpl',
      1 => 1433000671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197150161955615d5ab8ec01-11677555',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55615d5ad97ef1_98294762',
  'variables' => 
  array (
    'message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55615d5ad97ef1_98294762')) {function content_55615d5ad97ef1_98294762($_smarty_tpl) {?><?php if (!is_callable('smarty_function_wrap_template')) include '/Applications/MAMP/htdocs/repos/app/Vendor/smarty/plugins/function.wrap_template.php';
?><?php echo smarty_function_wrap_template(array('file'=>"plain",'title'=>"ログイン"),$_smarty_tpl);?>


<div style="width: 320px;">
	<p>ログインページ　サンプル<p>
	<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

	<div style="width: 230px; margin: 0px auto;">
		<form method="get" action="/repos/Admins/">
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
