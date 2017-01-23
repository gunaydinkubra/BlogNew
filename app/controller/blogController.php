<?php
	class blogController{
		function add(){
			include __DIR__."/../view/blogAdd.html";
			
		}
		
		function getBlogList(){
			$model = new blogModel();
			$result = $model->listBlog();
			echo json_encode($result);
		}
		function save(){
			$title = $_POST['title'];
			$content = $_POST['content'];
			$category_id = $_POST['category_id'];
			$tags = $_POST['tags'];
			$model = new blogModel();
			$result = $model->saveBlog($title,$content,$category_id,$tags);
			echo json_encode($result);
		}
		function delete(){
			$blog_id = $_POST['blog_id'];
			$model = new blogModel();
			$result = $model->deleteBlog($blog_id);
			echo json_encode($result);			
		}
		function edit(){
			$blog_id = $_POST['blog_id'];
			$model = new blogModel();
			$result = $model->editBlog($blog_id);
			echo json_encode($result);			
		}
		function update(){
			$blog_id = $_POST['blog_id'];
			$title = $_POST['title'];
			$content = $_POST['content'];
			$category_id = $_POST['category_id'];
			$tags = $_POST['tags'];
			$model = new blogModel();
			$result = $model->updateBlog($blog_id,$title,$content,$category_id,$tags);
			echo json_encode($result);
		}
	}
?>