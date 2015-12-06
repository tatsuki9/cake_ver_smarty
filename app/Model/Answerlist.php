<?php
/**
 * Created by PhpStorm.
 * User: nyoronyoro-kun
 * Date: 2015/11/15
 * Time: 22:30
 */

class Answerlist extends AppModel
{
    // 使用したいテーブルを明記
    var $useTable = 'Answerlist';

    function getAll()
    {
        $list = array();
        $list = $this->find('all');

        $result = array();
        foreach($list as $id => $answer_info) {
            $result[$id] = $answer_info['Answerlist']['word'];
        }

        return $result;
    }
}