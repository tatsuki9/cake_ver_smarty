<?php
class Account extends AppModel
{
	// 登録
	function register($params)
	{
		// クラスロード:Logicディレクトリ
		App::uses('LogicAccount', 'Logic');
		App::uses('LogicToken', 'Logic');

		// 入力取得
		$login_id = $params['login_id'];
		$password = $params['password'];

		// ソルト生成
		$password_salt = LogicAccount::generate_password_salt();

		// ハッシュ値生成
		$password_hash = LogicAccount::generate_password_hash($password_salt,$password);

		// 保存するデータの内容
		$data = array('Account' => array(
			'login_id'   => $login_id,
			"salt"       => $password_salt,
			"password"   => $password_hash,
			'updated_at' => date("Y-m-d H:i:s",time()),
			'created_at' => date("Y-m-d H:i:s",time())
		));

		// 登録する項目
		$fields = array('login_id','salt','password','updated_at','created_at');

		// 保存
		$this->save($data,false,$fields);
	}

	// ID,パスワード認証
	function authenticate($params)
	{
		// クラスロード:Logicディレクトリ
		App::uses('LogicAccount', 'Logic');
		App::uses('LogicToken', 'Logic');

		// 入力取得
		$login_id = $params['login_id'];
		$password = $params['password'];

		// 検索条件生成
		$options = array(
			'conditions' => array(
				'Account.login_id' => $login_id,
			),
		);

		// ユーザーデータ取得
		$user_info = $this->find('first',$options);

		if(is_null($user_info) || count($user_info)==0)
		{
			return false;
		}

		// ハッシュ値生成
		$password_hash = LogicAccount::generate_password_hash($user_info['Account']['salt'],$password);

		if(strcmp($password_hash, $user_info['Account']['password'])!=0)
		{
			return false;
		}

		return true;
	}
}