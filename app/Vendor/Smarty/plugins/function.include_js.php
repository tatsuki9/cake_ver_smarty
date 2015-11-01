<?php
/*
 */
function smarty_function_include_js($params, &$template)
{
    // パス決定
    $file = $params['file'];

    if(empty($file))
    {
	    return;
    }
    unset($params['file']);

    $path_for_js = $template->webroot.'js'.DS.$file;

    return '<script src="'.$path_for_js.'"></script>';
}