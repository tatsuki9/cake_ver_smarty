<?php
/*
    ログイン
*/

class PublicLoginController extends AppController{

    public $viewClass = 'Smarty';

    public function index()
    {        
        // 実行モード確認
        if($this->is_execute_mode())
        {
            // return $this->execute();
        }

        $this->set(array(
            'message' => NULL,
        ));

        return NULL;
    }

    // public function create_account()
    // {
    //     $addr = $this->request->data['User']['addr'];

    //     $this->email($addr);

    //     return NULL;
    // }


    // public function execute()
    // {
    //     $login_id = $this->get_posted_params("login_id",NULL);
    //     $password = $this->get_posted_params("password",NULL);

    //     if(strlen($login_id)==0 || strlen($password))
    //     {
    //         $this->set(array(
    //             'message' => 'ログインIDまたはパスワードが未入力です',
    //         ));

    //         return NULL;
    //     }

    //     $this->loadModel('Account');

    //     $is_correct = $this->Account->authenticate(array(
    //         'login_id' => $login_id,
    //         'password' => $password,
    //     ));

    //     if(!$is_correct)
    //     {
    //         $this->set(array(
    //             'mesasge' => "認証に失敗しました",
    //         ));

    //         return NULL;
    //     }

    //     // リダイレクト
    //     return $this->determine_next_url();
    // }

    // // リダイレクト先決定
    // private function determine_next_url()
    // {
    //     return $this->redirect(['controller' => 'admin','action' => 'login']);
    // }
}
