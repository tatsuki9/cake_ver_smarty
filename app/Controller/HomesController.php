<?php
/*
	ログイン画面
*/


class HomesController extends AppController{

    public $viewClass = 'Smarty';

    public function index(){

        $this->set(array(
            'login_id' => $this->request->query["login_id"],
            'message'  => $this->request->query["message"],
        ));
    }

    public function execute(){
    	$this->set('hogehoge','おっほ');
    }
}