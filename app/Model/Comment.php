<?php
class Comment extends AppModel{
	// 全てのコメントはpostに帰属することを示す
	public $belongsTo = 'Post';
}