<?php
/*
	ログイン画面
*/


class HomesController extends AppController{

    public $viewClass = 'Smarty';

    public function index(){
        $this->set('sampleValue','サンプルテキスト');
    }

    public function execute(){
    	
    }
}