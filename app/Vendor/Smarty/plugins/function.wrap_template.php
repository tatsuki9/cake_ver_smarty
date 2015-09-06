<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFunction
 */

/**
 * Smarty {counter} function plugin
 * Type:     function<br>
 * Name:     counter<br>
 * Purpose:  print out a counter value
 *
 * @author Monte Ohrt <monte at ohrt dot com>
 * @link   http://www.smarty.net/manual/en/language.function.counter.php {counter}
 *         (Smarty online manual)
 *
 * @param array                    $params   parameters
 * @param Smarty_Internal_Template $template template object
 *
 * @return string|null
 */
function smarty_function_wrap_template($params, $template)
{
    // パス決定
    $file = $params["file"];
    unset($params["file"]);
    $path = $template->wrap_template_dir.$file.".tpl";

    ini_set('xdebug.var_display_max_children', -1);
    ini_set('xdebug.var_display_max_data', -1);
    ini_set('xdebug.var_display_max_depth', -1);

    if(!file_exists($path))
    {
        printf("<br>ラッパーテンプレートが存在しません %s <br>",$path);
        return NULL;
    }

    // ラッパーレンダリング指示
    $template->wrap_template = $path;
    $template->wrap_params   = $params;

    return NULL;
}
