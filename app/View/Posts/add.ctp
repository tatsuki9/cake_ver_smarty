<h2>Add Post</h2>

<!--
FormHelperはフォーム作成を代行
フォームをサブミットするためのデフォルトのメソッドはPOST
IDはモデル名とコントローラのアクション名を合わせた名前で生成
フォームデータは$this->request->data配列の中に格納
-->

<?php
// パラメータあり：パラメータで指定されたモデルに対応したコントローラにサブミットするためのフォームを作成
// パラメータなし：現在のURLを通して、現在のコントローラにサブミットする為のフォームを作成
echo $this->Form->create('Post');
// データベース構造見て、titleカラムの値がvar charだったら、テキストフィールドに設定せよとなる
echo $this->Form->input('title');
// データベース構造見て、bodyカラムの値がテキスト型だったら、それに対応したテキストエリアを作成してくれる。
echo $this->Form->input('body',array('rows' => 3));
echo $this->Form->end('Save Post');

?>