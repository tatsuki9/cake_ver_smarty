<?php
/*
    単語帳ページ
*/

class PublicWordsController extends AppController{

    public $uses = array('Wordlist');
    public $viewClass = 'Smarty';

    public function index()
    {
        // 実行モード確認
        if($this->is_execute_mode())
        {
            return $this->execute();
        }

        // 単語リストを全取得
        $list = $this->Wordlist->getAll();
        // jsに配列を渡すためにjson化
        $list = json_encode($list);

        $this->set(array(
            'list'     => $list,
        ));

        return NULL;
    }
}