<?php
/**
 * Created by PhpStorm.
 * User: nyoronyoro-kun
 * Date: 2015/11/07
 * Time: 18:05
 */

class Wordlist extends AppModel
{
    // 使用したいテーブル名を明示する
    var $useTable = 'Wordlist';

    // 全件取得
    function getAll()
    {
        $list = array();
        $list = $this->find('all');

        $result = array();
        foreach($list as $id => $word_info) {
            $result[$id] = array(
                'word'       => $word_info['Wordlist']['word'],
                'answer'     => $word_info['Wordlist']['answer'],
                'candicates' => $word_info['Wordlist']['candicates'],
            );
        }

        return $result;
    }
}