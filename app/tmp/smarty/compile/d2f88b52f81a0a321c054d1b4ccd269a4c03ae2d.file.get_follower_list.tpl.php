<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-07 17:06:56
         compiled from "/Applications/MAMP/htdocs/repos/app/View/Admin/Api/AdminApiTwitter/get_follower_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175079190655744b4e04acb6-91457033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2f88b52f81a0a321c054d1b4ccd269a4c03ae2d' => 
    array (
      0 => '/Applications/MAMP/htdocs/repos/app/View/Admin/Api/AdminApiTwitter/get_follower_list.tpl',
      1 => 1433689614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175079190655744b4e04acb6-91457033',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55744b4e1dd5e2_95547130',
  'variables' => 
  array (
    'message' => 0,
    'datas' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55744b4e1dd5e2_95547130')) {function content_55744b4e1dd5e2_95547130($_smarty_tpl) {?><?php if (!is_callable('smarty_function_wrap_template')) include '/Applications/MAMP/htdocs/repos/app/Vendor/smarty/plugins/function.wrap_template.php';
?><?php echo smarty_function_wrap_template(array('file'=>"plain",'title'=>"ログイン"),$_smarty_tpl);?>


<h2>フォロワーリスト取得結果</h2>

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
		<div>
			ダイレクトメッセージ
			<form method="post" action="/repos/admin_api_twitter/post_direct_message">
				<input type="text"   name="direct_message" id="direct_message">
				<input type="hidden" name="profile_image_url" id="profile_image_url" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['profile_image_url'];?>
">
				<input type="hidden" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
">
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
">
				 <input type="submit" value="送信確認">
			</form>
		</div>
	<?php } ?>
<?php }?>
<?php }} ?>
