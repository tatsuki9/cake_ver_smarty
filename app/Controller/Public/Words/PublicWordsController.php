<?php
/*
    単語帳ページ
*/

class PublicWordsController extends AppController{

    public $viewClass = 'Smarty';

    public function index()
    {
        // 実行モード確認
        if($this->is_execute_mode())
        {
            return $this->execute();
        }

        return NULL;
    }
}
