<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-07 15:46:42
         compiled from "/Applications/MAMP/htdocs/repos/app/View/Admin/Api/AdminApiTwitter/home_timeline.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21101381425573d5fda8c239-53414643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '605ed0712fc55895cb26e1030700f39535e55a71' => 
    array (
      0 => '/Applications/MAMP/htdocs/repos/app/View/Admin/Api/AdminApiTwitter/home_timeline.tpl',
      1 => 1433656449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21101381425573d5fda8c239-53414643',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5573d5fdb59563_45640924',
  'variables' => 
  array (
    'message' => 0,
    'datas' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5573d5fdb59563_45640924')) {function content_5573d5fdb59563_45640924($_smarty_tpl) {?><?php if (!is_callable('smarty_function_wrap_template')) include '/Applications/MAMP/htdocs/repos/app/Vendor/smarty/plugins/function.wrap_template.php';
?><?php echo smarty_function_wrap_template(array('file'=>"plain",'title'=>"ログイン"),$_smarty_tpl);?>


<h2>ホームタイムライン取得結果</h2>

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
<?php }?><?php }} ?>
