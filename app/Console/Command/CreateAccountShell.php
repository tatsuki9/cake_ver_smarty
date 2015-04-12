<?php
/*
	アカウント作成
*/

class CreateAccountShell extends AppShell{

	// 使用するモデル
	public $uses = array('Account');

	public function main(){

		// 入力取得
		list($params,$args) = $this->parse_args($this->args);

		$id       = $this->take_param_int($params,"id");
		$password = $this->take_param_str($params,"pass"); 

		$message = NULL;

		if(is_null($id))
		{
			$message .= "IDを入力してください¥n";
		}
		if(is_null($password))
		{
			$message .= "パスワードを入力してください¥n";
		}

		if(!is_null($message))
		{
			echo $message;
			return 0;
		}

		// 保存するデータの内容
		$data = array('Account' => array(
			'id'         => $id,
			'password'   => $password,
			'updated_at' => date("Y-m-d H:i:s",time()),
			'created_at' => date("Y-m-d H:i:s",time())
		));

		// 登録する項目
		$fields = array('id','password','updated_at','created_at');

		// データ保存
		$this->Account->save($data,false,$fields);

		printf("データベースへの登録が完了しました¥n");

		return 0;
	}
}



