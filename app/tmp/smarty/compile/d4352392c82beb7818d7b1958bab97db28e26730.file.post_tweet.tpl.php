<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-09 18:48:13
         compiled from "/Applications/MAMP/htdocs/repos/app/View/Admin/Api/AdminApiTwitter/post_tweet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1482246187557715880571f3-04271910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4352392c82beb7818d7b1958bab97db28e26730' => 
    array (
      0 => '/Applications/MAMP/htdocs/repos/app/View/Admin/Api/AdminApiTwitter/post_tweet.tpl',
      1 => 1433868460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1482246187557715880571f3-04271910',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_557715882429d6_70800576',
  'variables' => 
  array (
    'message' => 0,
    'succeed' => 0,
    'data' => 0,
    'error_message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557715882429d6_70800576')) {function content_557715882429d6_70800576($_smarty_tpl) {?><?php if (!is_callable('smarty_function_wrap_template')) include '/Applications/MAMP/htdocs/repos/app/Vendor/smarty/plugins/function.wrap_template.php';
?><?php echo smarty_function_wrap_template(array('file'=>"plain",'title'=>"ログイン"),$_smarty_tpl);?>


<h2>ツイート送信確認</h2>

<?php if ($_smarty_tpl->tpl_vars['message']->value) {?>
	
	<span color="red"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</span>
	<?php if (!isset($_smarty_tpl->tpl_vars['succeed']->value)) {?>
			
		<div>
			ツイート内容<br>
			<?php echo $_smarty_tpl->tpl_vars['data']->value['tweet'];?>

		</div>
		<div>		
			<form method="post" action="/repos/admin_api_twitter/post_tweet">
				<input type="hidden" name="tweet" id="tweet" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tweet'];?>
">
				<input type="hidden" name="exec"  id="exec" value="1">
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
