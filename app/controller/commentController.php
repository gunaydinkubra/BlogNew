<?php
	class commentController{
		function add(){
			include __DIR__."/../view/commentAdd.html";
			
		}
		
		function getCommentList(){
			$model = new commentModel();
			$result = $model->listComment();
			echo json_encode($result);
		}
		function save(){
			$content = $_POST['content'];
			$blog_id = $_POST['blog_id'];
			$user_id = $_POST['user_id'];
			$model = new commentModel();
			$result = $model->saveComment($blog_id,$user_id,$content);
			echo json_encode($result);
		}
		function delete(){
			$comment_id = $_POST['comment_id'];
			$model = new commentModel();
			$result = $model->deleteComment($comment_id);
			echo json_encode($result);			
		}
		function edit(){
			$comment_id = $_POST['comment_id'];
			$model = new commentModel();
			$result = $model->editComment($comment_id);
			echo json_encode($result);			
		}
		function update(){
			$comment_id = $_POST['comment_id'];
			$content = $_POST['content'];
			$model = new commentModel();
			$result = $model->updateComment($comment_id,$content);
			echo json_encode($result);
		}
	}
?>