<h2><?php echo h($post['Post']['title']); ?></h2>

<p><?php echo h($post['Post']['body']); ?></p>

<h2>Comments</h2>

<ul>
	<?php 
		// コメント履歴表示
		foreach ($post['Comment'] as $comment):
	?>
<li id="delete_<?php echo h($comment['id']); ?>">
	<?php
		echo h($comment['body'])?> by <?php echo h($comment['commenter']); 
	?> 
	<?php
		// 削除リンク表示
		echo $this->Html->link('削除','#',array('class' => 'delete','data-comment-id'=>$comment['id']));
	?>

</li>
	<?php endforeach;?>
</ul>

<h2>Add Comment</h2>

<?php
echo $this->Form->create('Comment',array('action' => 'add'));
echo $this->Form->input('commenter');
echo $this->Form->input('body',array('rows' => 3));
echo $this->Form->input('Comment.post_id',array('type' => 'hidden','value' => $post['Post']['id']));
echo $this->Form->end('post comment');
?>

<script>
$(function(){
	$('a.delete').click(function(e) {
		console.log("comment delete");
		console.log(this);
		if(confirm('sure?')){
			$.post(
				'/web/comments/delete/'+$(this).data('comment-id'), //送信先URL
				{},                                           //送信パラメータ
				function(res){                                //コールバック関数
					console.log("res",res);
					$('#delete_'+res.id).fadeOut();
				},
				"json"                                        //応答データの形式
			);
		}
		return false;
	});
});
</script>