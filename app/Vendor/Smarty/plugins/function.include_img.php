<?php
/*
 */
function smarty_function_include_img($params, &$template)
{
    // パス決定
    $file = $params['file'];
    unset($params['file']);
    $path_for_img = $template->webroot.'img'.DS.$file;

    return '<img src="'.$path_for_img.'" />';
}