<h2>記事一覧</h2>

<ul>
<?php foreach($posts as $post) : ?>

<li id="post_<?php echo h($post['Post']['id']); ?>">
<?php
// タイトル
echo $this->Html->link($post['Post']['title'],'/posts/view/'.$post['Post']['id']);
?>

<?php 
// 編集
echo $this->Html->link('編集',array('controller' => 'posts','action' => 'edit',$post['Post']['id'])); ?>
<?php
	// echo $this->Form->postLink('削除',array('action' => 'delete',$post['Post']['id']),array('confirm' => 'sure?'));
// 削除
	echo $this->Html->link('削除','#',array('class' => 'delete','data-post-id'=>$post['Post']['id']));
?>
</li>
<?php endforeach; ?>
<ul>


<h2>Add Post</h2>
<?php echo $this->Html->link('Add post',array('controller' => 'posts','action' => 'add')); 
?>

<script>
$(function(){
	$('a.delete').click(function(e) {
		console.log("hogehoge");
		console.log(this);
		if(confirm('sure?')){
			$.post(
				'/web/posts/delete/'+$(this).data('post-id'), //送信先URL
				{},                                           //送信パラメータ
				function(res){                                //コールバック関数
					console.log("res",res);
					$('#post_'+res.id).fadeOut();
				},
				"json"                                        //応答データの形式
			);
		}
		return false;
	});
});
</script>