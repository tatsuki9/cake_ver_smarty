<?php
class LogicAccount {

	// ソルト生成
	static function generate_password_salt()
	{
		return LogicToken::generate(16);
	}

	// ハッシュ値生成
	static function generate_password_hash($salt,$password)
	{
		return sha1($salt.":".$password);
	}

}