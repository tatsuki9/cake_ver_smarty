<?php
/*
	ログイン画面
*/

class AdminController extends AppController{

    public $viewClass = 'Smarty';
    // public $helpers = array('Html','Form');

    public function index()
    {
        if($this->is_execute_mode())
        {
            return $this->execute();            
        }

        $this->set(array(
            'message' => NULL,
        ));

        return NULL;
    }

    public function execute()
    {
        // 入力取得
        $login_id = $this->get_posted_params('login_id');
        $password = $this->get_posted_params('password');

        if(strlen($login_id)==0 || strlen($password)==0)
        {
            $this->set(array(
                'message' => 'ログインIDまたはパスワードが未入力です',
            ));
            return NULL;
        }

        // モデルをロード
        $this->loadModel('Account');

        $is_correct = $this->Account->authenticate(array(
            'login_id' => $login_id,
            'password' => $password,
        ));

        if(!$is_correct)
        {
            $this->set(array(
                'message' => "認証に失敗しました\n",
            ));
            return NULL;
        }

        //TODO:SSL通信の有無の確認

        // リダイレクト
        return $this->determine_next_url();
    }

    public function login()
    {
        return NULL;
    }

    // リダイレクト
    private function determine_next_url()
    {
        return $this->redirect(['controller'=>'admin' , 'action'=>'login']);
    }
}