<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-09 18:48:05
         compiled from "/Applications/MAMP/htdocs/repos/app/View/Admin/Api/AdminApiTwitter/post_direct_message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:256847188557456db05de58-92980151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bd26e013a83e99311d75f0276680205415fc541' => 
    array (
      0 => '/Applications/MAMP/htdocs/repos/app/View/Admin/Api/AdminApiTwitter/post_direct_message.tpl',
      1 => 1433868447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '256847188557456db05de58-92980151',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_557456db0fbea8_46687658',
  'variables' => 
  array (
    'message' => 0,
    'succeed' => 0,
    'data' => 0,
    'error_message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557456db0fbea8_46687658')) {function content_557456db0fbea8_46687658($_smarty_tpl) {?><?php if (!is_callable('smarty_function_wrap_template')) include '/Applications/MAMP/htdocs/repos/app/Vendor/smarty/plugins/function.wrap_template.php';
?><?php echo smarty_function_wrap_template(array('file'=>"plain",'title'=>"ログイン"),$_smarty_tpl);?>


<h2>ダイレクトメッセージ送信確認</h2>

<?php if ($_smarty_tpl->tpl_vars['message']->value) {?>
	
	<span color="red"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</span>
	<?php if (!isset($_smarty_tpl->tpl_vars['succeed']->value)) {?>
			
		<div>
			<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['profile_image_url'];?>
" />
		</div>
		<div>
			名前 <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>

		</div>
		<div>
			メッセージ内容<br>
			<form>
				<input type="direct_message" name="direct_message" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['direct_message'];?>
" readonly>
			</form>
		</div>		
		<div>		
			<form method="post" action="/repos/admin_api_twitter/post_direct_message">
				<input type="hidden" name="direct_message" id="direct_message" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['direct_message'];?>
">
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
">
				<input type="hidden" name="exec" id="exec" value="1">
				<input type="submit" value="送信">
			</form>
		</div>
	<?php } else { ?>
		<div>
			<a href="/repos/admin_api_twitter">戻る</a>
		</div>
	<?php }?>
<?php } else { ?>
	
	<span color="red"><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
</span>
<?php }?><?php }} ?>
