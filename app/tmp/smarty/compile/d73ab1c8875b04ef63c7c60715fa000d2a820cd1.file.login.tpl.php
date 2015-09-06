<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-01 17:01:54
         compiled from "/Applications/MAMP/htdocs/repos/app/View/Admins/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1638827407556224a5e89f49-71101448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd73ab1c8875b04ef63c7c60715fa000d2a820cd1' => 
    array (
      0 => '/Applications/MAMP/htdocs/repos/app/View/Admins/login.tpl',
      1 => 1433170906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1638827407556224a5e89f49-71101448',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_556224a5f14c68_80202192',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556224a5f14c68_80202192')) {function content_556224a5f14c68_80202192($_smarty_tpl) {?><?php if (!is_callable('smarty_function_wrap_template')) include '/Applications/MAMP/htdocs/repos/app/Vendor/smarty/plugins/function.wrap_template.php';
?><?php echo smarty_function_wrap_template(array('file'=>"standard_menu",'title'=>"管理画面"),$_smarty_tpl);?>


<a href="/repos/admin/api/twitter">facebookネットワーク検証</a>
<a href="/repos/admin/execute">twitterネットワーク検証</a>
<a href="/repos/admin/execute">テスト1</a>
<a href="/repos/admin/execute">テスト2</a><?php }} ?>
