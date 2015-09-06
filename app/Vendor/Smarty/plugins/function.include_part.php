<?php
/*
    パーツファイルインクルード
 */
function smarty_function_include_part($params, &$template)
{
    // パス決定
    $file = $params["file"];
    unset($params["file"]);
    $path = $template->parts_template_dir.$file.".tpl";

    if(!file_exists($path))
    {
        printf("<br>パーツテンプレートが存在しません %s <br>",$path);
        return NULL;
    }

    // レンダリング
    $out = $template->getSubTemplate($path,NULL,NULL,NULL,NULL,NULL,Smarty::SCOPE_PARENT);

    return $out;
}
