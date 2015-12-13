<?php
/*
    単語帳ページ
*/

class PublicWordsResultController extends AppController{

    public $viewClass = 'Smarty';

    public function index()
    {
        var_dump($this->request->query);
        var_dump($this->request->data);
        var_dump("hgoehgoe");

        return NULL;
    }
}