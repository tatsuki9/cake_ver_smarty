<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-07 08:05:20
         compiled from "/Applications/MAMP/htdocs/repos/app/View/Admin/Api/AdminApiTwitter/user_timeline.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13412073685573de1dca7a79-82894659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e94067b2e9751111b5d9e5d71116f7b32a9f253' => 
    array (
      0 => '/Applications/MAMP/htdocs/repos/app/View/Admin/Api/AdminApiTwitter/user_timeline.tpl',
      1 => 1433657116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13412073685573de1dca7a79-82894659',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5573de1dd10666_33117278',
  'variables' => 
  array (
    'message' => 0,
    'datas' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5573de1dd10666_33117278')) {function content_5573de1dd10666_33117278($_smarty_tpl) {?><?php if (!is_callable('smarty_function_wrap_template')) include '/Applications/MAMP/htdocs/repos/app/Vendor/smarty/plugins/function.wrap_template.php';
?><?php echo smarty_function_wrap_template(array('file'=>"plain",'title'=>"ログイン"),$_smarty_tpl);?>


<h2>ユーザータイムライン取得結果</h2>

<?php if ($_smarty_tpl->tpl_vars['message']->value) {?>
	<span color="red"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</span>
<?php } else { ?>
	<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
?>
	<div>
		<img src="<?php echo $_smarty_tpl->tpl_vars['data']->value['profile_image_url'];?>
" />
	</div>
	<div>
		名前 <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>

	</div>
	<div>
		twitter名　<?php echo $_smarty_tpl->tpl_vars['data']->value['screen_name'];?>

	</div>
	<div>
		自己紹介 <?php echo $_smarty_tpl->tpl_vars['data']->value['description'];?>

	</div>
	<div>
		ツイート数 <?php echo $_smarty_tpl->tpl_vars['data']->value['tweet_num'];?>

	</div>
	<div>
		フォロー数 <?php echo $_smarty_tpl->tpl_vars['data']->value['follow_num'];?>

	</div>
	<div>
		フォロワー数 <?php echo $_smarty_tpl->tpl_vars['data']->value['follower_num'];?>

	</div>
	<?php } ?>
<?php }?>
<?php }} ?>
