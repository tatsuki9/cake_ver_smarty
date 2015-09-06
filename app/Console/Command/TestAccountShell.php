<?php
/*
	アカウントモデルへの接続テスト
*/

class TestAccountShell extends AppShell{

	// 使用するモデル
	public $uses = array('Account');

	public function main()
	{
		// 入力取得
		list($params,$args) = $this->parse_args($this->args);

		$login_id = $this->take_param_str($params,"login_id");
		$password = $this->take_param_str($params,"password"); 

		$message = NULL;
		if(is_null($login_id))
		{
			$message .= "IDを入力してください\n";
		}
		if(is_null($password))
		{
			$message .= "パスワードを入力してください\n";
		}

		if(!is_null($message))
		{
			echo $message;
			return 0;
		}

		$this->Account->register(array(
			'login_id' => $login_id,
			'password' => $password,
		));

		printf("データベースへの登録が完了しました\n");

		return 0;
	}
}
