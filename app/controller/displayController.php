<?php
	class displayController{
		function displayBlog(){
			$model = new displayModel();
			$result = $model->getBlog();
			echo json_encode($result);
		}
		function displayCategory(){
			$model = new displayModel();
			$result = $model->getCategory();
			echo json_encode($result);
		}
		function displayBlogById(){
			$blog_id = $_POST['blog_id'];
			$model = new displayModel();
			$result = $model->getBlogById($blog_id);
			echo json_encode($result);
		}
		function displayBlogByCategoryId(){
			$category_id = $_POST['category_id'];
			$model = new displayModel();
			$result = $model->getBlogByCategoryId($category_id);
			echo json_encode($result);
		}
	}
?>