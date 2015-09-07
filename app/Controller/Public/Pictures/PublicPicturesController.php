<?php
/*
    写真共有ページ
*/

class PublicPicturesController extends AppController{

    public $viewClass = 'Smarty';

    public function index()
    {
        // ログインチェック
        // $this->check_session();

        // 実行モード確認
        if($this->is_execute_mode())
        {
            return $this->execute();
        }

        $this->set(array(
            'message' => NULL,
        ));


        // $this->loadModel('Images');
        // $images = $this->Images->find('all');

        // $this->set(array(
        //     'images' => $images,
        // ));

        // var_dump($images);        

        // foreach ($images as $image) {
        //     foreach ($image as $data) {

        //         // var_dump($data);

        //         $this->contents($data['filename']);

                // $this->set(array(
                //     'contents' => $data['contents'],
                // ));
        // $this->contents();

        return NULL;
    }

    public function add()
    {
        // テーブル読み込み(Imagesテーブル)
        $this->loadModel('Images');

        // ファイルサイズ制限
        $limit = 1024*1024;


        // ファイルサイズ検証
        if($this->data['image']['size'] > $limit)
        {
            $this->Session->setFlash('1MB以内の画像が登録可能です');
            $this->redirect('index');
        }

        // インサートデータ作成
        $image = array(
            // Imagesテーブル
            'Images' => array(
                'filename' => md5(microtime()). '.jpg',
                'contents' => file_get_contents($this->data['image']['tmp_name']),// バイナリ取得
            )
        );

        // 保存(Imagesテーブルへ)
        if($this->Images->save($image))
        {
            $this->Session->setFlash('画像をアップロードしました');
        }
        else
        {
            $this->Session->setFlash('画像アップロードに失敗しました');
        }

        // indexアクションへ
        $this->redirect('index');
    }

    function contents($filename)
    {
        var_dump("hoghehgoe");
        var_dump($filename);
        // テーブル読み込み(Imagesテーブル)
        // $this->loadModel('Images');
        // $images = $this->Images->find('all');
        // $this->layout = false;
        // // $image = $this->Images->findByFilename($filename);

        // $view = array();
        // foreach ($images as $image) {
        //     foreach ($image as $data) {
        //         $view[] = $data['contents'];
        //     }
        // }

        // $this->set(array(
        //     'view' => $view,
        // ));
    }

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
