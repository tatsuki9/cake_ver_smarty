<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-06-07 11:10:18
         compiled from "/Applications/MAMP/htdocs/repos/app/View/Admin/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:966083599556c7d790a7ea3-03468160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fce021ac415cce55f54f818822e0e19039e42db2' => 
    array (
      0 => '/Applications/MAMP/htdocs/repos/app/View/Admin/login.tpl',
      1 => 1433668216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '966083599556c7d790a7ea3-03468160',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_556c7d79110ac1_07617242',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556c7d79110ac1_07617242')) {function content_556c7d79110ac1_07617242($_smarty_tpl) {?><?php if (!is_callable('smarty_function_wrap_template')) include '/Applications/MAMP/htdocs/repos/app/Vendor/smarty/plugins/function.wrap_template.php';
?><?php echo smarty_function_wrap_template(array('file'=>"standard_menu",'title'=>"管理画面"),$_smarty_tpl);?>


<a href="/repos/admin/api/facebook">facebookネットワーク検証</a>
<a href="/repos/admin_api_twitter">twitterネットワーク検証</a>
<a href="/repos/admin/execute">テスト1</a>
<a href="/repos/admin/execute">テスト2</a><?php }} ?>
