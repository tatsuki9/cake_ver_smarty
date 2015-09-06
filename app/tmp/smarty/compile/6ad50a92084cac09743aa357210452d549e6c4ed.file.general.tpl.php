<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-30 18:20:15
         compiled from "/Applications/MAMP/htdocs/repos/app/template/admin/wrap/general.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77567496455615d5b3a96c8-59663692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ad50a92084cac09743aa357210452d549e6c4ed' => 
    array (
      0 => '/Applications/MAMP/htdocs/repos/app/template/admin/wrap/general.tpl',
      1 => 1433002813,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77567496455615d5b3a96c8-59663692',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_55615d5b3d1fb7_73009508',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55615d5b3d1fb7_73009508')) {function content_55615d5b3d1fb7_73009508($_smarty_tpl) {?><?php if (!is_callable('smarty_function_include_css')) include '/Applications/MAMP/htdocs/repos/app/Vendor/smarty/plugins/function.include_css.php';
if (!is_callable('smarty_function_inner_template')) include '/Applications/MAMP/htdocs/repos/app/Vendor/smarty/plugins/function.inner_template.php';
?><!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8" />
		<?php echo smarty_function_include_css(array('file'=>"common"),$_smarty_tpl);?>

		<?php echo '<script'; ?>
 src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"><?php echo '</script'; ?>
>
	</head>
</html>
<?php echo smarty_function_inner_template(array(),$_smarty_tpl);?>
<?php }} ?>
