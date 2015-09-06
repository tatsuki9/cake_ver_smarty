<?php
class LogicToken {

	// ソルト生成
	static function generate($len)
	{
		$src = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		$slen = strlen($src);
		$salt = "";

		for ($i=0; $i < $len; $i++) 
		{ 
			$n = rand(0,$slen - 1);
			$salt .= substr($src,$n,1);
		}
		return $salt;
	}

}