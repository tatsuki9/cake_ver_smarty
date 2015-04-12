<?php

class CommentsController extends AppController{
    public $helpers = array('Html','Form');

    // コメント追加
    public function add(){
        if($this->request->is('post')){
            // Commentsテーブルに保存
            if($this->Comment->save($this->request->data)){
                $this->Session->setFlash('Success');
                // viewにリダイレクト
                $this->redirect(array('controller' => 'Posts', 'action' => 'view',$this->data['Comment']['post_id']));
            }
            else
            {
                $this->Session->setFlash('failed');
            }
        }
    }

    public function delete($id){
        if($this->request->is('get')){
            throw new MethodNotAllowedException();
        }

        if($this->request->is('ajax')){
            if($this->Comment->delete($id)){
                $this->autoRender = false;
                $this->autoLayout = false;
                $response = array('id' => $id);
                $this->header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            }
        }
        $this->redirect(array('controller' => 'posts','action' => 'index'));
    }
}
