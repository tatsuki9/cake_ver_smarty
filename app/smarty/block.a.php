<?php

/*
	リンクタグ生成
*/

function smarty_block_a($params,$content,&$smarty,&$repeat)
{
	if($repeat)
	{
		return "";
	}

	$url = $params['href'];

	return sprintf("<a href=%s>%s</a>",$url,$content);
}