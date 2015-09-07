<?php
/*
 */
function smarty_function_include_css($params, &$template)
{
    // パス決定
    $file = $params['file'];
    unset($params['file']);
    $path_for_css = $template->webroot.'css'.DS.$file.'.css';

    return '<link rel="STYLESHEET" href="'.$path_for_css.'" type="text/css" />';
}
