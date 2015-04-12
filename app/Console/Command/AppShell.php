<?php
/**
 * AppShell file
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         CakePHP(tm) v 2.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Shell', 'Console');

/**
 * Application Shell
 *
 * Add your application-wide methods in the class below, your shells
 * will inherit them.
 *
 * @package       app.Console.Command
 */
class AppShell extends Shell {

	// 引数解釈
	function parse_args($input_args)
	{
		// 結果格納用
		$params = array();
		$args   = array();

		foreach($input_args as $arg)
		{
			if(preg_match("!^([a-zA-Z_][a-zA-Z0-9_]*)=(.*)$!",$arg,$m))
			{
				// $f = $m[1];
				$k = $m[1];
				$v = $m[2];

				// 同じ引数名を指定している場合
				if(array_key_exists($k,$params))
				{
					if(is_array($params[$k]))
					{
						// 2回目以降
						$params[$k][] = $v;
					}
					else
					{
						// 配列化(2回目)
						$params[$k] = array($params,$v);
					}
				}
				else
				{
					// 1回目
					$params[$k] = $v;
				}
			}
			else
			{
				//　ひとまず与えられた引数はそのまんま返しとく？	
				$args[] = $arg;
			}
		}

		return array($params,$args);

	}

	// 入力取得(整数)
	function take_param_int($params,$key,$default=NULL)
	{
		if(!array_key_exists($key,$params) || is_null($params[$key]))
		{
			return $default;
		}

		return intval($params[$key]);
	}

	// 入力取得(文字列)
	function take_param_str($params,$key,$default=NULL)
	{
		if(!array_key_exists($key,$params) || is_null($params[$key]))
		{
			return $default;
		}

		return strval($params[$key]);
	}
}
